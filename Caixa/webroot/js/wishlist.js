(function() {
    const contact_phone_svg = `<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.7896 6.16671C15.6035 6.32551 16.3516 6.72359 16.938 7.30999C17.5244 7.89639 17.9224 8.64443 18.0812 9.45837M14.7896 2.83337C16.4806 3.02124 18.0576 3.77852 19.2614 4.98088C20.4653 6.18324 21.2246 7.75922 21.4146 9.45004M20.5812 16.1V18.6C20.5822 18.8321 20.5346 19.0618 20.4417 19.2745C20.3487 19.4871 20.2123 19.678 20.0413 19.8349C19.8703 19.9918 19.6684 20.1113 19.4485 20.1856C19.2287 20.26 18.9957 20.2876 18.7646 20.2667C16.2003 19.9881 13.7371 19.1118 11.5729 17.7084C9.55943 16.4289 7.85236 14.7219 6.57291 12.7084C5.16456 10.5344 4.28811 8.0592 4.01458 5.48337C3.99375 5.25293 4.02114 5.02067 4.09499 4.80139C4.16885 4.58211 4.28755 4.38061 4.44355 4.20972C4.59954 4.03883 4.78941 3.9023 5.00107 3.80881C5.21272 3.71532 5.44153 3.66693 5.67291 3.66671H8.17291C8.57733 3.66273 8.9694 3.80594 9.27604 4.06965C9.58269 4.33336 9.78297 4.69958 9.83958 5.10004C9.9451 5.9001 10.1408 6.68565 10.4229 7.44171C10.535 7.73998 10.5593 8.06414 10.4928 8.37577C10.4264 8.68741 10.272 8.97347 10.0479 9.20004L8.98958 10.2584C10.1759 12.3447 11.9033 14.0721 13.9896 15.2584L15.0479 14.2C15.2745 13.976 15.5605 13.8216 15.8722 13.7551C16.1838 13.6887 16.508 13.7129 16.8062 13.825C17.5623 14.1072 18.3479 14.3029 19.1479 14.4084C19.5527 14.4655 19.9224 14.6694 20.1867 14.9813C20.451 15.2932 20.5914 15.6914 20.5812 16.1Z" stroke="#003C46" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`

    let map_coordinates = [];
    let visible_map_coordinates = [];
    let num_saved = 0;

    /**
     * Update wishlist counter number.
     */
    function update_wishlist_items_counter(){
        document.querySelector('.wishlist-counter').innerHTML = document.querySelectorAll('#section-listing-1 .property-item').length
    }

    /**
     * Update num_saved count by counting unique property IDs.
     */
    function updateNumSavedCount() {
        const unique_property_ids = new Set();
        document.querySelectorAll('.property-item:not(.loading-wishlist-item):not(.wishlist_item_hidden)').forEach(item => {
            unique_property_ids.add(item.id);
        });
        num_saved = unique_property_ids.size;
    }

    /**
     * Returns the mapped property category based on the provided category.
     */
    function getPropertyCategory(category) {
        switch (category) {
            case 'house': return 'casa';
            case 'apartment': return 'piso';
            default: return category;
        }
    }

    /**
     * Retrieves listing tab details based on the provided tab element.
     *
     */
    function getPageDetails(tab, page_subcategory1 = true, page_subcategory2 = true, page_type = true) {
        const activeSaleRentTab = document.querySelector('.p-listing__sale-rent-tabs__item--active');
        const saleRent = activeSaleRentTab?.getAttribute('data-value');

        const saleRentMapping = {
            'for_sale': 'compra',
            'for_rent': 'alquiler'
        };

        const listingPageType = {
            'section-listing-1': 'result lista',
            'section-listing-2': 'result grid',
            'section-map': 'result map'
        };

        const listingPageSubcategory = {
            'section-listing-1': 'vista lista',
            'section-listing-2': 'vista grid',
            'section-map': 'vista mapa'
        };

        let tabValue = tab?.getAttribute("data-tab");

        if (!tabValue) return {};

        const result = {};

        if (page_subcategory1) {
            const value = listingPageSubcategory[tabValue] || '';
            if (value) result.page_subcategory1 = value;
        }

        if (page_subcategory2) {
            const value = saleRentMapping[saleRent] || saleRent || '';
            if (value) result.page_subcategory2 = value;
        }

        if (page_type) {
            const value = listingPageType[tabValue] || '';
            if (value) result.page_type = value;
        }

        return result;
    }

    /**
     * Finds and retrieves details of the currently active listing tab.
     *
     */
    function getActivePageDetails(page_subcategory1 = true, page_subcategory2 = true, page_type = true) {
        let activePage = document.querySelector('.p-listing__actions__tab--active');
        return getPageDetails(activePage, page_subcategory1, page_subcategory2, page_type);
    }

    /**
         * This will move the element in the list based on the results sorting.
         *
         * @param {string} selector The selector
         */
    function moveObject(selector) {
        const property_elem = document.querySelector(selector);
        const parent_div = property_elem.parentNode;
        const new_property_elem = property_elem.cloneNode(true)
        new_property_elem.querySelectorAll('.wishlist-btn--loaded').forEach(_elem => {
            _elem.classList.remove('wishlist-btn--loaded')
            _elem.classList.remove('c-wishlist-api-ready')
        })
        property_elem.remove();
        parent_div.appendChild(new_property_elem);

        return document.querySelector(selector);
    }

    /**
     * Display the properties based on the sale rent value.
     */
    function checkStatus(){
        const sale_rent = document.querySelector('#sale_rent')
        if (sale_rent.value === 'for_sale_and_rent') {
            document.querySelectorAll('.property-item').forEach(_elm => {
                _elm.classList.remove('sale_rent_hidden');
            })
        } else {
            document.querySelectorAll('.property-item').forEach(_elm => {
                const property_status = _elm.getAttribute('data-sale-rent');
                if (sale_rent.value !== property_status && property_status !== 'for_sale_and_rent') {
                    _elm.classList.add('sale_rent_hidden');
                } else {
                    _elm.classList.remove('sale_rent_hidden');
                }
            })
        }

        resetMapCoordinates();
    }

    /**
     * Show the pins on map based on the sale_rent value.
     */
    function resetMapCoordinates(){
        const sale_rent = document.querySelector('#sale_rent')
        visible_map_coordinates = map_coordinates.filter(item => item.sale_rent === sale_rent.value || sale_rent.value === 'for_sale_and_rent' || item.sale_rent === 'for_sale_and_rent');
        QoetixMap.loadMarkers(visible_map_coordinates)
        QoetixMap.resetMapPosition()
    }

    /**
     * The second template for renderinf the layout 2.
     * @param {string} id The id.
     * @returns {string}
     */
    function prepare_wishlist_template_2(id){
        return `<a href='' class="property-item property-grid-item loading-wishlist-item-2" id="${id}" data-sale-rent="">
        <div class="property-item__inner">
            <div class="property-item__inner__row1">
                <div class="property-item__inner__row1__div">
                    <div class="box-border qoetix-gallery-section qoetix-gallery" data-pagination='1'>
                        <img src="${default_img}" alt="property-image" loading="lazy" class="w-full h-full object-cover rounded-[16px]"/>
                        <span class="wishlist-loading-icon"></span>
                    </div>
                    <div class="property-item__inner__row1__div__agent"></div>
                </div>
                <div class="heart-icon wishlist-btn">
                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.465 15.6077C9.21 15.6977 8.79 15.6977 8.535 15.6077C6.36 14.8652 1.5 11.7677 1.5 6.5177C1.5 4.2002 3.3675 2.3252 5.67 2.3252C7.035 2.3252 8.2425 2.9852 9 4.0052C9.7575 2.9852 10.9725 2.3252 12.33 2.3252C14.6325 2.3252 16.5 4.2002 16.5 6.5177C16.5 11.7677 11.64 14.8652 9.465 15.6077Z" fill="none" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div class="property-item__inner__row2">
                <div class="property-item__inner__row2__details">
                    <div class="property-item__inner__row2__details__name"></div>
                    <div class="property-item__inner__row2__details__price"></div>
                </div>
                <div class="property-item__inner__row2__features"></div>
                <div class="property-item__inner__row2__agent"></div>
            </div>
        </div>
    </a>
    `
    }

    /**
     * Track page type change in Tealium.
     *
     * @param {string} page_type The page type ('result list', 'result grid', or 'result map').
     */
    function trackPageTypeChange(page_type) {
        if (typeof TealiumTracker !== 'undefined') {
            const tealium_object = new TealiumTracker();
            const event_data = {
                'page_name': 'wivai F.C:area privada:favoritos:' + page_type,
                'page_subcategory1': 'area privada',
                'page_subcategory2': 'favoritos',
                'page_type': page_type,
                'event_action': 'click en boton',
                'num_saved': num_saved,
                'events': 'pageview',
            };
            tealium_object.trackEvent(event_data, 'view');
        }
    }

    /**
     * Get current page type based on active section.
     *
     * @returns {string} The current page type.
     */
    function getCurrentPageType() {
        const active_section = document.querySelector('.p-listing__results__section--active');
        if (active_section) {
            switch (active_section.id) {
                case 'section-map':
                    return 'result map';
                case 'section-listing-2':
                    return 'result grid';
                case 'section-listing-1':
                default:
                    return 'result list';
            }
        }
        return 'result list';
    }

    /**
     * Enables the tabs logic.
     */
    function show_tabs(){
        const tabs = document.querySelectorAll('.p-listing__actions__tab')
        tabs.forEach(tab => {
            tab.addEventListener('click', function(){
                if (this.classList.contains('p-listing__actions__tab--active')) {
                    return;
                }

                document.querySelector('.p-listing__actions__tab--active').classList.remove('p-listing__actions__tab--active')
                this.classList.add('p-listing__actions__tab--active')

                document.querySelector('.p-listing__results__section--active').classList.remove('p-listing__results__section--active')
                document.querySelector('#' + this.getAttribute('data-tab')).classList.add('p-listing__results__section--active')

                const pagination_section = document.querySelector('.c-pagination-section')
                if (this.getAttribute('data-tab') === 'section-map'){
                    QoetixMap.resetMapPosition()
                    pagination_section?.classList.add('hidden')
                } else {
                    pagination_section?.classList.remove('hidden')
                }

                trackPageTypeChange(getCurrentPageType());
            })
        })
    }

    /**
     * Check screen size.
     */
    function check_size(){
        if (window.innerWidth < 1024) {
            document.querySelector('.p-listing__actions__tab[data-tab="section-listing-2"]:not(.p-listing__actions__tab--active)')?.dispatchEvent(new Event('click'))
        }
    }

    /**
     * Wishlist button events.
     */
    function wishlistBtnEvents(){
        let wishlist_btns = document.querySelectorAll('.wishlist-btn:not(.wishlist-btn--c-loaded)')
        wishlist_btns.forEach(elem => {
            elem.addEventListener('wishlist:removed', function(obj){
                document.querySelectorAll('[id="' + obj.detail.id + '"]').forEach(_elem => { _elem.remove() })
                map_coordinates = map_coordinates.filter(item => item.id !== obj.detail.id);

                resetMapCoordinates()

                setTimeout(() => {
                    update_wishlist_items_counter()
                    updateNumSavedCount();
                }, 100);

                const current_wishlist_btns = document.querySelectorAll('.wishlist-btn')
                if (current_wishlist_btns.length === 0) {
                    showNoResultsLayout()
                }
            })
            elem.classList.add('wishlist-btn--c-loaded')
        })
    }

    /**
     * Show the no result layout.
     */
    function showNoResultsLayout(){
        document.querySelectorAll('.listing-group').forEach(_elem => {
            _elem.remove()
        })


        document.querySelector('.listing-section').innerHTML = `<div class="flex flex-col items-center pt-[48px] pb-[80px] px-5 lg:w-[630px] lg:mx-auto">
            <div>
                <svg width="80" height="81" viewBox="0 0 80 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="0.5" width="80" height="80" rx="40" fill="#CACFFF"/>
                    <path d="M41.0359 55.1834C40.4693 55.3834 39.5359 55.3834 38.9693 55.1834C34.1359 53.5334 23.3359 46.6501 23.3359 34.9834C23.3359 29.8334 27.4859 25.6667 32.6026 25.6667C35.6359 25.6667 38.3193 27.1334 40.0026 29.4001C41.6859 27.1334 44.3859 25.6667 47.4026 25.6667C52.5193 25.6667 56.6693 29.8334 56.6693 34.9834C56.6693 46.6501 45.8693 53.5334 41.0359 55.1834Z" stroke="#003C46" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M34 34.9L45.6 46.1" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M34 46.1L45.6 34.9" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h4 class="text-theme-primary-color text-2xl font-medium mt-[40px] mb-6 leading-[28.8px]">${no_results_options.title}</h4>
            <h5 class="text-lg text-[#333] font-normal my-0 mb-[40px] text-center leading-[100%]">
                ${no_results_options.description}
            </h5>
            <div class="w-full p-[24px] box-border flex flex-col gap-[24px] rounded-[8px]">
                <div class="flex for-sale-rent-btns">
                    <div class="flex-1 for-sale-rent-btns__item for-sale-rent-btns__item--sale for-sale-rent-btns__item--active" data-value="for_sale">Compra</div>
                    <div class="flex-1 for-sale-rent-btns__item for-sale-rent-btns__item--rent" data-value="for_rent">Alquiler</div>
                </div>
                <div class="w-full box-border relative flex h-[48px]">
                    <div class="w-full">
                        <div class="relative w-full">
                            <div class="qcf-single-select-ajax qcf-field-group qcf-select-ajax--single-location" data-id="location" data-name="location" data-search-source="" data-placeholder="" data-search-placeholder="${no_results_options.search_placeholder}" data-search-no-results-label="${no_results_options.no_results_label}">
                                <div class="qcf-field-group__label">${no_results_options.label}</div>
                                <div class="qcf-field-group__placeholder">
                                    <input type="text" id="search_location" class="qcf-field-group__content__search" placeholder="" autocomplete="off">
                                </div>
                                <div class="qcf-field-group__content">
                                    <div class="qcf-field-group__content__list">
                                        <div>
                                            <div class="qcf-field-group__content__list__results"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <svg width="16" height="16" class="absolute z-10 -translate-y-1/2 fill-theme-primary-color top-1/2 right-5" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7301 10.3183H10.9891L10.7265 10.065C11.852 8.75184 12.4336 6.96032 12.1147 5.05624C11.6738 2.44869 9.49772 0.366395 6.87141 0.0474853C2.9038 -0.440259 -0.435376 2.89891 0.0523681 6.86652C0.371278 9.49284 2.45357 11.6689 5.06112 12.1098C6.9652 12.4287 8.75672 11.8471 10.0699 10.7216L10.3231 10.9842V11.7252L14.3095 15.7116C14.6941 16.0961 15.3225 16.0961 15.7071 15.7116C16.0916 15.327 16.0916 14.6986 15.7071 14.314L11.7301 10.3183ZM6.10227 10.3183C3.76673 10.3183 1.88141 8.43293 1.88141 6.09739C1.88141 3.76184 3.76673 1.87653 6.10227 1.87653C8.43781 1.87653 10.3231 3.76184 10.3231 6.09739C10.3231 8.43293 8.43781 10.3183 6.10227 10.3183Z"></path>
                            </svg>
                        </div>
                        <div class="search_helper"></div>
                    </div>
                </div>
                <div>
                    <button name="search_btn" id="search_btn" class="w-full font-semibold btn btn-primary btn-pill">Buscar</button>
                </div>
            </div>
        </div>`;

        QoetixCustomFields.eventActions();
        const sale_rent_btns = document.querySelectorAll('.for-sale-rent-btns__item')
        sale_rent_btns.forEach(btn => {
            btn.addEventListener('click', function(){
                if (this.classList.contains('for-sale-rent-btns__item--active')) {
                    return;
                }

                document.querySelectorAll('.for-sale-rent-btns__item--active').forEach(_btn => {
                    _btn.classList.remove('for-sale-rent-btns__item--active')
                })

                this.classList.add('for-sale-rent-btns__item--active')
            })
        })

        const search_btn = document.querySelector('#search_btn')
        search_btn.addEventListener('click', function(){
            const parent_group = document.querySelector('.qcf-select-ajax--single-location')
            const location_input = document.querySelector('input[name="location"]')
            const search_helper = document.querySelector('.search_helper');
            if (location_input === null) {
                parent_group.classList.add('has-error')
                search_helper.innerHTML = 'Escribe un criterio de búsqueda para comenzar.';
                search_helper.classList.add('search_helper--has-error')
                const search_input = document.querySelector('#search_location')
                search_input.addEventListener('change', function fn(){
                    search_helper.innerHTML = '';
                    search_helper.classList.remove('search_helper--has-error')
                    parent_group.classList.remove('has-error')
                    search_input.removeEventListener('change', fn)
                })
            } else {
                search_helper.innerHTML = '';
                search_helper.classList.remove('search_helper--has-error')
                parent_group.classList.remove('has-error')
                const location_arr = location_input.value.split('.');

                const sale_rent = document.querySelector('.for-sale-rent-btns__item--active')?.getAttribute('data-value') ?? 'for_sale';

                const route = new PropertiesRoute(sale_rent, null, location_arr[0]);

                if (location_arr[1] !== '*') {
                    route.params.area = location_arr[1];
                }

                if (location_arr[2] !== '*') {
                    route.params.subarea = location_arr[2];
                }

                if (location_arr[3] !== '*') {
                    route.params.post_code = location_arr[3];
                }

                window.location = route.buildUrl();
            }
        })
    }

    document.addEventListener('DOMContentLoaded', function(event) {
        show_tabs();
        QoetixCustomFields.eventActions();

        setTimeout(() => {
            trackPageTypeChange(getCurrentPageType());
        }, 100);

        document.addEventListener('wishlist:data-ready', function fn(){
            setTimeout(() => {
                // Remove all events.
                document.querySelectorAll('.wishlist-btn').forEach(elem => {
                    const clone = elem.cloneNode(true);
                    elem.replaceWith(clone);
                })

                // Attach new event.
                document.querySelectorAll('.wishlist-btn').forEach(elem => {
                    elem.addEventListener('click', function(e){
                        if (elem.classList.contains('wishlist-btn--c-ready')) {
                            return;
                        }

                        elem.classList.add('wishlist-btn--c-ready');
                        e.preventDefault();
                        e.stopPropagation();

                        elem.insertAdjacentHTML('beforeend', '<span class="favourites-btn">Eliminar de favoritos</span>')


                        elem.querySelectorAll('.favourites-btn:not(.favourites-btn--active)').forEach(_elem => {
                            _elem.classList.add('favourites-btn--active')
                            _elem.addEventListener('click', function(e){
                                e.preventDefault();
                                e.stopPropagation();

                                const parent_element = _elem.closest('.property-item');
                                const property_id = parent_element.getAttribute('id');
                                const sale_rent = parent_element.getAttribute('data-sale-rent')

                                if (typeof TealiumTracker !== 'undefined') {
                                    const tealium_object = new TealiumTracker();
                                    const event_data = {
                                        'page_name': 'wivai F.C:favoritos',
                                        'page_subcategory1': 'favoritos',
                                        'event_category': 'eliminar favoritos',
                                        'event_action': 'click en boton',
                                        'event_label': 'favoritos',
                                        'prod_category': parent_element.dataset.category || '',
                                        'prod_id': parent_element.dataset.ref || '',
                                        'prod_rooms': parent_element.dataset.rooms || '',
                                        'prod_bathrooms': parent_element.dataset.bathrooms || '',
                                        'prod_type': parent_element.dataset.subcategory || '',
                                        'prod_surface': parent_element.dataset.surface || '',
                                        'prod_status': parent_element.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                                        'prod_floor': parent_element.dataset.floor || '',
                                        'prod_state': parent_element.dataset.state || '',
                                        'prod_pvp_price': parent_element.dataset.pvpPrice || '',
                                        'prod_pvp_sale': parent_element.dataset.pvpSale || '',
                                        'prod_energy_cert': parent_element.dataset.energyCert || '',
                                        'prod_owner': parent_element.dataset.agent || '',
                                        'prod_publication_status': parent_element.dataset.websiteStatus || '',
                                        'prod_publication_date': parent_element.dataset.publicationDate || '',
                                        'prod_characteristics': parent_element.dataset.characteristics || '',
                                        'prod_otherfilters': parent_element.dataset.otherFilters || '',
                                        'num_saved': num_saved,
                                        'events': 'click_removeFavorites',
                                    };
                                    tealium_object.trackEvent(event_data, 'link');
                                }

                                Wishlist.updateList(property_id, sale_rent, 'remove')
                                removeFromWishlist(property_id, false)

                                document.querySelectorAll('[id="' + property_id + '"]').forEach(wishlist_item => {
                                    wishlist_item.insertAdjacentHTML('afterend', `<div class="wishlist-item-deleted" data-id="${property_id}">
                                        <div class="wishlist-item-deleted__label">
                                            El inmueble ya no se encuentra dentro tus favoritos
                                        </div>
                                        <div class="wishlist-item-deleted__btn">Recuperarlo</div>
                                    </div>`)
                                    _elem.remove()
                                    elem.classList.remove('wishlist-btn--c-ready');
                                    wishlist_item.classList.add('wishlist_item_hidden')
                                })

                                document.querySelectorAll('.wishlist-item-deleted__btn').forEach(_btn => {
                                    _btn.addEventListener('click', function(e){
                                        e.preventDefault();
                                        e.stopPropagation();

                                        const parent_element = _btn.closest('.wishlist-item-deleted');
                                        const property_id = parent_element.getAttribute('data-id');
                                        const sale_rent = parent_element.getAttribute('data-sale-rent')

                                        addToWishlist(property_id, false)
                                        Wishlist.updateList(property_id, sale_rent, 'add')
                                        document.querySelectorAll('.wishlist-item-deleted[data-id="' + property_id + '"]').forEach(_deleted_item => {
                                            _deleted_item.remove()
                                        })
                                        document.querySelectorAll('[id="' + property_id + '"]').forEach(wishlist_item => {
                                            wishlist_item.classList.remove('wishlist_item_hidden')
                                        })

                                        updateNumSavedCount();
                                    });
                                });
                            });
                        })
                    })
                })
            }, 200);
        })


        check_size()

        window.addEventListener('resize', function(){
            check_size()
        })

        document.addEventListener('wishlist:empty-list', function fn(obj){
            document.querySelector('#section-listing-2').innerHTML = obj.detail.no_results_html;

            showNoResultsLayout()
            num_saved = 0;
            document.removeEventListener('wishlist:empty-list', fn)
        })
        document.addEventListener('wishlist:dummy-data-ready', function fn(){
            update_wishlist_items_counter()

            const existing_items = document.querySelectorAll('.wishlist-list .property-item')
            const parent_template_2_section = document.querySelector('#section-listing-2')
            existing_items.forEach(_item => {
                const template_2_html = prepare_wishlist_template_2(_item.id)
                parent_template_2_section.insertAdjacentHTML('beforeend', template_2_html)
            })

            document.removeEventListener('wishlist:dummy-data-ready', fn)
        })

        document.addEventListener('wishlist:data-ready', function fn(){
            wishlistPrepareEventsByLogin()
            wishlistBtnEvents()

            checkStatus()
            ContactUs.eventAgentTel()
            ContactUs.prepare()

            updateNumSavedCount();
        })

        Wishlist.enable({
            wishlist_container_class: 'grid grid-cols-1 gap-6',
            load_dummy_template: function(id) {
                return `<a href='' class="property-item property-list-item loading-wishlist-item" id="${id}" data-sale-rent="">
                    <div class="property-list-item__featured_photo">
                        <img class="property-list-item__featured_photo__img" src="${default_img}" alt="property-image" loading="lazy"/>
                        <span class="wishlist-loading-icon"></span>
                    </div>
                    <div class="property-list-item__details">
                        <div class="property-list-item__details__name">
                            <h2 class="property-list-item__details__name__content"></h2>
                            <div class="property-list-item__details__name__agent"></div>
                        </div>
                        <h3 class="property-list-item__details__price"></h3>
                        <div class="property-list-item__details__features"></div>
                        <div class="property-list-item__details__description"><div></div></div>
                        <div class="property-list-item__details__buttons">
                            <div class="heart-icon wishlist-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.465 15.6077C9.21 15.6977 8.79 15.6977 8.535 15.6077C6.36 14.8652 1.5 11.7677 1.5 6.5177C1.5 4.2002 3.3675 2.3252 5.67 2.3252C7.035 2.3252 8.2425 2.9852 9 4.0052C9.7575 2.9852 10.9725 2.3252 12.33 2.3252C14.6325 2.3252 16.5 4.2002 16.5 6.5177C16.5 11.7677 11.64 14.8652 9.465 15.6077Z" fill="none" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>`
            },
            load_property_template: function(property) {
                let features_html = '';

                if (property.bedrooms) {
                    features_html += `<div class="property-list-item__details__features__item">
                        ${property.bedrooms} habs.
                    </div>`
                }

                if (property.bathrooms) {
                    features_html += `<div class="property-list-item__details__features__item">
                            ${property.bathrooms} baños
                        </div>`
                }

                if (property.internal_area_amount) {
                    features_html += `<div class="property-list-item__details__features__item" title="Área Interna">
                        ${property.internal_area_amount}
                    </div>`
                }

                const has_website_url = property.website_url !== '';
                const property_url = has_website_url ? property.website_url : property.url
                const agent_mobile = property.agent.tel_office || property.agent.tel_mobile;
                let property_elem = moveObject('.loading-wishlist-item[id="' + property.id + '"]')
                if (has_website_url) {
                    property_elem.classList.add('property-item--website-url')
                }
                property_elem = document.querySelector('.loading-wishlist-item[id="' + property.id + '"]');
                property_elem.setAttribute('href', property_url);
                property_elem.setAttribute('data-sale-rent', property.sale_rent);
                property_elem.setAttribute('data-sale-rent-raw', property.sale_rent_raw);
                property_elem.setAttribute('data-agent-phone', agent_mobile);
                property_elem.setAttribute('data-agent-logo', property.agent?.logo ?? '');
                property_elem.setAttribute('data-agent', property.agent?.name ?? '');
                property_elem.setAttribute('data-agent-id', property.agent?.id ?? '');
                property_elem.setAttribute('data-property-type', property.property_type_raw);
                property_elem.setAttribute('data-ref', property.ref);
                property_elem.setAttribute('data-original-ref', property.original_ref);

                property_elem.querySelector('.property-list-item__featured_photo').innerHTML = `<img class="property-list-item__featured_photo__img" src="${property.featured_photo}" alt="property-image" loading="lazy"/>`
                property_elem.querySelector('.property-list-item__details__name__content').innerHTML = property.name
                property_elem.querySelector('.property-list-item__details__description > div').innerHTML = property.description
                property_elem.querySelector('.property-list-item__details__price').innerHTML = property.website_price
                property_elem.querySelector('.property-list-item__details__features').innerHTML = features_html

                const detail_buttons = property_elem.querySelector('.property-list-item__details__buttons')
                detail_buttons.insertAdjacentHTML('afterbegin', `<button class="contact-us-btn" data-href="">Contactar</button>`);

                if (property.agent.logo){
                    property_elem.querySelector('.property-list-item__details__name__agent').innerHTML = `<img src="${property.agent.logo}" alt="agent-logo" loading="lazy" class="property-list-item__details__name__agent__logo"/>`
                }

                property_elem.classList.remove('loading-wishlist-item')
                const property_elem_2 = moveObject('#section-listing-2 .property-item[id="' + property.id + '"]')
                if (has_website_url) {
                    property_elem_2.classList.add('property-item--website-url')
                }
                property_elem_2.classList.remove('loading-wishlist-item-2')
                property_elem_2.setAttribute('href', property_url);
                property_elem_2.setAttribute('data-sale-rent', property.sale_rent);
                property_elem_2.setAttribute('data-sale-rent-raw', property.sale_rent_raw);
                property_elem_2.setAttribute('data-agent-phone', agent_mobile);
                property_elem_2.setAttribute('data-agent-logo', property.agent?.logo  ?? '');
                property_elem_2.setAttribute('data-agent', property.agent?.name ?? '');
                property_elem_2.setAttribute('data-agent-id', property.agent?.id ?? '');
                property_elem_2.setAttribute('data-property-type', property.property_type_raw);
                property_elem_2.setAttribute('data-ref', property.ref);
                property_elem_2.setAttribute('data-original-ref', property.original_ref);

                property_elem_2.querySelector('.property-item__inner__row1__div .qoetix-gallery').innerHTML = `<img src="${property.featured_photo}" alt="property-image" loading="lazy" class="w-full h-full object-cover rounded-[16px]"/>`
                property_elem_2.querySelector('.property-item__inner__row2__details__name').innerHTML = property.name
                property_elem_2.querySelector('.property-item__inner__row2__details__price').innerHTML = property.website_price
                property_elem_2.querySelector('.property-item__inner__row2__features').innerHTML = features_html
                let property_elem_2_btns = `<button class="btn btn-primary btn-pill font-semibold contact-us-btn">Contactar</button>`
                property_elem_2.querySelector('.property-item__inner__row2__agent').innerHTML = property_elem_2_btns

                if (property.agent.logo){
                    property_elem_2.querySelector('.property-item__inner__row1__div__agent').innerHTML = `<img src="${property.agent.logo}" alt="agent-logo" loading="lazy" class="property-item__inner__row1__div__agent__logo"/>`
                }

                map_coordinates.push({
                    id: property.id,
                    ref: property.ref,
                    coordinates: property.coordinates,
                    list_selling_price_amount: property.list_selling_price_amount || null,
                    list_rental_price_amount: property.list_rental_price_amount || null,
                    sale_rent: property.sale_rent,
                    price_qualifier: property.price_qualifier || null,
                    geocode_type: property.geocode_type || null
                })
            }
        })

        const sort_element = document.querySelector('#sort')
        sort_element?.addEventListener('change', function(){
            if (typeof TealiumTracker !== 'undefined') {
                const sortOptions = {
                    '-website_listing_date': 'recientes',
                    'price_desc': 'precio más alto',
                    'price_asc': 'baratos',
                    '-price_per_square': 'caros eur/m²',
                    'price_per_square': 'baratos eur/m²',
                    'internal_area_amount': 'grandes',
                    '-internal_area_amount': 'pequeños',
                };

                const optionText = sortOptions[this.value] || this.value;

                const tealium_object = new TealiumTracker();
                const event_data = {
                    'page_name': 'wivai F.C:area privada:favoritos',
                    'page_subcategory1': 'area privada',
                    'page_subcategory2': 'favoritos',
                    'event_category': 'ordenar resultados',
                    'event_action': 'click en boton',
                    'event_label': optionText,
                    'num_saved': num_saved,
                    'events': 'pageview',
                };
                tealium_object.trackEvent(event_data, 'view');
            }
            Wishlist.render()
        })

        const sale_rent = document.querySelector('#sale_rent')
        sale_rent?.addEventListener('change', function() {
            if (typeof TealiumTracker !== 'undefined') {
                const mapping = {
                    'for_sale_and_rent': 'compra y alquiler',
                    'for_rent': 'alquiler',
                    'for_sale': 'compra'
                };
                const tealium_object = new TealiumTracker();
                const event_data = {
                    'page_name': 'wivai F.C:favoritos',
                    'page_subcategory1': 'favoritos',
                    'event_category': 'filtro simple',
                    'event_action': 'click en filtro ' + (mapping[this.value] || this.value),
                    'event_label': 'aplicar filtro ' + (mapping[this.value] || this.value),
                    'num_saved': num_saved,
                    'events': 'click_singleFilter',
                };
                tealium_object.trackEvent(event_data, 'link');
            }
            checkStatus()
        })

        const mobile_map_btn = document.querySelector('.mobile-btn--map')
        const mobile_list_btn = document.querySelector('.mobile-btn--list')
        mobile_map_btn?.addEventListener('click',function(){
            document.querySelector('.p-listing__results__section--active').classList.remove('p-listing__results__section--active')
            document.querySelector('#section-map').classList.add('p-listing__results__section--active')
            const pagination_section = document.querySelector('.c-pagination-section')
            QoetixMap.resetMapPosition()
            pagination_section?.classList.add('hidden')
            mobile_list_btn.classList.add('mobile-btn--active')
            mobile_map_btn.classList.remove('mobile-btn--active')

            trackPageTypeChange('result map');
        })

        mobile_list_btn?.addEventListener('click',function(){
            document.querySelector('.p-listing__results__section--active').classList.remove('p-listing__results__section--active')
            document.querySelector('#section-listing-2').classList.add('p-listing__results__section--active')
            const pagination_section = document.querySelector('.c-pagination-section')
            pagination_section?.classList.remove('hidden')
            mobile_map_btn.classList.add('mobile-btn--active')
            mobile_list_btn.classList.remove('mobile-btn--active')

            trackPageTypeChange('result grid');
        })

        document.querySelector('#map-listing').addEventListener('map:popup-loaded', function(event){
            if (typeof TealiumTracker !== 'undefined') {
                const event_data = {
                    'page_name': 'wivai F.C:area privada:favoritos',
                    'page_subcategory1': 'area privada',
                    'page_subcategory2': 'favoritos',
                    'event_category': 'viualizacion resultados',
                    'event_action': 'click en boton',
                    'event_label': event.detail.property_data.name,
                    'num_saved': num_saved,
                    'events': 'pageview',
                }
                const tealium_object = new TealiumTracker();
                tealium_object.trackEvent(event_data, 'view');
            }
            wishlistPrepareEventsByLogin()
            wishlistBtnEvents()
        })

        document.addEventListener('wishlist:data-ready', function() {
            const contact_btns = document.querySelectorAll('.contact-us-btn');
            contact_btns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (typeof TealiumTracker !== 'undefined') {
                        const property = btn.closest('.property-item');
                        const tealium_object = new TealiumTracker();
                        const event_data = {
                            'page_name': 'wivai F.C:favoritos',
                            'page_subcategory1': 'favoritos',
                            'event_category': 'contactar favoritos',
                            'event_action': 'click en boton',
                            'event_label': 'contactar',
                            'prod_category': property.dataset.category || '',
                            'prod_id': property.dataset.ref || '',
                            'prod_rooms': property.dataset.rooms || '',
                            'prod_bathrooms': property.dataset.bathrooms || '',
                            'prod_type': property.dataset.subcategory || '',
                            'prod_surface': property.dataset.surface || '',
                            'prod_status': property.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                            'prod_floor': property.dataset.floor || '',
                            'prod_state': property.dataset.state || '',
                            'prod_pvp_price': property.dataset.pvpPrice || '',
                            'prod_pvp_sale': property.dataset.pvpSale || '',
                            'prod_energy_cert': property.dataset.energyCert || '',
                            'prod_owner': property.dataset.agent || '',
                            'prod_publication_status': property.dataset.websiteStatus || '',
                            'prod_publication_date': property.dataset.publicationDate || '',
                            'prod_characteristics': property.dataset.characteristics || '',
                            'prod_otherfilters': property.dataset.otherFilters || '',
                            'num_saved': num_saved,
                            'events': 'click_cta',
                        };
                        tealium_object.trackEvent(event_data, 'link');
                    }
                });
            });

            const phone_btns = document.querySelectorAll('.agent-phone-btn');
            phone_btns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (typeof TealiumTracker !== 'undefined') {
                        const property = btn.closest('.property-item');
                        const tealium_object = new TealiumTracker();
                        const event_data = {
                            'page_name': 'wivai F.C:favoritos',
                            'page_subcategory1': 'favoritos',
                            'event_category': 'ver telefono favoritos',
                            'event_action': 'click en boton',
                            'event_label': 'ver teléfono',
                            'prod_category': property.dataset.category || '',
                            'prod_id': property.dataset.ref || '',
                            'prod_rooms': property.dataset.rooms || '',
                            'prod_bathrooms': property.dataset.bathrooms || '',
                            'prod_type': property.dataset.subcategory || '',
                            'prod_surface': property.dataset.surface || '',
                            'prod_status': property.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                            'prod_floor': property.dataset.floor || '',
                            'prod_state': property.dataset.state || '',
                            'prod_pvp_price': property.dataset.pvpPrice || '',
                            'prod_pvp_sale': property.dataset.pvpSale || '',
                            'prod_energy_cert': property.dataset.energyCert || '',
                            'prod_owner': property.dataset.agent || '',
                            'prod_publication_status': property.dataset.websiteStatus || '',
                            'prod_publication_date': property.dataset.publicationDate || '',
                            'prod_characteristics': property.dataset.characteristics || '',
                            'prod_otherfilters': property.dataset.otherFilters || '',
                            'num_saved': num_saved,
                            'events': 'click_cta',
                        };
                        tealium_object.trackEvent(event_data, 'link');
                    }
                });
            });
        })
    });
})();


