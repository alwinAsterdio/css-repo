class TealiumTracker {
    /**
     * Constructor.
     */
    constructor() {
        this.initEventListeners();
    }

    /**
     * Track an event.
     *
     * @param {Object} data The event data.
     * @param {string} type The event type.
     */
    trackEvent(data, type = 'view') {
        const merged_data = {
            ...tealium_data,
            ...data
        };
        if (typeof utag === 'object') {
            if (type === 'view' && typeof utag.view === 'function') {
                utag.view(merged_data);
            } else if (type === 'link' && typeof utag.link === 'function') {
                utag.link(merged_data);
            }
        }
    }

    /**
     * Initialize event listeners.
     */
    initEventListeners() {
        document.addEventListener('DOMContentLoaded', () => {
            this.trackMenuClicks();
            this.trackLoginButtonClick();
            this.trackFooterLinks();
            this.trackMyAccountBtnClick();
            this.trackuserMenuMyProfileClicks();
            this.trackuserMenuFavoritesClicks();
        });
    }

    /**
     * Track menu clicks.
     */
    trackMenuClicks() {
        let links = document.querySelectorAll('.top-menu-div a');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                this.trackEvent({
                    "events": "click_mainCategoryMenu",
                    "event_category": "menu F.C",
                    "event_action": "click en texto",
                    "event_label": link.textContent
                }, 'link');

                setTimeout(() => {
                    window.location.href = link.href;
                }, 200);
            });
        });
    }

    /**
     * Track login button clicks.
     */
    trackLoginButtonClick() {
        let loginBtns = document.querySelectorAll('.user-menu-button--guest');

        if (!loginBtns) return;
        loginBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                this.trackEvent({
                    "events": "click_loginMenu",
                    "event_category": "iniciar sesion menu F.C",
                    "event_action": "click en boton",
                    "event_label": e.currentTarget.textContent.trim()
                }, 'link');

                setTimeout(() => {
                    window.location.href = btn.href;
                }, 2000);
            });
        });
    }

    /**
     * Track footer links.
     */
    trackFooterLinks() {
        let footerLinks = document.querySelectorAll('.footer-menu-links__item a');
        if (!footerLinks.length) return;

        footerLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                this.trackEvent({
                    "events": 'click_element',
                    "event_category": 'menu footer',
                    "event_action": 'click en texto',
                    "event_label": link.textContent.trim()
                }, 'link');

                setTimeout(() => {
                    window.location.href = link.href;
                }, 200);
            });
        });
    }

    trackMyAccountBtnClick() {
        let myAccountBtns = document.querySelectorAll('.user-menu-button--logged-in');
        if (!myAccountBtns) return;
        myAccountBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.trackEvent({
                    "events": "click_myCountMenu",
                    "event_category": "menu mi cuenta",
                    "event_action": "click en texto",
                    "event_label": e.currentTarget.textContent.trim()
                }, 'link');
            });
        });
    }

    trackuserMenuMyProfileClicks() {
        let userMenuBtns = document.querySelectorAll('.top_user_menu');
        if (!userMenuBtns) return;
        userMenuBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                this.trackEvent({
                    "events": "click_menuSelection",
                    "event_category": "menu mi cuenta",
                    "event_action": "click en texto",
                    "event_label": e.currentTarget.textContent.trim()
                }, 'link');

                setTimeout(() => {
                    window.location.href = btn.href;
                }, 500);
            });
        });
    }

    trackuserMenuFavoritesClicks() {
        let userMenuBtns = document.querySelectorAll('.side_user_menu');
        if (!userMenuBtns) return;
        userMenuBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                this.trackEvent({
                    "events": "click_menuSelection",
                    "event_category": "menu lateral",
                    "event_action": "click en texto",
                    "event_label": e.currentTarget.textContent.trim(),
                }, 'link');

                setTimeout(() => {
                    window.location.href = btn.href;
                }, 500);
            });
        });
    }
}

new TealiumTracker();
