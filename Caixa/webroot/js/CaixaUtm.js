class CaixaUtm {
    readCustomUtmParams(){
        const queryString = window.location.href.split('?')[1];
        const custom_caixa_utm_params = {};
        if (queryString) {
            const parts = queryString.split(':');

            parts.forEach(part => {
                const params = part.split('-')

                if (params.length === 2){
                    switch(params[0]) {
                        case 'nf':
                            custom_caixa_utm_params.source = params[1]
                            break;
                        case 'nm':
                            custom_caixa_utm_params.medium = params[1]
                            break;
                    }
                }
            })

            if (Object.keys(custom_caixa_utm_params).length !== 0) {
                this.setCookie('caixa_utm_params', custom_caixa_utm_params)
            }
        }
    }

    /**
     * Set a cookie.
     *
     * @param {string} name The cookie name.
     * @param {string} value The cookie value.
     * @param {integer} expiration_days The expiration in days.
     *
     * @return {void}
     */
    setCookie(name, value, expiration_days = 1) {
        if (expiration_days === -1) {
            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        } else {
            const date = new Date();
            date.setTime(date.getTime() + (expiration_days * 24 * 60 * 60 * 1000));
            document.cookie = name + "=" + JSON.stringify(value) + "; expires=" + date.toUTCString() + ";";
        }
    }

    /**
     * Get the cookie value
     *
     * @param {string} name The cookie name.
     * @returns
     */
    getCookie(name) {
        name = name + "=";
        const decodedCookie = decodeURIComponent(document.cookie);
        const cookies = decodedCookie.split(";");

        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();

            if (cookie.indexOf(name) == 0) {
                return JSON.parse(cookie.substring(name.length, cookie.length));
            }
        }

        return '';
    }

    detectImaginUtm(){
        const mortgageBtns = document.querySelectorAll(".mortgage-btn");
        if (mortgageBtns.length === 0) {
            return;
        }

        const custom_caixa_utm_params = this.getCookie('caixa_utm_params')
        const utm_params = this.getCookie('utm_params');
        const utm_contains_imagin = (utm_params && utm_params?.utm_source === "imagin"
        || custom_caixa_utm_params && custom_caixa_utm_params.source && custom_caixa_utm_params.source === "imagin"
        || custom_caixa_utm_params && custom_caixa_utm_params.source && custom_caixa_utm_params.medium === "nl_imagin") || false;

        if (!utm_contains_imagin) {
            return;
        }

        mortgageBtns.forEach((mortgageBtn) => {
            const existingUrl = mortgageBtn.href.split('?');
            const queryPart = existingUrl.length > 1 ? existingUrl[1] : '';

            if (queryPart) {
                mortgageBtn.href = imagin_mortgage_link + (imagin_mortgage_link.includes('?') ? '&' : '?') + queryPart
            } else {
                mortgageBtn.href = imagin_mortgage_link;
            }
        });

        document.dispatchEvent(new Event('caixa-imagin-detected'));
    }


    events(){
        this.readCustomUtmParams();
        document.addEventListener('DOMContentLoaded', function(event) {
            const caixa_utm_elements = document.querySelectorAll('.caixa-utm-params')
            const custom_caixa_utm_params = this.getCookie('caixa_utm_params')
            caixa_utm_elements.forEach(elem => {
                if (Object.keys(custom_caixa_utm_params).length !== 0) {
                    let origin_anterior = custom_caixa_utm_params.source ?? '';
                    if (custom_caixa_utm_params.medium) {
                        origin_anterior += origin_anterior ? '%26' + custom_caixa_utm_params.medium : custom_caixa_utm_params.medium;
                    }

                    if (origin_anterior) {
                        elem.href += '&origenAnterior=' +origin_anterior
                    }
                }
            })

            this.detectImaginUtm();
        }.bind(this))
    }
}

const caixaUtm = new CaixaUtm();

caixaUtm.events();