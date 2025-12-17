const line_svg_icon = `<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="48" height="48" rx="24" fill="#CACFFF"/>
    <path d="M22.1953 14.592H25.6129V35.2128H22.1953V14.592Z" fill="#003C46"/>
    <path d="M29.7212 14.7072C29.6828 13.4784 30.4124 12.7872 31.6796 12.7872C32.9084 12.7872 33.5996 13.44 33.638 14.7072C33.6764 15.9744 32.9852 16.704 31.6796 16.704C30.4124 16.6656 29.7212 15.9744 29.7212 14.7072Z" fill="#003C46"/>
    <path d="M33.3688 19.3152H29.9512V35.2128H33.3688V19.3152Z" fill="#003C46"/>
    <path d="M14.3999 19.3151C14.3615 18.0863 15.0911 17.3951 16.3583 17.3951C17.5871 17.3951 18.2783 18.0479 18.3167 19.3151C18.3551 20.5823 17.6639 21.3119 16.3583 21.3119C15.1295 21.3119 14.4383 20.6207 14.3999 19.3151Z" fill="#003C46"/>
    <path d="M18.0475 24.192H14.6299V35.2128H18.0475V24.192Z" fill="#003C46"/>
</svg>`
const start_svg_icon = `<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="48" height="48" rx="24" fill="#CACFFF"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.914 25.7397C18.1592 25.8966 18.1444 26.2072 18.365 26.3642L18.4753 27.0521L17.9273 27.7835C17.2333 28.1159 16.1978 28.26 15.5543 27.7278C15.1876 27.4287 15.0906 26.9951 15.1876 26.5621L15.4447 25.9299C15.5894 25.839 15.7861 25.8178 15.8824 25.6615C16.2238 25.463 16.6614 25.5072 17.0499 25.4297C17.3429 25.5181 17.7819 25.3727 17.914 25.7397Z" fill="#003C46"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1931 30.0966C16.3903 30.0966 16.534 30.2481 16.7186 30.2127C16.98 30.3154 16.9473 30.653 17.2207 30.7338C17.4286 31.1721 17.5597 31.6451 17.6674 32.1208C17.5918 32.399 17.8098 32.5598 17.7342 32.814L17.8098 32.862C17.8224 33.1276 17.7878 33.4291 17.6901 33.6847C17.7342 34.1684 17.5036 34.5747 17.3083 34.991C17.1672 35.083 17.0998 35.3506 16.9032 35.3019C16.5554 35.4173 16.5214 35.973 16.0955 35.903C15.8239 36.1238 15.4522 35.9951 15.1246 36.0077C14.94 35.903 14.6785 35.9277 14.5475 35.7562C14.2211 35.6141 13.9238 35.3606 13.6415 35.1071C13.5312 34.8509 13.2811 34.7368 13.2471 34.4466C13.3454 34.1003 13.1387 33.7861 13.225 33.4398L13.1602 32.862L13.3681 31.8686C13.7171 31.6705 13.6195 31.2188 13.9685 31.08C14.1865 30.5476 14.7107 30.4309 15.1133 30.166C15.2664 30.1313 15.4522 30.2234 15.5719 30.0719C15.7905 30.0392 15.9972 30.2814 16.1931 30.0966Z" fill="#003C46"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M34.7985 13.7159C34.706 15.3318 33.3774 16.4194 32.6803 17.7818C32.3814 18.596 31.6711 19.0761 31.1672 19.8071C30.7076 20.2779 30.2625 20.793 29.8836 21.3213C29.9537 21.6964 30.3524 21.804 30.5832 22.0774C31.0978 22.3858 31.1553 22.9689 31.6023 23.3235C31.8649 23.3235 31.8649 23.7137 32.1526 23.6675C32.7597 24.3206 33.2537 24.9975 33.7556 25.7067C33.8376 25.957 33.964 26.2092 34.1789 26.3941C34.5803 26.9779 34.913 27.5973 35.327 28.1923C35.3838 28.8553 35.944 29.3024 36.1159 29.9204C36.3699 30.2526 36.4717 30.6422 36.7012 30.9731C37.0563 31.7543 37.2964 32.5658 37.719 33.3101C37.7997 33.4844 37.6972 33.6534 37.6059 33.7809C37.4459 33.9064 37.3189 33.6759 37.135 33.7102C36.1966 33.3669 35.3031 32.8729 34.4328 32.3479C33.5374 31.6275 32.554 31.1131 31.6711 30.3563C31.3279 30.2652 31.1917 29.8617 30.8696 29.7019C30.0224 29.1749 29.3452 28.4208 28.4842 27.9281C28.0966 27.6297 27.7078 27.3444 27.3176 27.034C27.02 26.9997 26.9175 26.657 26.6298 26.5546C25.989 26.1637 25.405 25.6261 24.751 25.2603L24.6954 25.5786C24.2583 26.0045 24.3727 26.657 24.0639 27.1265C24.0526 27.8027 23.5824 28.2953 23.3873 28.8903C22.8516 29.8524 22.3808 30.837 21.8193 31.7886C21.074 32.7725 20.6726 33.9651 19.6204 34.7529C19.3896 35.0389 19.1277 35.1881 18.84 35.371C18.7157 35.3367 18.5305 35.3605 18.4968 35.1993C18.3692 34.9603 18.5305 34.5925 18.3592 34.3759C18.508 34.0437 18.4161 33.6653 18.4849 33.2995L18.428 33.1384C18.4399 32.6365 18.6925 32.2106 18.5887 31.6955C18.7256 31.3746 18.7825 31.0206 18.8169 30.6653C18.9789 30.2295 19.1158 29.76 19.1608 29.2891C19.3109 29.0171 19.3684 28.6618 19.334 28.3402C19.4471 28.0437 19.4703 27.6871 19.7784 27.4718C19.8254 27.2757 19.7784 27.0802 19.8142 26.8749C20.1237 25.9352 20.5006 25.0312 20.7407 24.0703L20.6276 23.966C19.9524 23.9303 19.3215 24.0703 18.6925 23.8967C17.6589 23.8841 16.6166 23.7494 15.6339 23.5427C15.2318 23.4635 14.7497 23.5071 14.384 23.2786C14.1433 23.2891 13.8681 23.3354 13.6387 23.2086C13.1691 22.9801 12.5958 23.0157 12.1269 22.7655C11.7717 22.8104 11.5191 22.5799 11.1977 22.5462C10.8902 22.5693 10.7169 22.3065 10.5 22.1348V22.0305C11.072 21.2513 11.9887 21.0347 12.8147 20.7369C13.6281 20.4853 14.5315 20.4621 15.3813 20.2878C15.9196 20.1993 16.5035 20.3472 17.0399 20.2548C18.014 20.2779 18.9558 20.439 19.9167 20.4621C20.2374 20.5084 20.5357 20.6556 20.8558 20.6457L20.8445 20.5084L19.9398 19.2709C19.5972 18.4705 18.9677 17.7943 18.7474 16.9457C18.5424 16.6941 18.7362 16.3164 18.5775 16.0411C18.5656 15.9143 18.6681 15.8245 18.7256 15.7214C18.9194 15.6396 19.1376 15.7769 19.334 15.6514C19.9167 15.7888 20.4556 15.9962 21.0403 16.1084C21.646 16.3501 22.2664 16.5905 22.8034 16.9913C23.4792 17.4727 24.2933 17.7818 24.8198 18.5266C24.958 18.6528 25.1762 18.6759 25.3587 18.629C25.5188 18.6065 25.5545 18.4111 25.7026 18.3536C26.4142 17.9072 27.2138 17.6569 27.9135 17.1643C28.1991 16.8764 28.6574 16.8427 28.8307 16.4531C29.049 16.3501 29.2414 16.2154 29.4722 16.1553C29.8736 15.8713 30.2737 15.561 30.7076 15.3318C30.9397 15.3087 31.1222 15.1819 31.3061 15.0571C32.015 14.6688 32.7597 14.3466 33.4342 13.8995C33.5857 13.5 34.0334 13.5911 34.3515 13.5C34.5109 13.535 34.7298 13.5106 34.7985 13.7159Z" fill="#003C46"/>
</svg>`

