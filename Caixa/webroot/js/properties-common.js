const is_guest = !document.cookie.split('; ').some(cookie => cookie.startsWith('ctkn='));

/**
 * Add to wishlist.
 *
 * @param {string} property_id The property id.
 * @param {boolean} show_popup Show popup or not.
 */
function addToWishlist(property_id, show_popup = true) {
    try {
        const propertyElem = document.querySelector(`.property-item[id="${property_id}"]`);
        if (propertyElem) {
            window.__lastWishlistProductDataset = {
                category: propertyElem.dataset.category || '',
                ref: propertyElem.dataset.ref || '',
                rooms: propertyElem.dataset.rooms || '',
                bathrooms: propertyElem.dataset.bathrooms || '',
                subcategory: propertyElem.dataset.subcategory || '',
                surface: propertyElem.dataset.surface || '',
                constructionStage: propertyElem.dataset.constructionStage || '',
                floor: propertyElem.dataset.floor || '',
                state: propertyElem.dataset.state || '',
                pvpPrice: propertyElem.dataset.pvpPrice || '',
                pvpSale: propertyElem.dataset.pvpSale || '',
                energyCert: propertyElem.dataset.energyCert || '',
                agent: propertyElem.dataset.agent || '',
                websiteStatus: propertyElem.dataset.websiteStatus || '',
                publicationDate: propertyElem.dataset.publicationDate || '',
                characteristics: propertyElem.dataset.characteristics || '',
                otherFilters: propertyElem.dataset.otherFilters || ''
            };
        }
    } catch (e) {}
    modalLoadingTemplate();
    fetch('/api/favorites/add/', {
        method: 'POST',
        body: JSON.stringify({properties: [property_id]}),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        },
    }).then(function (response) {
        return response.json();
    }).then(function (response) {
        document.dispatchEvent(new CustomEvent('qobrix-wishlist:add-action', {detail: {id: property_id, response: response}}))
        if (!show_popup) {
            modalLoadingClose();
            return;
        }

        if (response.status) {
            modalWishlistSuccessTemplate(modal_options.wishlist_success_message)
        } else {
            modalFailedTemplate('saved-searches-failed', modal_options.wishlist_failed_message, modal_options.wishlist_failed_btn_lbl, 'retry-to-add');
            document.querySelector('.retry-to-add').addEventListener('click', function(){
                addToWishlist(property_id)
            })
        }
    })
}

/**
 * Remove from wishlist.
 *
 * @param {string} property_id The property id.
 * @param {boolean} show_popup Show popup or not.
 */
function removeFromWishlist(property_id, show_popup = true) {
    modalLoadingTemplate();
    fetch('/api/favorites/remove/', {
        method: 'POST',
        body: JSON.stringify({properties: [property_id]}),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        },
    }).then(function (response) {
        return response.json();
    }).then(function (response) {
        document.dispatchEvent(new CustomEvent('qobrix-wishlist:remove-action', {detail: {id: property_id, response: response}}))
        if (!show_popup) {
            modalLoadingClose();
            return;
        }

        if (response.status) {
            modalWishlistSuccessTemplate(modal_options.wishlist_success_message_removed)
        } else {
            modalFailedTemplate('saved-searches-failed', modal_options.wishlist_failed_message_remove, modal_options.wishlist_failed_btn_lbl, 'retry-to-remove');
            document.querySelector('.retry-to-remove').addEventListener('click', function(){
                removeFromWishlist(property_id)
            })
        }
    })
}

/**
 * Listen to the wishlist events.
 */