/**
 * Prepare sothebys popup.
 *
 * @param {object} options The options.
 * @returns {string}
 */
function caixaMapPopup(options){
    let features_html = '';

    if (options.bedrooms) {
        features_html += `<div class="property-list-item__details__features__item">
            ${options.bedrooms} habs.
        </div>`
    }

    if (options.bathrooms) {
        features_html += `<div class="property-list-item__details__features__item">
                ${options.bathrooms} baños
            </div>`
    }

    if (options.internal_area_amount) {
        features_html += `<div class="property-list-item__details__features__item" title="Área Interna">
            ${options.internal_area_amount}
        </div>`
    }

    let agent_logo = '';
    if (options.agent?.logo){
        agent_logo = `<div class="property-item__inner__row1__div__agent"><img src="${options.agent.logo}" alt="agent-logo" loading="lazy" class="property-item__inner__row1__div__agent__logo"/></div>`
    }

    return `<div class="caixa-map-pin">
        <a href='${options.url}' class="property-item property-grid-item" id="${options.id}" data-sale-rent="">
            <div class="property-item__inner">
                <div class="property-item__inner__row1">
                    <div class="property-item__inner__row1__div">
                        <div class="box-border qoetix-gallery-section qoetix-gallery" data-pagination='1'>
                            <img class="property-list-item__featured_photo__img" src="${options.image}" onerror="featuredPhotoOnError(this)" alt="property-image" loading="lazy"/>
                        </div>
                        ${agent_logo}
                    </div>
                    <div class="heart-icon wishlist-btn">
                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.465 15.6077C9.21 15.6977 8.79 15.6977 8.535 15.6077C6.36 14.8652 1.5 11.7677 1.5 6.5177C1.5 4.2002 3.3675 2.3252 5.67 2.3252C7.035 2.3252 8.2425 2.9852 9 4.0052C9.7575 2.9852 10.9725 2.3252 12.33 2.3252C14.6325 2.3252 16.5 4.2002 16.5 6.5177C16.5 11.7677 11.64 14.8652 9.465 15.6077Z" fill="none" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="property-item__inner__row2">
                    <div class="property-item__inner__row2__details">
                        <div class="property-item__inner__row2__details__name">${options.name}</div>
                        <div class="property-item__inner__row2__details__price">${options.price}</div>
                    </div>
                    <div class="property-item__inner__row2__features">${features_html}</div>
                </div>
            </div>
        </a>
        <div class="map-pin-close" onclick="QoetixMap.closePopup()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="12" fill="white" fill-opacity="0.5"/>
                <path d="M6 6.4L17.6 17.6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 17.5999L17.6 6.3999" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>`;
}