class CaixaModal {
    /**
     * Constructor.
     *
     * @param {object} params The params.
     */
    constructor(params = {}) {
        const defaultParams = {
            showCloseBtn: true,
            className: 'default'
        };
        this.params = { ...defaultParams, ...params };
    }

    open(content) {
        this.close();
        let closeButtonHtml = ``;
        if (this.params.showCloseBtn) {
            closeButtonHtml = `<div class="c-modal__inner__close-btn c-modal-close-btn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 6.4L17.6 17.6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 17.6L17.6 6.4" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>`
        }

        document.body.insertAdjacentHTML('beforeend', `<div class="c-modal c-modal--${this.params.className}">
            <div class="c-modal__inner">
                ${closeButtonHtml}
                ${content}
            </div>
        </div>`)

        document.querySelectorAll('.c-modal-close-btn').forEach(_btn => {
            _btn.addEventListener('click', function(){
                this.close()
            }.bind(this))
        })
    }

    close(){
        document.querySelectorAll('.c-modal').forEach(modal => modal.remove())
    }

    /**
     * Check if browser is safari.
     *
     * @return boolean
     */
    isSafari() {
        let userAgent = navigator.userAgent.toLowerCase();
        let isSafari = /^((?!chrome|android|crios|fxios|edg).)*safari/.test(userAgent);
        return isSafari;
    }