function wishlistPrepareEventsByLogin() {
    const wishlist_btns = document.querySelectorAll('.wishlist-btn')

    if (is_guest) {
        wishlist_btns.forEach(elem => {
            elem.addEventListener('click', function(e){
                e.preventDefault();
                e.stopPropagation();

                const icon_svg = `<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="#CACFFF"/>
                    <path d="M20.5167 27.3418C20.2334 27.4418 19.7667 27.4418 19.4834 27.3418C17.0667 26.5168 11.6667 23.0752 11.6667 17.2418C11.6667 14.6668 13.7417 12.5835 16.3001 12.5835C17.8167 12.5835 19.1584 13.3168 20.0001 14.4502C20.8417 13.3168 22.1917 12.5835 23.7001 12.5835C26.2584 12.5835 28.3334 14.6668 28.3334 17.2418C28.3334 23.0752 22.9334 26.5168 20.5167 27.3418Z" fill="#003C46" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>`

                modalLoginTemplate('wishlist-no-login', login_url + '&medio=favoritos', icon_svg, modal_options.wishlist_login_title_1, modal_options.wishlist_login_sub_title_1, modal_options.wishlist_login_descr_1, modal_options.wishlist_login_title_2, modal_options.wishlist_login_btn_2, modal_options.wishlist_login_descr_2, 'whislist-access-registrt-btn')
            })
        })

        return;
    }

    Wishlist.enableWishlistBtns()

    wishlist_btns.forEach(elem => {
        if (!elem.classList.contains('c-wishlist-api-ready')) {
            elem.classList.add('c-wishlist-api-ready')
            elem.addEventListener('wishlist:added', function(e){
                addToWishlist(e.detail.id)
            })

            elem.addEventListener('wishlist:removed', function(e){
                removeFromWishlist(e.detail.id)
            })
        }
    })
}

(function() {
    /**
     * Reload favories list in localStorage
     */
    function checkReloadFavorites() {
        const cookie_name = 'ctkn_rl';
        if (document.cookie.split('; ').some(cookie => cookie.startsWith(cookie_name + '='))) {
            fetch('/api/favorites/update-favorites-list/', {
                method: 'POST',
                body: JSON.stringify({properties: Wishlist.retrieveList()}),
                headers: {
                    'Content-type': 'application/json; charset=UTF-8'
                },
            }).then(function (response) {
                return response.json();
            }).then(function (response) {
                Wishlist.resetList(response)
            })
            document.cookie = `${cookie_name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
        }
    }

    /**
     * Handle access registry click.
     *
     * @param {Event} e The event.
     */
    function handleAccessRegistryClick(e) {
        if (typeof TealiumTracker === 'undefined') {
            return;
        }
        e.preventDefault();
        const tealium_object = new TealiumTracker();
        const event_data = {
            "events": "click_access",
            "event_category": "acceder favoritos",
            "event_action": "click en texto",
            "event_label": e.currentTarget.textContent.trim()
        };
        tealium_object.trackEvent(event_data, 'link');

        setTimeout(() => {
            window.location.href = e.currentTarget.href;
        }, 500);
    }

    /**
     * Observe access registry buttons.
     */
    function observeAccessRegistryButtons() {
        const observer = new MutationObserver(() => {
            document.querySelectorAll('.whislist-access-registrt-btn').forEach(btn => {
                if (!btn.dataset.listenerAdded) {
                    btn.dataset.listenerAdded = "true";
                    btn.addEventListener('click', handleAccessRegistryClick);
                }
            });
        });

        observer.observe(document.body, { childList: true, subtree: true });
    }

    /**
     * Handle wishlist events.
     *
     * @param {Event} event The event.
     */
    document.addEventListener('wishlist:events', function (event) {
        event.stopImmediatePropagation()
    }, true);

    /**
     * Handle DOMContentLoaded.
     */
    document.addEventListener('DOMContentLoaded',function(){
        wishlistPrepareEventsByLogin()
        observeAccessRegistryButtons()

        if (!is_guest) {
            checkReloadFavorites()

            document.addEventListener('wishlist:data-ready', function fn(){
                wishlistPrepareEventsByLogin()
                checkReloadFavorites()
            })
        }

        // Change Submit Button label on Mobile Screen
        const submitBtn = document.querySelector("#submit-btn");
        submitBtn.innerHTML = submitBtn.dataset.defaultLabelMobile;

    })
})();
