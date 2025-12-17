<?php
declare(strict_types=1);

namespace Caixa\Utils;

use Cake\Http\Response;
use Cake\Routing\Router;

/**
 * This class will be used for caixa token methods.
 *
 * @package Custom
 */
class CaixaToken
{
    /**
     * Read the token cookie.
     *
     * @return array
     */
    public static function getCookie(): array
    {
        static $token;
        if (!empty($token)) {
            return $token;
        }

        $default = [
            'id' => '',
            'email' => '',
        ];

        $token = \App\Utils\Cookies::get('ctkn', [], false);

        if (!empty($token)) {
            $token = json_decode($token, true);
            if (!is_array($token)) {
                $token = [];
            }
        }

        $token = array_replace($default, $token);

        return $token;
    }

    /**
     * Decrypt the token.
     *
     * @param string $token The token.
     * @return array
     */
    public static function decryptString(string $token): array
    {
        $privateKeyFile = \App\Tenancy\TenancyManagement::instance()->getTenancy()->getStorageDirectory() . 'keys' . DS . 'token_key';

        $encryptedData = base64_decode($token);

        if ($encryptedData === false) {
            throw new \Exception('Failed to read or decode encrypted data.');
        }

        $privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFile));

        if (!$privateKey) {
            throw new \Exception('Failed to load private key.');
        }

        $decryptedData = '';
        if (!openssl_private_decrypt($encryptedData, $decryptedData, $privateKey, OPENSSL_PKCS1_PADDING)) {
            throw new \Exception('Decryption failed: ' . openssl_error_string());
        }

        $jsonData = json_decode($decryptedData, true);
        $tokenData = [];

        foreach ($jsonData as $details) {
            foreach ($details as $k => $v) {
                $tokenData[$k] = $v;
            }
        }

        $mapppedList = [
            'customerId' => 'id',
            'customerInternalId' => 'id',
            'email' => 'email',
        ];

        $mappedListValues = [];
        foreach ($mapppedList as $caixa_key => $mappedKey) {
            if (empty($tokenData[$caixa_key])) {
                continue;
            }
            $mappedListValues[$mappedKey] = $tokenData[$caixa_key];
        }

        return $mappedListValues;
    }

    /**
     * Get token id.
     *
     * @return string|null
     */
    public static function getId(): ?string
    {
        $token_details = self::getCookie();

        return $token_details['id'] ?? '';
    }

    /**
     * Returns true if there is an id in the token.
     *
     * @return bool
     */
    public static function hasId(): bool
    {
        return !empty(self::getId());
    }

    /**
     * Get token email.
     *
     * @return string|null
     */
    public static function getEmail(): ?string
    {
        $token_details = self::getCookie();

        return $token_details['email'] ?? '';
    }

    /**
     * Check cookies for the token.
     *
     * @param \Cake\Http\Response $response Server Response.
     * @return null|\Cake\Http\Response
     */
    public static function checkTokenInCookies(Response $response): ?Response
    {
        $queryParams = Router::getRequest()->getQuery();
        if (empty($queryParams['token'])) {
            return null;
        }

        $token_data = \Caixa\Utils\CaixaToken::decryptString($queryParams['token']);
        $response = \App\Utils\Cookies::set('ctkn', $token_data, $response, '+20 days');
        // Flag to reload favorites on localstorage from qobrix after login.
        $response = \App\Utils\Cookies::set('ctkn_rl', '1', $response, '+20 days');
        unset($queryParams['token']);
        $currentUrl = Router::getRequest()->getRequestTarget();
        $parsedUrl = parse_url($currentUrl);
        $newQueryString = http_build_query($queryParams);
        $newUrl = $parsedUrl['path'] . (!empty($newQueryString) ? '?' . $newQueryString : '');

        return $response->withLocation($newUrl);
    }
}