    openForRedirect({content = '', url = '', delay_to_redirect = 3000, new_tab = false}){
        if (this.isSafari() && new_tab) {
            window.open(url, '_blank');
        } else {
            let displayUrl = url.replace(/^https?:\/\//, '')
            displayUrl = displayUrl.charAt(0).toUpperCase() + displayUrl.slice(1).toLowerCase()
            this.open(content);
            setTimeout(() => {
                if (new_tab) {
                    window.open(url, '_blank');
                    this.close();
                } else {
                    window.location.href = url
                }
            }, delay_to_redirect)
        }
    }
}

const caixaLoginModal = new CaixaModal({showCloseBtn: false});

/**
 * Open modal for redicting to external links
 */
function prepareLinkModal(){
    const currentDomain = window.location.origin;
    const allLinks = document.querySelectorAll("a:not(.c-modal-redirection):not(.ignore-c-modal)");
    const externalLinks = Array.from(allLinks).filter(link => {
        return link.href && !link.href.startsWith(currentDomain);
    });

    externalLinks.forEach(aLink => {
        aLink.classList.add('c-modal-redirection')
        aLink.addEventListener('click', function(e){
            e.preventDefault();

            aLink.dispatchEvent(new CustomEvent('c-modal-redirection:click', {
                bubbles: false,
                cancelable: true
            }));

            e.stopPropagation();

            let description_text = 'Estás siendo redirigido a';
            let description_url_text = aLink.href.replace(/^https?:\/\//, '');
            let description_extra_text = '';
            let new_tab = aLink.target === '_blank'
            let svg_icon = line_svg_icon;
            const parsedUrl = new URL(aLink.href);

            if (parsedUrl.pathname.includes('/simulador/')) {
                description_text = `Estás siendo redirigido al simulador`
                description_url_text = 'de hipotecas de Caixabank…'
                new_tab = true;
                svg_icon = start_svg_icon;
            } else if (parsedUrl.hostname.replace(/^www\./, '') === 'caixabank.es') {
                description_text = 'Estás siendo redirigido a CaixaBank'
                description_url_text = '';
                description_extra_text = '';
                new_tab = false;
            } else if (parsedUrl.hostname === 'vender.faciliteacasa.com') {
                description_text = `Calcula el valor de tu inmueble`
                description_url_text = 'con Facilitea Casa…'
                new_tab = false;
            } else if (parsedUrl.hostname.replace(/^www\./, '') === 'facilitea.com') {
                description_url_text = 'Facilitea.com…'
                new_tab = true;
            } else if (parsedUrl.hostname.includes('buildingcenter')) {
                description_text = `Estás siendo redirigido a la`
                description_url_text = 'inmobiliaria Building Center…'
                description_extra_text = '<div class="redirect-text__descr__extra">Building Center es parte del grupo Caixabank</div>'
                svg_icon = start_svg_icon;
            } else if (parsedUrl.hostname === 'imaginbank.plink.pro.caixabank.es') {
                description_text = imagin_details.modal_imagin_title;
                description_url_text = imagin_details.modal_imagin_description;
                svg_icon = '<img src="' + imagin_details.imagin_img + '" height="48" width="48" alt="Imagin image" class="object-contain object-center"/>'
                new_tab = true;
            }

            const header = window.innerWidth <= 425 ? 'h5' : 'h4'
            const template = `<div class="redirect-logo">
                <div class="redirect-logo__circle"></div>
                <div class="redirect-logo__img">
                    ${svg_icon}
                </div>
            </div>
            <div class="redirect-text">
                <${header} class="redirect-text__descr">${description_text}
                    <div class="redirect-text__descr__url">${description_url_text}</div>
                    ${description_extra_text}
                </${header}>
            </div>`

            caixaLoginModal.openForRedirect({
                content: template,
                url: aLink.href,
                new_tab: new_tab
            })
        }, { capture: true });
    })
}

/**
 * Show the failed modal.
 *
 * @param {string} modal_class_name The class.
 * @param {string} description The description.
 * @param {string} button_label The button label.
 * @param {string} button_class The button class.
 */
function modalFailedTemplate(modal_class_name, description, button_label, button_class) {
    const modalFailed = new CaixaModal({className: modal_class_name});
    modalFailed.open(`<div class="bg-[#F6F5F3] mt-[54px] rounded-[24px] flex gap-[16px] px-[24px] py-[16px]">
        <div>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="12" fill="#EEADBE"/>
                <path d="M8 8.26667L15.7333 15.7333" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 15.7333L15.7333 8.26667" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="flex flex-col gap-2">
            <h5 class="m-0 p-0 text-[18px] leading-[21.6px] text-theme-primary-color font-medium">${description}</h5>
        </div>
    </div>
    <div>
        <button class="${button_class} btn btn-pill btn-primary font-semibold block w-full text-center">${button_label}</button>
    </div>`)
}

/**
 * Display a loading modal
 */
function modalLoadingTemplate(){
    const modalLoading = new CaixaModal({className: 'loading', showCloseBtn: false});
    modalLoading.open(`<div class="redirect-logo">
        <div class="redirect-logo__circle"></div>
    </div>`)
}

/**
 * Remove the loading modal.
 */
function modalLoadingClose(){
    document.querySelector('.c-modal.c-modal--loading')?.remove();
}

/**
 * Show the login template.
 *
 * @param {string} modal_class_name The modal class.
 * @param {string} icon_svg The icon svg.
 * @param {string} title_1 The title 1.
 * @param {string} sub_title_1 The sub title 1.
 * @param {string} descr_1 The description 1.
 * @param {string} title_2 The title 2.
 * @param {string} btn_2 The button 2.
 * @param {string} descr_2 The description 2.
 * @param {string} btn_class The button class.
 */
function modalLoginTemplate(modal_class_name, url, icon_svg, title_1, sub_title_1, descr_1, title_2, btn_2, descr_2, btn_class='') {
    const savedSearchLoginHtml = `<div class="px-[24px] pt-[24px] lg:px-10 lg:pt-[64px]">
        <div class="flex gap-2 items-center pb-[24px]">
            <div>${icon_svg}</div>
            <h4 class="text-[#333333] m-0 p-0 text-[24px] leading-[28.8px] font-medium">${title_1}</h4>
        </div>
        <div>
            <h5 class="m-0 p-0 text-[18px] leading-[21.6px] font-medium text-[#333333] pb-2">${sub_title_1}</h5>
            <div>${descr_1}</div>
        </div>
    </div>
    <div class="bg-[#E5EBEC] px-[24px] lg:px-10 pt-10 pb-[24px] rounded-b-none lg:rounded-b-[24px] rounded-[24px] w-full box-border flex flex-col items-center gap-[24px]">
        <h5 class="m-0 p-0 text-[18px] leading-[21.6px] font-medium text-theme-primary-color text-center">${title_2}</h5>
        <div class='w-full'>
            <a href='${url}' target="_blank" class="btn btn-pill btn-primary font-semibold block w-full text-center ${btn_class}">${btn_2}</a>
        </div>
        <div class="font-[Roboto] text-[12px] leading-[14.06px] text-[#333333] font-normal">${descr_2}</div>
        <div class="flex gap-[24px] justify-center">
            <div>
                <svg width="52" height="10" viewBox="0 0 52 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M36.9162 3.89916V2.60578H34.8695V0.176758H33.3984V7.91808C33.3984 9.05373 34.1595 9.81083 35.3172 9.81083H36.8778V8.51745H34.8695V3.90547H36.9162V3.89916Z" fill="#003C46"/>
                    <path d="M44.4686 6.85197H39.3072C39.4095 8.23368 39.9979 8.76995 41.2963 8.76995C42.2621 8.76995 42.6778 8.53021 42.9976 7.70371L44.3215 8.18951C43.8291 9.38194 42.6906 9.94977 41.2835 9.94977C39.1793 9.94977 37.8105 8.55544 37.8105 6.41033C37.8105 4.27784 39.224 2.83936 41.2131 2.83936C43.1447 2.83936 44.4878 4.16428 44.4878 6.2526C44.4878 6.46711 44.4878 6.58068 44.4686 6.85197ZM39.3264 5.78573H43.0168C42.9592 4.47973 42.4284 3.98131 41.2323 3.98131C40.0747 3.98131 39.4543 4.54914 39.3264 5.78573Z" fill="#003C46"/>
                    <path d="M51.9194 5.25555V9.85492H50.4292L50.442 8.62464H50.4036C49.8663 9.65303 48.8686 10 47.954 10C46.5213 10 45.6387 9.27448 45.6387 8.0505C45.6387 6.54893 46.9946 5.82338 49.3675 5.82338H50.4292V5.26817C50.4292 4.39751 49.7832 3.9748 48.7662 3.9748C47.8133 3.9748 47.2376 4.33442 47.2376 5.29341L45.9201 5.2871C45.9201 3.93694 46.969 2.72559 48.9581 2.72559C50.8257 2.72559 51.9194 3.65303 51.9194 5.25555ZM50.4292 6.76975H49.4442C48.1139 6.76975 47.1737 7.16092 47.1737 7.94956C47.1737 8.53 47.5894 8.89593 48.4145 8.89593C49.4826 8.89593 50.4292 7.65934 50.4292 6.76975Z" fill="#003C46"/>
                    <path d="M2.41606 1.41956V3.70347H6.58616V5.14195H2.41606V9.79811H0.855469V0.353313C0.855469 0.157729 1.01537 0 1.21364 0H7.25773V1.41956H2.41606Z" fill="#003C46"/>
                    <path d="M14.0815 5.20529V9.80466H12.5913L12.6041 8.57438H12.5657C12.0284 9.60277 11.0307 9.94977 10.1161 9.94977C8.68341 9.94977 7.80078 9.22422 7.80078 8.00025C7.80078 6.49867 9.1567 5.77312 11.5296 5.77312H12.5913V5.21791C12.5913 4.34725 11.9453 3.92454 10.9284 3.92454C9.97537 3.92454 9.39975 4.28416 9.39975 5.24315L8.0822 5.23684C8.0822 3.88668 9.13112 2.67532 11.1202 2.67532C12.9942 2.66902 14.0815 3.60277 14.0815 5.20529ZM12.5977 6.71949H11.6127C10.2824 6.71949 9.34219 7.11066 9.34219 7.8993C9.34219 8.47974 9.75792 8.84567 10.583 8.84567C11.6511 8.83936 12.5977 7.60277 12.5977 6.71949Z" fill="#003C46"/>
                    <path d="M20.6257 7.24926C20.485 8.39121 19.7367 8.63727 18.707 8.63727C17.2423 8.63727 16.833 7.90541 16.833 6.33443C16.833 4.75715 17.3511 4.03159 18.8157 4.03159C19.7751 4.03159 20.3507 4.32812 20.5682 5.23033H22.116C21.9881 3.45115 20.4786 2.68774 18.8285 2.68774C16.6219 2.68774 15.2148 4.14516 15.2148 6.33443C15.2148 8.52371 16.5132 9.98112 18.7198 9.98112C20.7792 9.98112 22.084 9.15462 22.0968 7.24926H20.6257Z" fill="#003C46"/>
                    <path d="M26.7773 0.908691H28.2804V9.8109H26.7773V0.908691Z" fill="#003C46"/>
                    <path d="M30.0531 0.940024C30.0403 0.403747 30.3601 0.113525 30.9038 0.113525C31.441 0.113525 31.748 0.397437 31.7544 0.940024C31.7672 1.48892 31.4602 1.79807 30.9038 1.79807C30.3729 1.80438 30.0659 1.48892 30.0531 0.940024Z" fill="#003C46"/>
                    <path d="M31.6593 2.94629H30.1562V9.80433H31.6593V2.94629Z" fill="#003C46"/>
                    <path d="M23.3558 2.94662C23.343 2.41034 23.6628 2.12012 24.2065 2.12012C24.7437 2.12012 25.0507 2.40403 25.0571 2.94662C25.0699 3.49551 24.7629 3.80466 24.2065 3.80466C23.6692 3.81097 23.3686 3.49551 23.3558 2.94662Z" fill="#003C46"/>
                    <path d="M24.9542 5.04736H23.4512V9.81077H24.9542V5.04736Z" fill="#003C46"/>
                </svg>
            </div>
            <div>
                <svg width="77" height="10" viewBox="0 0 77 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32.0485 4.34528V3.22874H30.2816V1.13184H29.0117V7.8147C29.0117 8.79507 29.6688 9.44866 30.6681 9.44866H32.0153V8.33212H30.2816V4.35072H32.0485V4.34528Z" fill="#003C46"/>
                    <path d="M38.57 6.89415H34.1143C34.2026 8.08694 34.7106 8.54989 35.8314 8.54989C36.6651 8.54989 37.024 8.34292 37.3001 7.62943L38.443 8.04881C38.0179 9.0782 37.0351 9.56839 35.8204 9.56839C34.0038 9.56839 32.8223 8.36471 32.8223 6.5129C32.8223 4.67198 34.0425 3.43018 35.7596 3.43018C37.4271 3.43018 38.5866 4.57394 38.5866 6.37674C38.5866 6.56192 38.5866 6.65995 38.57 6.89415ZM34.1308 5.9737H37.3167C37.267 4.84627 36.8087 4.41599 35.7762 4.41599C34.7768 4.41599 34.2413 4.90618 34.1308 5.9737Z" fill="#003C46"/>
                    <path d="M45.0021 5.51632V9.48683H43.7156L43.7266 8.42476H43.6935C43.2297 9.31254 42.3684 9.6121 41.5788 9.6121C40.342 9.6121 39.5801 8.98575 39.5801 7.92913C39.5801 6.63286 40.7506 6.00651 42.799 6.00651H43.7156V5.52722C43.7156 4.7756 43.1579 4.41068 42.28 4.41068C41.4573 4.41068 40.9604 4.72114 40.9604 5.549L39.823 5.54356C39.823 4.378 40.7285 3.33228 42.4457 3.33228C44.0579 3.33228 45.0021 4.13291 45.0021 5.51632ZM43.7156 6.82349H42.8653C41.7168 6.82349 40.9052 7.16117 40.9052 7.84198C40.9052 8.34306 41.2641 8.65896 41.9763 8.65896C42.8984 8.65896 43.7156 7.59144 43.7156 6.82349Z" fill="#003C46"/>
                    <path d="M2.26714 2.20496V4.17659H5.86707V5.4184H2.26714V9.43792H0.919922V1.2845C0.919922 1.11566 1.05796 0.979492 1.22912 0.979492H6.44681V2.20496H2.26714Z" fill="#003C46"/>
                    <path d="M12.338 5.47265V9.44316H11.0515L11.0626 8.38109H11.0294C10.5656 9.26887 9.7043 9.56843 8.91475 9.56843C7.67796 9.56843 6.91602 8.94208 6.91602 7.88545C6.91602 6.58919 8.08654 5.96284 10.135 5.96284H11.0515V5.48355C11.0515 4.73193 10.4939 4.36701 9.61596 4.36701C8.79328 4.36701 8.29636 4.67746 8.29636 5.50533L7.15896 5.49988C7.15896 4.33433 8.06446 3.2886 9.7816 3.2886C11.3994 3.28316 12.338 4.08924 12.338 5.47265ZM11.057 6.77981H10.2068C9.05831 6.77981 8.24667 7.1175 8.24667 7.79831C8.24667 8.29939 8.60555 8.61529 9.31781 8.61529C10.2399 8.60984 11.057 7.54233 11.057 6.77981Z" fill="#003C46"/>
                    <path d="M17.9855 7.23739C17.8641 8.2232 17.2181 8.43562 16.3291 8.43562C15.0647 8.43562 14.7114 7.80382 14.7114 6.44764C14.7114 5.08602 15.1586 4.45967 16.423 4.45967C17.2512 4.45967 17.7481 4.71565 17.9358 5.4945H19.272C19.1616 3.95859 17.8585 3.29956 16.434 3.29956C14.5292 3.29956 13.3145 4.5577 13.3145 6.44764C13.3145 8.33758 14.4353 9.59572 16.3402 9.59572C18.118 9.59572 19.2444 8.88223 19.2554 7.23739H17.9855Z" fill="#003C46"/>
                    <path d="M23.2988 1.76367H24.5963V9.4487H23.2988V1.76367Z" fill="#003C46"/>
                    <path d="M26.1253 1.79089C26.1143 1.32793 26.3903 1.07739 26.8597 1.07739C27.3235 1.07739 27.5885 1.32249 27.594 1.79089C27.605 2.26473 27.34 2.53161 26.8597 2.53161C26.4014 2.53706 26.1364 2.26473 26.1253 1.79089Z" fill="#003C46"/>
                    <path d="M27.5124 3.52271H26.2148V9.44306H27.5124V3.52271Z" fill="#003C46"/>
                    <path d="M20.3441 3.52306C20.333 3.06011 20.6091 2.80957 21.0784 2.80957C21.5422 2.80957 21.8072 3.05466 21.8128 3.52306C21.8238 3.99691 21.5588 4.26379 21.0784 4.26379C20.6146 4.26923 20.3551 3.99691 20.3441 3.52306Z" fill="#003C46"/>
                    <path d="M21.7253 5.33667H20.4277V9.44878H21.7253V5.33667Z" fill="#003C46"/>
                    <path d="M73.3531 3.22217C75.117 3.22217 76.1447 4.04161 76.1447 5.59717V9.86106H75.2281V8.13883C74.7975 9.44439 73.7142 9.99995 72.492 9.99995C71.0892 9.99995 70.2559 9.33328 70.2559 8.24995C70.2559 6.98606 71.2697 6.26383 73.492 6.26383H75.2281V5.62495C75.2281 4.54161 74.5753 4.04161 73.3392 4.04161C71.9781 4.04161 71.3253 4.56939 71.3253 5.77772L70.4503 5.58328C70.4642 4.16661 71.4225 3.22217 73.3531 3.22217ZM72.742 9.24995C73.9503 9.24995 75.1447 8.61106 75.2281 7.02772H73.5753C71.9364 7.02772 71.1864 7.3055 71.1864 8.16661C71.1864 8.84717 71.7697 9.24995 72.742 9.24995Z" fill="#003C46"/>
                    <path d="M66.469 9.99995C64.719 9.99995 63.6079 9.20828 63.4551 7.73606L64.3717 7.56939C64.4967 8.73606 65.2467 9.23606 66.4829 9.23606C67.5245 9.23606 68.1634 8.87495 68.1634 8.11106C68.1634 7.47217 67.8579 7.20828 66.8579 7.0555L65.4551 6.84717C64.2606 6.66661 63.7606 6.12495 63.7606 5.11106C63.7606 3.88883 64.719 3.22217 66.3023 3.22217C67.8856 3.22217 68.8579 3.84717 68.9829 5.27772L68.0662 5.44439C67.9412 4.37495 67.3717 3.98606 66.3023 3.98606C65.2467 3.98606 64.6634 4.31939 64.6634 5.04161C64.6634 5.6805 64.9273 5.9305 65.7745 6.04161L67.2606 6.26383C68.5245 6.45828 69.0801 6.99995 69.0801 7.98606C69.0801 9.27772 68.0523 9.99995 66.469 9.99995Z" fill="#003C46"/>
                    <path d="M59.2457 3.22217C61.0095 3.22217 62.0373 4.04161 62.0373 5.59717V9.86106H61.1207V8.13883C60.6901 9.44439 59.6068 9.99995 58.3845 9.99995C56.9818 9.99995 56.1484 9.33328 56.1484 8.24995C56.1484 6.98606 57.1623 6.26383 59.3845 6.26383H61.1207V5.62495C61.1207 4.54161 60.4679 4.04161 59.2318 4.04161C57.8707 4.04161 57.2179 4.56939 57.2179 5.77772L56.3429 5.58328C56.3568 4.16661 57.3151 3.22217 59.2457 3.22217ZM58.6345 9.24995C59.8429 9.24995 61.0373 8.61106 61.1207 7.02772H59.4679C57.829 7.02772 57.079 7.3055 57.079 8.16661C57.079 8.84717 57.6623 9.24995 58.6345 9.24995Z" fill="#003C46"/>
                    <path d="M50.6291 10C47.6847 10 45.9902 8.18056 45.9902 5.01389C45.9902 1.81944 47.6847 0 50.6152 0C53.0319 0 54.6291 1.38889 54.9486 3.91667L53.9486 4.125C53.6986 1.90278 52.6013 0.902778 50.6013 0.902778C48.143 0.902778 47.0041 2.15278 47.0041 5C47.0041 7.84722 48.1569 9.09722 50.6152 9.09722C52.6291 9.09722 53.7402 8.06944 53.9902 5.77778L54.9763 5.97222C54.6708 8.56945 53.0458 10 50.6291 10Z" fill="#003C46"/>
                </svg>
            </div>
        </div>
    </div>`

    const caixaSavedSearchesNoLoginModal = new CaixaModal({className: modal_class_name});
    caixaSavedSearchesNoLoginModal.open(savedSearchLoginHtml)

    prepareLinkModal();
}

/**
 * Construct the failed template.
 *
 * @param {string} modal_class_name The modal class.
 * @param {string} description The description.
 * @param {string} button_label The button label.
 * @param {string} button_class The button class.
 */
function modalFailedTemplate(modal_class_name, description, button_label, button_class) {
    const modalFailed = new CaixaModal({className: modal_class_name});
    modalFailed.open(`<div class="bg-[#F6F5F3] mt-[54px] rounded-[24px] flex gap-[16px] px-[24px] py-[16px]">
        <div>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="12" fill="#EEADBE"/>
                <path d="M8 8.26667L15.7333 15.7333" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 15.7333L15.7333 8.26667" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="flex flex-col gap-2">
            <h5 class="m-0 p-0 text-[18px] leading-[21.6px] text-theme-primary-color font-medium">${description}</h5>
        </div>
    </div>
    <div>
        <button class="${button_class} btn btn-pill btn-primary font-semibold block w-full text-center">${button_label}</button>
    </div>`)
}

/**
 * Construct the wishlist success template.
 *
 * @param {string} icon_message The icon message.
 */
function modalWishlistSuccessTemplate(icon_message) {
    const modalSuccess = new CaixaModal({className: 'wishlist-success'});
    modalSuccess.open(`<div class="bg-[#F2F3FF] mt-[54px] rounded-[24px] flex gap-[16px] px-[24px] py-[16px] mb-[6px]">
        <div>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="12" fill="#D7DBFF"/>
                <path d="M17.1289 9L10.5511 15.5778C10.0933 16.0142 9.37339 16.0142 8.91556 15.5778L6 12.6978" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="flex flex-col gap-2">
            <h5 class="m-0 p-0 text-[18px] leading-[21.6px] text-theme-primary-color font-medium">${icon_message}</h5>
        </div>
    </div>
    <div>
        <h4 class="m-0 p-0 text-[24px] leading-[28.8px] font-medium text-[#333333] text-center">${modal_options.wishlist_success_title}</h4>
        <div class="font-[Roboto] text-[16px] leading-[20.8px] text-[#333333] text-center pt-[12px]">${modal_options.wishlist_success_descr}</div>
    </div>
    <div>
        <a href="/${wishlist_url}" class="btn btn-pill btn-primary font-semibold block w-full text-center">${modal_options.wishlist_success_btn_lbl}</a>
    </div>`)

    const wishlistBtn = document.querySelector('.c-modal--wishlist-success a.btn.btn-primary');
    wishlistBtn?.addEventListener('click', function(e){
        e.preventDefault();
        if (typeof TealiumTracker !== 'undefined') {
            const tealium_object = new TealiumTracker();
            const d = window.__lastWishlistProductDataset || {};
            const event_data = {
                'event_category': 'añadir favorito',
                'event_action': 'click en boton',
                'event_label': e.currentTarget.textContent.trim().toLowerCase(),
                'prod_category': d.category || '',
                'prod_id': d.ref || '',
                'prod_rooms': d.rooms || '',
                'prod_bathrooms': d.bathrooms || '',
                'prod_type': d.subcategory || '',
                'prod_surface': d.surface || '',
                'prod_status': d.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                'prod_floor': d.floor || '',
                'prod_state': d.state || '',
                'prod_pvp_price': d.pvpPrice || '',
                'prod_pvp_sale': d.pvpSale || '',
                'prod_energy_cert': d.energyCert || '',
                'prod_owner': d.agent || '',
                'prod_publication_status': d.websiteStatus || '',
                'prod_publication_date': d.publicationDate || '',
                'prod_characteristics': d.characteristics || '',
                'prod_otherfilters': d.otherFilters || '',
                'events': 'pageview, prodView'
            };
            tealium_object.trackEvent(event_data, 'link');
        }

        const href = e.currentTarget.href;

        setTimeout(() => {
            window.location.href = href;
        }, 150);
    });
}

document.addEventListener('DOMContentLoaded', function(event) {
    prepareLinkModal()
})

window.addEventListener('pageshow', (event) => {
    if (event.persisted) {
        document.querySelectorAll('.c-modal').forEach(modal => modal.remove());
    }
});
