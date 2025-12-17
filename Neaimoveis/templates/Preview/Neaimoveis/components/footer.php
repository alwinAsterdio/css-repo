<?php
$footer_menu_items = \App\Utils\MenusItems::getMainMenuItems($site_data['id'], 'footer');
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/footer');
$footer_options = json_decode($component_data['options'], true);
$cookiepolicy = \App\Utils\SitesPage::getFirstPageByTemplate('cookie_policy');
?>

<div class="bg-[#002F6D1A] px-6">
    <div
        class="container xl:max-w-[1140px] mx-auto py-16 relative sm:before:content-[''] sm:before:block sm:before:h-full sm:before:w-[1px] sm:before:absolute sm:before:bg-[#A7B2BB80] sm:before:top-0 sm:before:left-1/2">
        <div
            class="flex flex-wrap sm:flex-nowrap justify-between items-center gap-8 sm:gap-16">
            <div
                class="section-wrapper w-full sm:w-1/2 sm:max-w-md leading-snug">
                <h2 class="text-2xl leading-tight font-semibold titleColor">
                    <?= $footer_options['aboutus_title'] ?>
                </h2>
                <p class="mt-5">
                    <?= $footer_options['aboutus_description'] ?>
                </p>
                <div class="mt-10">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                        <div class="grid grid-cols-[41px,1fr] gap-2.5 items-center">
                            <img
                                src="<?= \App\Utils\SitesPage::getMediaOptionByKey($footer_options, 'aboutus_email_icon'); ?>"
                                alt="Email"
                                class="block w-full h-auto max-w-10">
                            <div class="flexflex-col gap-1">
                                <p class="text-xs leading-tight font-medium">
                                    <?= $footer_options['aboutus_email_title'] ?>
                                </p>
                                <a
                                    href="mailto:<?= $site_data->get('email') ?>"
                                    class="no-underline text-[#002F6D] hover:text-primary duration-300"><?= $site_data->get('email') ?></a>
                            </div>
                        </div>
                        <div class="grid grid-cols-[41px,1fr] gap-2.5 items-center">
                            <img
                                src="<?= \App\Utils\SitesPage::getMediaOptionByKey($footer_options, 'aboutus_call_icon'); ?>"
                                alt="Call"
                                class="block w-full h-auto max-w-10">
                            <div class="flex flex-col gap-1">
                                <p class="text-xs leading-tight font-medium">
                                    <?= $footer_options['aboutus_call_title'] ?>
                                </p>
                                <a
                                    href="tel:<?= $site_data->get('phone') ?>"
                                    class="no-underline text-[#002F6D] hover:text-primary duration-300"><?= $site_data->get('phone') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-wrapper w-full sm:w-1/2 sm:max-w-md">
                <h2
                    class="text-2xl leading-tight font-semibold titleColor">
                    <?= $footer_options['contact_form_title'] ?>
                </h2>
                <p class="mt-5 leading-[1.375]">
                    <?= $footer_options['contact_form_sub_title'] ?>
                </p>

                <form id="contact-form" action="" class="enquiry-form grid grid-cols-2 grid-rows-3 lg:grid-rows-2 gap-4 mt-5" integration-recaptcha=true data-action="lead_form">
                    <div class='hidden'>
                        <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Request a callback']); ?>
                    </div>
                    <div class="form-group col-span-2 lg:col-span-1">
                        <input
                            type="text"
                            class="box-border py-2.5 px-5 lg:py-4 lg:px-8 w-full text-lg leading-normal rounded-full border border-solid border-[#66666680] border-opacity-50"
                            name="full_name"
                            id="full_name"
                            placeholder="<?= $footer_options['contact_form_name'] ?>">
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group col-span-2 lg:col-span-1">
                        <input
                            class="box-border py-2.5 px-5 lg:py-4 lg:px-8 w-full text-lg leading-normal rounded-full border border-solid border-[#66666680] border-opacity-50 required-field"
                            type="text"
                            id="phone"
                            name="phone"
                            placeholder="<?= $footer_options['contact_form_phone'] ?>" />
                        <div class="form-group__helper"></div>
                    </div>
                    <div class="form-group col-span-2 relative">
                        <input
                            type="email"
                            class="box-border py-2.5 px-5 lg:py-4 pr-[133px] lg:px-8 w-full text-lg leading-normal rounded-full border border-solid border-[#66666680] border-opacity-50"
                            name="email"
                            id="email"
                            placeholder="<?= $footer_options['contact_form_email'] ?>">
                        <div class="form-group__helper"></div>
                        <button
                            class="border-none rounded-full bg-[#002F6D] hover:bg-primary hover:cursor-pointer duration-300 text-white text-base leading-tight py-2 px-5 lg:py-3.5 lg:px-8 uppercase z-10 right-[4.5px] lg:right-[7.5px] absolute top-[6px]"
                            type="submit"
                            id="contact-btn"
                            onClick="javascript:submit_lead_form({obj: this, form_id: 'contact-form'})">
                            <?= $footer_options['contact_form_btn'] ?>
                        </button>
                    </div>
                    <div class="generic-helper col-span-2"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="bg-[#002F6D1A] before:content-[''] before:block before:h-[1px] before:w-full before:bg-[#A7B2BB80]">
    <div class="px-6">
        <div class="container xl:max-w-[1140px] mx-auto py-8 relative">
            <?php if (!empty($footer_menu_items)) : ?>
                <ul
                    class="mb-8 list-none p-0 flex flex-wrap gap-2.5 sm:gap-x-8 sm:gap-y-2.5 justify-center lg:no-wrap lg:justify-between">
                    <?php foreach ($footer_menu_items as $menu_item) { ?>
                        <?php
                        $options = json_decode($menu_item['options'], true);
                        if ($menu_item['menu_type'] === 'page') {
                            $url = \App\Utils\SitesPage::getPageSlugById((int)$options['pages_id']);
                        } else {
                            $url = $options['menu_url'];
                        }
                        ?>
                        <li class="w-full sm:w-fit">
                            <a href="<?= $url ?>" class="no-underline whitespace-nowrap text-[#666666] hover:text-primary duration-300">
                                <?= $menu_item->get('menu_label'); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php endif; ?>
            <div
                class="text-xs leading-tight flex flex-wrap sm:flex-nowrap justify-between items-center gap-8">
                <div class="section-wrapper sm:flex-1">
                    <ul class="list-none p-0 flex flex-wrap gap-[10px] sm:gap-0">
                        <li>&copy; <script>
                                document.write(new Date().getFullYear())
                            </script> <?= $site_data->get('site_title') ?>.
                        </li>
                        <?php if (!empty($privacypolicy)) : ?>
                            <li
                                class="flex items-center sm:before:content-['|'] sm:before:mx-[10px] sm:before:text-textColor">
                                <a
                                    href="/<?= $privacypolicy->get('page_slug') ?>"
                                    class="no-underline whitespace-nowrap text-[#666666] hover:text-primary duration-300"><?= $privacypolicy->get('page_title'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($cookiepolicy)) : ?>
                            <li
                                class="flex items-center sm:before:content-['|'] sm:before:mx-[10px] sm:before:text-textColor">
                                <a
                                    href="/<?= $cookiepolicy->get('page_slug') ?>"
                                    class="no-underline whitespace-nowrap text-[#666666] hover:text-primary duration-300"><?= $cookiepolicy->get('page_title'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="section-wrapper sm:w-fit">
                    <ul class="list-none p-0 flex flex-wrap gap-2.5">
                        <?php if ($site_data_options['social_media_linkedin']) : ?>
                            <li>
                                <a href="<?= $site_data_options['social_media_linkedin'] ?>" target="_blank">
                                    <svg
                                        width="25"
                                        height="26"
                                        viewBox="0 0 25 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="group">
                                        <path
                                            d="M18.6433 18.6899H16.1126C16.1126 18.6899 16.0675 18.6489 16.0675 18.6449V13.9112C16.0675 13.7391 15.9261 13.2494 15.84 13.0895C15.5245 12.4891 14.7089 12.4194 14.1331 12.6367C13.2929 12.9563 13.2745 13.9871 13.2478 14.7473C13.2048 16.0588 13.2827 17.3764 13.2478 18.6879H10.7007V10.4789H13.1577V11.5875L13.3974 11.2432C14.0798 10.4297 15.1044 10.1838 16.1331 10.3026C17.8298 10.4994 18.4589 11.5916 18.6085 13.1899C18.6761 15.0199 18.6208 16.8559 18.6392 18.6879L18.6433 18.6899Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                        <path
                                            d="M9.11684 10.4814V18.6905H6.54102V10.5265C6.54102 10.5265 6.582 10.4814 6.5861 10.4814H9.11684Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                        <path
                                            d="M7.61062 6.41569C8.94259 6.24561 9.84218 7.73741 9.00816 8.80299C8.06964 10.0018 6.21513 9.21282 6.36062 7.71282C6.4221 7.08168 6.97948 6.49766 7.61062 6.41774V6.41569Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                        <path
                                            d="M12.5 25.0469C5.60656 25.0469 0 19.4383 0 12.5469C0 5.65548 5.60656 0.046875 12.5 0.046875C19.3934 0.046875 25 5.65343 25 12.5469C25 19.4403 19.3934 25.0469 12.5 25.0469ZM12.5 0.456711C5.83402 0.456711 0.409836 5.87884 0.409836 12.5469C0.409836 19.2149 5.83402 24.637 12.5 24.637C19.166 24.637 24.5902 19.2129 24.5902 12.5469C24.5902 5.88089 19.166 0.456711 12.5 0.456711Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($site_data_options['social_media_facebook']) : ?>
                            <li>
                                <a href="<?= $site_data_options['social_media_facebook'] ?>" target="_blank">
                                    <svg
                                        width="25"
                                        height="26"
                                        viewBox="0 0 25 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="group">
                                        <path
                                            d="M14.828 6.4156C14.828 6.4156 14.8547 6.43814 14.8854 6.44019C15.1538 6.45454 15.4223 6.46273 15.6907 6.48732V8.45454C15.3219 8.46888 14.9407 8.43404 14.5739 8.45454C14.1497 8.47708 13.701 8.52216 13.537 8.97708C13.5165 9.03446 13.4592 9.23527 13.4592 9.28241V10.9013H15.6169L15.3178 13.1082H13.4592V18.6963H11.1805V13.1082H9.30957V10.9013H11.1805C11.2112 9.65741 10.9776 8.21068 11.8997 7.21888C12.3157 6.77216 13.0186 6.46478 13.6272 6.4156C13.9776 6.38896 14.4694 6.40126 14.826 6.4156H14.828Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                        <path
                                            d="M12.5 25.0469C5.60656 25.0469 0 19.4403 0 12.5469C0 5.65343 5.60861 0.046875 12.5 0.046875C19.3914 0.046875 25 5.65343 25 12.5469C25 19.4403 19.3934 25.0469 12.5 25.0469ZM12.5 0.456711C5.83402 0.456711 0.409836 5.88089 0.409836 12.5469C0.409836 19.2129 5.83402 24.637 12.5 24.637C19.166 24.637 24.5902 19.2129 24.5902 12.5469C24.5902 5.88089 19.168 0.456711 12.5 0.456711Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($site_data_options['social_media_instagram']) : ?>
                            <li>
                                <a href="<?= $site_data_options['social_media_instagram'] ?>" target="_blank">
                                    <svg
                                        width="25"
                                        height="26"
                                        viewBox="0 0 25 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="group">
                                        <path
                                            d="M15.6922 18.6945H9.30491C9.11229 18.6494 8.91967 18.6187 8.72909 18.5633C7.65532 18.2478 6.79877 17.3912 6.4832 16.3174C6.42787 16.1269 6.39713 15.9343 6.35205 15.7416V9.35433C6.55492 7.78056 7.82336 6.52851 9.41147 6.39941H15.6307C17.2148 6.55925 18.4873 7.82974 18.6451 9.41376V15.633C18.5508 17.1576 17.2209 18.5552 15.6922 18.6924V18.6945ZM9.66148 7.12687C8.29672 7.20679 7.28852 8.07155 7.09795 9.4363C7.12459 11.3707 6.98115 13.3912 7.07336 15.3195C7.13893 16.7006 7.98114 17.7396 9.37049 17.9445C11.3172 17.9199 13.3582 18.0695 15.2988 17.9711C16.8316 17.8933 17.85 16.8748 17.9279 15.342C18.0262 13.4035 17.8766 11.3605 17.9012 9.41376C17.7578 8.23343 16.8131 7.28671 15.6328 7.14532C13.6758 7.174 11.6143 7.01212 9.66352 7.12482L9.66148 7.12687Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                        <path
                                            d="M12.1579 9.19267C14.5574 8.9898 16.4201 11.1968 15.7234 13.5267C14.912 16.2357 11.2829 16.7705 9.69884 14.4242C8.2931 12.3423 9.6558 9.40579 12.1579 9.19472V9.19267ZM12.4919 9.91398C10.3956 9.92218 9.13531 12.2972 10.33 14.0328C11.4365 15.6394 13.8771 15.5267 14.8095 13.8115C15.7419 12.0964 14.4837 9.90784 12.4919 9.91398Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                        <path
                                            d="M12.5 25.0469C5.60656 25.0469 0 19.4403 0 12.5469C0 5.65343 5.60656 0.046875 12.5 0.046875C19.3934 0.046875 25 5.65343 25 12.5469C25 19.4403 19.3934 25.0469 12.5 25.0469ZM12.5 0.456711C5.83402 0.456711 0.409836 5.88089 0.409836 12.5469C0.409836 19.2129 5.83402 24.637 12.5 24.637C19.166 24.637 24.5902 19.2129 24.5902 12.5469C24.5902 5.88089 19.166 0.456711 12.5 0.456711Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($site_data_options['social_media_twitter']) : ?>
                            <li>
                                <a href="<?= $site_data_options['social_media_twitter'] ?>" target="_blank">
                                    <svg
                                        width="25"
                                        height="26"
                                        viewBox="0 0 25 26"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="group">
                                        <path
                                            d="M6.47373 18.6945L11.1561 13.2314L6.47373 6.39941H10.1008C11.0926 7.91376 12.152 9.38712 13.1623 10.8912L13.234 10.8441L17.0516 6.40146H18.1192L13.6582 11.6002L18.527 18.6965H14.9L11.6459 13.9424L7.57619 18.6965H6.47168L6.47373 18.6945ZM17.0393 17.9261L9.5598 7.21499H7.96349L15.443 17.9261H17.0393Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                        <path
                                            d="M12.5 25.0469C5.60655 25.0469 0 19.4403 0 12.5469C0 5.65343 5.6086 0.046875 12.5 0.046875C19.3914 0.046875 25 5.65343 25 12.5469C25 19.4403 19.3934 25.0469 12.5 25.0469ZM12.5 0.456711C5.83401 0.456711 0.409836 5.88089 0.409836 12.5469C0.409836 19.2129 5.83401 24.637 12.5 24.637C19.166 24.637 24.5902 19.2129 24.5902 12.5469C24.5902 5.88089 19.166 0.456711 12.5 0.456711Z"
                                            fill="#666666"
                                            class="group-hover:fill-titleColor duration-300" />
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>