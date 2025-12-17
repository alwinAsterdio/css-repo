/**
 * When the google static map img fails it will load the default image.
 * @param {object} img The img element.
 */
function googleMapStaticImgError(img){
    img.src = img.getAttribute('data-alt-src')
    console.error('Google Static map load failed.');
}

(function() {
    const caixaSavedSearchesModal = new CaixaModal({className: 'saved-searches'});

    let loadPropertiesController;

    const filter_btn_string = "Mostrar %d resultados";
    const spinner_div = `<div class="listing-loading-div">
        <div class="listing-loading-div__inner">
            <div class="listing-loading-div__inner__content">
                <div class="listing-loading-div__inner__content__circle"></div>
                <div class="listing-loading-div__inner__content__circle"></div>
                <div class="listing-loading-div__inner__content__circle"></div>
                <div class="listing-loading-div__inner__content__circle"></div>
            </div>
        </div>
    </div>`

    let change_value_timeout = null;
    let url = new URL(window.location);

    /**
     * Actions.
     */
    function page_actions(){
        const pagination_elms = document.querySelectorAll('.pagination__page ');
        pagination_elms.forEach(pagination_item => {
            const pagination_url = new URL(pagination_item.href);
            // Remove the ajax params from href.
            pagination_url.searchParams.delete('ajax')
            pagination_item.href = pagination_url.toString();

            pagination_item.addEventListener('click', function(e) {
                e.preventDefault();

                load_sections(pagination_item.href);

                const element_position = document.querySelector('.p-listing').getBoundingClientRect().top + window.pageYOffset - 100;
                window.scrollTo({
                    top: element_position,
                    behavior: 'smooth'
                });
            })
        })

        const filter_mobile_btn = document.querySelector('.filter-mobile-btn')
        const search_form = document.querySelector('.search-form')
        if (filter_mobile_btn !== null) {
            filter_mobile_btn.addEventListener('click', function() {
                if (filter_mobile_btn.classList.contains('filter-mobile-btn--active')) {
                    filter_mobile_btn.classList.remove('filter-mobile-btn--active')
                    search_form.classList.remove('search-form--visible')
                    document.body.classList.remove('disable-scrolling')
                } else {
                    filter_mobile_btn.classList.add('filter-mobile-btn--active')
                    search_form.classList.add('search-form--visible')
                    document.body.classList.add('disable-scrolling')

                    setTimeout(() => {
                        document.addEventListener('click', monitorMobileFilters)
                    }, 0);
                }
            })
        }

        const mobile_map_btn = document.querySelector('.mobile-btn--map')
        const mobile_list_btn = document.querySelector('.mobile-btn--list')
        mobile_map_btn.addEventListener('click',function(){
            document.querySelector('.p-listing__results__section--active').classList.remove('p-listing__results__section--active')
            document.querySelector('#section-map').classList.add('p-listing__results__section--active')
            const pagination_section = document.querySelector('.c-pagination-section')
            if (!this.classList.contains('map-loaded')){
                this.classList.add('map-loaded')
                load_map_coordinates();
            }
            QoetixMap.resetMapPosition()
            pagination_section?.classList.add('hidden')
            mobile_list_btn.classList.add('mobile-btn--active')
            mobile_map_btn.classList.remove('mobile-btn--active')

            if (typeof TealiumTracker !== 'undefined') {
                new TealiumTracker().trackEvent(
                    {
                        ...getActivePageDetails(false, true, false),
                        'page_subcategory1': 'vista mapa',
                        'page_type': 'result map',
                        events: "pageview"
                    },
                    'view'
                );
            }
        })

        mobile_list_btn.addEventListener('click',function(){
            document.querySelector('.p-listing__results__section--active').classList.remove('p-listing__results__section--active')
            document.querySelector('#section-listing-2').classList.add('p-listing__results__section--active')
            const pagination_section = document.querySelector('.c-pagination-section')
            pagination_section?.classList.remove('hidden')
            mobile_map_btn.classList.add('mobile-btn--active')
            mobile_list_btn.classList.remove('mobile-btn--active')

            if (typeof TealiumTracker !== 'undefined') {
                new TealiumTracker().trackEvent(
                    {
                        ...getActivePageDetails(false, true, false),
                        'page_subcategory1': 'vista lista',
                        'page_type': 'result lista',
                        events: "pageview"
                    },
                    'view'
                );
            }
        })
    }

    /**
     * Load map coordinates.
     */
    async function load_map_coordinates() {
        const route = PropertiesRoute.parse(new URL(prepare_new_url()));
        const query_params = new URLSearchParams(route.buildParams());
        query_params.delete('single_search')
        query_params.delete('page')
        query_params.delete('sort')
        query_params.delete('tab')
        if (query_params.get('ajax') !== null) {
            return Promise.resolve();
        }

        return fetch('/api/property-public/coordinates/?' + query_params.toString(), {
            method: 'GET',
            headers: {
                'Content-type': 'application/json; charset=UTF-8'
            },
        }).then(function (response) {
            return response.json();
        }).then(function (response) {
            QoetixMap.loadMarkers(response)
            QoetixMap.resetMapPosition()
            return response;
        });
    }

    /**
     * Add hidden fields.
     */
    function add_hidden_fields() {
        const form = document.querySelector('.search-form ')
        const hidden_field_list = [
            'district',
            'area',
            'subarea',
            'post_code',
            'page',
            'sort',
            'tab',
        ];

        hidden_field_list.map(field_name => {
            const field_value = url.searchParams.get(field_name);
            if (field_value) {
                form.insertAdjacentHTML("beforeend", '<input type="hidden" name="' + field_name + '" value="' + field_value + '"/>')
            }
        })
    }

    /**
     * Reset button actions.
     */
    function reset_button_action() {
        const reset_filters = document.querySelector('.reset-filters:not(.reset_filters--ready)')
        if (reset_filters === null) {
            return;
        }

        reset_filters.addEventListener('click', function() {
            const new_url = new URL(window.location);
            const params_to_keep = [
                'district',
                'area',
                'subarea',
                'post_code',
            ];

            new_url.search = '';
            params_to_keep.forEach(param => {
                const value = url.searchParams.get(param);
                if (value !== null) {
                    new_url.searchParams.set(param, value);
                }
            });

            window.location = new_url.toString();
        })
    }

    /**
     * Show listing tabs sections.
     */
    function show_tabs() {
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
                    if (!this.classList.contains('map-loaded')){
                        this.classList.add('map-loaded')
                        load_map_coordinates();
                    }
                    QoetixMap.resetMapPosition()
                    pagination_section?.classList.add('hidden')
                } else {
                    pagination_section?.classList.remove('hidden')
                }

                const form = document.querySelector('.search-form ')
                const tab_input_elem = form.querySelector('#tab')
                if (tab_input_elem === null) {
                    form.insertAdjacentHTML("beforeend", '<input type="hidden" id="tab" name="tab" value="' + this.getAttribute('data-tab') + '"/>')
                } else {
                    tab_input_elem.value = this.getAttribute('data-tab')
                }

                const currentUrl = new URL(window.location);
                currentUrl.searchParams.set(
                    "tab",
                    this.getAttribute("data-tab")
                );
                window.history.pushState({}, "", currentUrl.toString());
            });
        });

        const currentUrl = new URL(window.location);
        const tabFromUrl = currentUrl.searchParams.get("tab");
        if (tabFromUrl !== null) {
            const tab_item_elem  = document.querySelector(
                '.p-listing__actions__tab[data-tab="' + tabFromUrl + '"]'
            );
            if (tab_item_elem  !== null) {
                tab_item_elem .dispatchEvent(new Event("click"));
            }
        }
    }

    /**
     * Sale rent tabs actions.
     */
    function sale_rent_tabs() {
        const sale_rent_tabs = document.querySelectorAll('.p-listing__sale-rent-tabs__item')
        sale_rent_tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                if (this.classList.contains('p-listing__sale-rent-tabs__item--active')) {
                    return;
                }

                const current_active_tab = document.querySelector('.p-listing__sale-rent-tabs__item--active');
                if (current_active_tab !== null) {
                    current_active_tab.classList.remove('p-listing__sale-rent-tabs__item--active')
                }

                this.classList.add('p-listing__sale-rent-tabs__item--active')

                const sale_rent_elem = document.querySelector('#sale_rent')
                if (sale_rent_elem !== null) {
                    sale_rent_elem.value = this.getAttribute('data-value');
                    sale_rent_elem.dispatchEvent(new Event('change'))
                }

                window.history.pushState({}, '', prepare_new_url());

                LocationBreadcrumbsObj.render();
            })
        })
    }

    /**
     * Prepare the new url and update the url params.
     */
    function prepare_new_url() {
        const form = document.querySelector('.search-form');
        if (form === null) {
            return;
        }

        const route = PropertiesRoute.parse(new URL(window.location));

        const formData = new FormData(form);
        route['property_type'] = null
        let property_types = {};

        // Remove unchecked checkboxes.
        document.querySelectorAll('input[type="checkbox"]:not(:checked)').forEach(checkbox => {
            route.delete(checkbox.name)
        });

        for (const [key, value] of formData.entries()) {
            const modified_key = key.split("[")[0];
            switch (modified_key) {
                case 'sale_rent':
                case 'district':
                    route[modified_key] = value;
                    break;
                case 'property_type':
                    property_types[key]=value;
                    break;
                default:
                    route.set(key, value)
                    break;
            }
        }

        const total_property_types = Object.keys(property_types).length
        if (total_property_types) {
            if (total_property_types === 1) {
                for (let key in property_types) {
                    const keys = key.match(/[^\[\]]+/g);
                    if (keys[2] === 'all') {
                        route['property_type'] = keys[1];
                    } else {
                        route.params[key] = property_types[key];
                    }
                }
            } else {
                for (let key in property_types) {
                    route.params[key] = property_types[key];
                }
            }
        }

        delete route.params.page;

        const sort = route.get('sort');
        const sale_rent = route.get('sale_rent', 'for_sale');
        if (sale_rent === 'for_sale' && sort === 'caixa_relevance_for_rent') {
            route.set('sort', 'caixa_relevance_for_sale');
        } else if (sale_rent === 'for_rent' && sort === 'caixa_relevance_for_sale') {
            route.set('sort', 'caixa_relevance_for_rent');
        }

        if (sale_rent !== 'for_sale') {
            route.delete('list_selling_price_amount_min')
            route.delete('list_selling_price_amount_max')
        } else {
            route.delete('list_rental_price_amount_min')
            route.delete('list_rental_price_amount_max')
        }

        return route.buildUrl();
    }

    /**
     * Update filter submit button label.
     */
    function update_filter_button_label(){
        const total_properties = document.querySelector('.l-pagination-header').innerHTML.match(/\d+/);
        const filter_btn = document.querySelector('.filter-submit-btn')
        const firstNumber = total_properties ? parseInt(total_properties[0], 10) : 0;
        filter_btn.innerHTML = filter_btn_string.replace("%d", firstNumber);
    }

    /**
     * Update mobile filter counter.
     */
    function filter_mobile_counter() {
        let total = 0;
        const fieldGroups = document.querySelectorAll('.listing-filters .qcf-field-group:not(.hidden):not(.qcf-field-group .qcf-field-group):not(.qcf-button-container)');

        fieldGroups.forEach(group => {
            const hasSelectedInput = [...group.querySelectorAll('input, select')].some(input =>
                (input.type === "hidden" && input.value !== "") || input.checked
            );

            if (hasSelectedInput) total++;
        });

        document.querySelector('.filter-mobile-btn__counter').textContent = total;
    }

    /**
     * Load sections.
     */
    function load_sections(url, trigger_tealium_event = false) {
        const route = PropertiesRoute.parse(new URL(url));
        route.params.ajax = true;
        route.delete('ssf'); // Remove saved search flag.
        const api_url = route.buildUrl();

        const content_results_elem = document.querySelector('.content-results')
        content_results_elem.classList.add('content-results--loading')
        if (content_results_elem.querySelector('.listing-loading-div') === null) {
            content_results_elem.insertAdjacentHTML("beforeend", spinner_div)
        }

        const history_url = new URL(url);
        // Remove saved search flag.
        history_url.searchParams.delete('ssf');
        document.querySelectorAll('.save-search-btn--loaded').forEach(btn => {
            btn.classList.remove('save-search-btn--loaded');
        });
        window.history.pushState({}, '', history_url);

        if (loadPropertiesController) {
            loadPropertiesController.abort();
        }

        loadPropertiesController = new AbortController();
        const signal = loadPropertiesController.signal;

        fetch(api_url, {
            method: 'GET',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
            signal
        }).then(function (response) {
            return response.text();
        }).then(async function (html) {
            content_results_elem.classList.remove('content-results--loading')
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const content_results = doc.querySelector('.content-results');
            content_results.querySelectorAll('script').forEach(el => el.remove());
            content_results_elem.innerHTML = content_results.innerHTML
            document.querySelector('.l-pagination-header').innerHTML = doc.querySelector('.l-pagination-header').innerHTML
            update_filter_button_label()
            show_tabs()
            reset_button_action()
            sort_dropdown_enable()
            page_actions()
            filter_mobile_counter();
            QoetixCustomFields.eventActions();
            QoetixMap.resetMap()

            if(trigger_tealium_event && typeof TealiumTracker !== 'undefined' ) {
                let tealium_params = {...getActivePageDetails()};
                const properties_items = content_results_elem.querySelectorAll('.p-listing .property-item')
                if (properties_items.length) {
                    tealium_params.page_subcategory1 = 'vista lista';
                    tealium_params.events = 'pageview' ;
                    tealium_params.page_type = 'result lista';
                } else {
                    tealium_params.page_subcategory1 = 'filtro sin resultados';
                    tealium_params.events = 'pageview';
                }

                new TealiumTracker().trackEvent(tealium_params, 'view');
            }

            wishlistPrepareEventsByLogin()
            ContactUs.eventAgentTel()
            ContactUs.prepare()
            // Append URL to history.
            prepareLinkModal()
            initializeTealiumEvents();
        }).catch(error => {
            // Do nothing.
        });

    }

    /**
     * Sort dropdown event.
     */
    function sort_dropdown_enable() {
        const custom_sort_field = document.querySelector('#custom_sort');
        if (custom_sort_field !== null) {
            custom_sort_field.addEventListener('change', function() {
                const route = PropertiesRoute.parse(new URL(window.location));

                if (custom_sort_field.value === route.params.sort) {
                    return;
                }

                route.params.sort = custom_sort_field.value;
                delete route.params.page;

                const form = document.querySelector('.search-form')
                if (form !== null) {
                    if (form.querySelector('[name="page"]')) {
                        form.querySelector('[name="page"]').remove();
                    }

                    if (form.querySelector('[name="sort"]')) {
                        form.querySelector('[name="sort"]').value = custom_sort_field.value
                    } else {
                        form.insertAdjacentHTML("beforeend", '<input type="hidden" name="sort" value="' + custom_sort_field.value + '"/>')
                    }
                }

                load_sections(route.buildUrl());
            })
        }
    }

    /**
     * Monitor for the filters popup.
     *
     * @param {object} event The event.
     */
    function monitorMobileFilters(event) {
        const filter_mobile_btn = document.querySelector('.filter-mobile-btn')
        const search_form = document.querySelector('.search-form')
        let close_popup = typeof event === "undefined"
        if (event?.target.closest('.search-form') === null || close_popup) {
            filter_mobile_btn.classList.remove('filter-mobile-btn--active')
            search_form.classList.remove('search-form--visible')
            document.body.classList.remove('disable-scrolling')
            document.removeEventListener('click', monitorMobileFilters);
        }
    }

    /**
     * Check screen size.
     */
    function check_size() {
        if (window.innerWidth < 1024) {
            document.querySelector('.p-listing__actions__tab[data-tab="section-listing-2"]:not(.p-listing__actions__tab--active)')?.dispatchEvent(new Event('click'))
        }

        if (window.innerWidth < 1280) {
            const parent = document.querySelector('.listing-filters')
            const for_sale_buttons = document.querySelector('.p-listing__sale-rent-tabs')
            parent.insertBefore(for_sale_buttons, parent.firstChild);
        } else {
            const parent = document.querySelector('.p-listing')
            const for_sale_buttons = document.querySelector('.p-listing__sale-rent-tabs')
            parent.insertBefore(for_sale_buttons, parent.firstChild);
        }
    }

    /**
     * Store location search history in a cookie.
     */
    function storeLocationSearchHistory(location_data, days = 7) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = 'location_search_history' + "=" + encodeURIComponent(JSON.stringify(location_data)) + ";" + expires + ";path=/";
    }

    /**
     * Create the saved search in qobrix.
     *
     * @param {object} saveSearchBtn The object.
     */
    function createSavedSearch(saveSearchBtn) {
        const route = PropertiesRoute.parse(new URL(prepare_new_url()));
        route.set('saved_search_name', document.querySelector('#saved_search_name').value || document.querySelector('#saved_search_name').getAttribute('placeholder'));
        const api_url = '/api/saved-searches/save/' + route.buildParams()

        fetch(api_url, {
            method: 'GET',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        }).then(function (response) {
            return response.json();
        }).then(function (html) {
            if (html.status) {
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const activeSaleRentTab = document.querySelector('.p-listing__sale-rent-tabs__item--active');
                    const saleRent = activeSaleRentTab?.getAttribute('data-value');
                    const prodCategory = saleRent === 'for_rent' ? 'alquilar' : 'comprar';
                    const savedSearchesPage = document.querySelector('[data-num-saved]');
                    const numSaved = savedSearchesPage ? parseInt(savedSearchesPage.dataset.numSaved || 0, 10) : 0;
                    const event_data = {
                        'page_subcategory1': 'busqueda guardada ok',
                        'prod_category': prodCategory,
                        'num_saved': numSaved,
                        'events': 'pageview, prodView',
                    };
                    tealium_object.trackEvent(event_data, 'view');
                }

                saveSearchBtn.removeEventListener('click', savedSearchOnClick)

                const caixaSavedSearchesSuccessModal = new CaixaModal({className: 'saved-searches-success'});
                caixaSavedSearchesSuccessModal.open(`<div class="bg-[#F2F3FF] mt-[54px] rounded-[24px] flex gap-[16px] px-[24px] py-[16px]">
                    <div>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" rx="12" fill="#D7DBFF"/>
                            <path d="M17.1289 9L10.5511 15.5778C10.0933 16.0142 9.37339 16.0142 8.91556 15.5778L6 12.6978" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h5 class="m-0 p-0 text-[18px] leading-[21.6px] text-theme-primary-color font-medium">${modal_options.saved_search_success_title}</h5>
                        <div class="font-[Roboto] text-[16px] leading-[20.8px]">${modal_options.saved_search_success_descr}</div>
                    </div>
                </div>
                <div>
                    <a href="/${saved_search_url}" class="btn btn-pill btn-primary font-semibold block w-full text-center">${modal_options.saved_search_success_btn_lbl}</a>
                </div>
                `)
            } else {
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const activeSaleRentTab = document.querySelector('.p-listing__sale-rent-tabs__item--active');
                    const saleRent = activeSaleRentTab?.getAttribute('data-value');
                    const prodCategory = saleRent === 'for_rent' ? 'alquilar' : 'comprar';
                    const savedSearchesPage = document.querySelector('[data-num-saved]');
                    const numSaved = savedSearchesPage ? parseInt(savedSearchesPage.dataset.numSaved || 0, 10) : 0;
                    const event_data = {
                        'page_subcategory1': 'busqueda guardada ko',
                        'prod_category': prodCategory,
                        'num_saved': numSaved,
                        'events': 'pageview, prodView',
                    };
                    tealium_object.trackEvent(event_data, 'view');
                }

                modalFailedTemplate('saved-searches-failed', modal_options.saved_search_failed_descr, modal_options.saved_search_failed_btn_lbl, 'saved-search-retry');

                document.querySelector('.saved-search-retry').addEventListener('click', function(){
                    if (this.classList.contains('disabled')) {
                        return;
                    }

                    this.classList.add('disabled')
                    savedSearchOnClick.bind(document.querySelector('.save-search-btn.save-search-btn--ready'))()
                })
            }
        })
    }

    /**
     * Saved search click event.
     */
    function savedSearchOnClick() {
        const criteria_icon = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1289 5L6.55111 11.5778C6.09328 12.0142 5.37339 12.0142 4.91556 11.5778L2 8.69778" stroke="#003C46" stroke-width="1.5" stroke-linecap="round"/></svg>`
        const route = PropertiesRoute.parse(new URL(prepare_new_url()));
        const district = route.district ?? '';
        const area = route.get('area') ?? '';
        const subarea = route.get('subarea') ?? '';
        const post_code = route.get('post_code') ?? '';

        const location_string = [subarea, area, district].filter(Boolean).join(',');

        const sale_rent_label = document.querySelector('.p-listing__sale-rent-tabs__item--active').innerHTML
        let chiteria_html = `<div class="c-criteria__item">
            <div>${criteria_icon}</div>
            <div>${sale_rent_label} inmuebles</div>
        </div>`;

        if (district) {
            chiteria_html += `<div class="c-criteria__item">
            <div>${criteria_icon}</div>
            <div>${post_code ? post_code + ', ' : ''}${district}</div>
        </div>`;
        }

        const checkbox_fields_to_show = [
            'air_condition',
            'elevator',
            'parking_min',
            'common_swimming_pool',
            'private_swimming_pool',
            'heating_type_not_empty',
            'garden_area_amount_min',
            'custom_balcony',
        ];

        checkbox_fields_to_show.forEach(field_name => {
            const field_element = document.querySelector('#' + field_name)
            if (field_element !== null) {
                const field_parent = field_element.closest('.qcf-checkbox-list__item')
                if (field_element.checked) {
                    chiteria_html += `<div class="c-criteria__item">
                        <div>${criteria_icon}</div>
                        <div>${field_parent.querySelector('.qcf-checkbox-list__item__label')?.innerHTML}</div>
                    </div>`;
                }
            }
        })

        caixaSavedSearchesModal.open(`<div class="flex flex-col gap-3 pt-[36px]">
                <h4 class="m-0 p-0 text-[24px] leading-[28.8px] font-medium text-[#333333]">${modal_options.saved_search_new_title}</h4>
                <div class="font-[Roboto] text-[14px] leading-[100%] md:text-[16px] md:leading-[20.8px] text-[#333333]">${modal_options.saved_search_new_descr}</div>
            </div>
            <div class="flex flex-col gap-2">
                <div class="font-[Roboto] text-[12px] leading-[14.06px]">${modal_options.saved_search_new_field_lbl}</div>
                <div>
                    <input type="text" class="py-3 px-2 border border-solid border-[#E8E7E1] focus:outline-none rounded-[8px] font-[Roboto] w-full text-[14px] leading-[16.41px] box-border" name="saved_search_name" id="saved_search_name" placeholder="${modal_options.saved_search_new_field_placeholder + ' ' + (post_code ? post_code + ', ' : '') + district.trim()}">
                </div>
            </div>
            <div>
                <h4 class="m-0 p-0 text-[#000000] text-[12px] leading-[14.06px] font-[Roboto]">${modal_options.saved_search_new_criteria_title}</h4>
                <div class="c-criteria">${chiteria_html}</div>
            </div>
            <div class="w-full h-[192px]">
                <img src="https://maps.googleapis.com/maps/api/staticmap?center=${location_string}&zoom=13&size=600x300&maptype=roadmap&key=${gmkey}" onerror="googleMapStaticImgError(this);" data-alt-src="${default_listing_image}" alt="Saved Search" loading="lazy"  class="saved-search-item__photo__img"/>
            </div>
            <div>
                <button class="create-saved-search btn btn-pill btn-primary font-semibold block w-full text-center">${modal_options.saved_search_new_btn_lbl}</button>
            </div>`);

        const createSavedSearchBtn = document.querySelector('.create-saved-search')
        const saveSearchBtn = this;
        createSavedSearchBtn.addEventListener('click', function() {
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                const event_data = {
                    'event_category': 'guardar busqueda',
                    'event_action': 'click en texto',
                    "event_label": createSavedSearchBtn.textContent.trim().toLowerCase()
                };
                tealium_object.trackEvent(event_data, 'link');
            }

            if (this.classList.contains('disabled')) {
                return;
            }

            this.classList.add('disabled')
            createSavedSearch(saveSearchBtn)
        })
    }

    /**
     * Saved search click event action.
     */
    function savedSearchClickEvent() {
        const saveSearchBtnReady = document.querySelectorAll('.save-search-btn.save-search-btn--ready')
        saveSearchBtnReady.forEach(saveSearchBtn => {
            saveSearchBtn.addEventListener('click', savedSearchOnClick)
        })

        const saveSearchBtnLogin = document.querySelectorAll('.save-search-btn:not(.save-search-btn--ready):not(.save-search-btn--saved)')
        saveSearchBtnLogin.forEach(saveSearchBtn => {
            saveSearchBtn.addEventListener('click', function(){
                const icon_svg = `<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="#CACFFF"/>
                        <path d="M19 27C23.4183 27 27 23.4183 27 19C27 14.5817 23.4183 11 19 11C14.5817 11 11 14.5817 11 19C11 23.4183 14.5817 27 19 27Z" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M29.0004 29L24.6504 24.65" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>`
                modalLoginTemplate('saved-searches-no-login', login_url + '&medio=busqueda', icon_svg, modal_options.saved_search_login_title_1, modal_options.saved_search_login_sub_title_1, modal_options.saved_search_login_descr_1, modal_options.saved_search_login_title_2, modal_options.saved_search_login_btn_2, modal_options.saved_search_login_descr_2, 'saved-search-access-registrt-btn')
            })
        })

        trackSaveSearchBtn();
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
     * Generic function to track click events.
     */
    function trackClickEvent(selector, callback, type = 'link') {
        if (typeof TealiumTracker === 'undefined') {
            return;
        }

        document.querySelectorAll(selector).forEach(elem => {
            const tealium_object = new TealiumTracker();
            elem.addEventListener('click', (e) => {
                e.stopPropagation();
                const eventData = callback(elem);

                tealium_object.trackEvent(eventData, type);
            });
        });
    }

    /**
     * Track mobile listing filter.
     */
    function trackMobileListingFilter() {
        trackClickEvent('.filter-mobile-btn', () => {
            const pageDetails = getActivePageDetails(false, true, false);

            return {
                ...pageDetails,
                "page_category": "busqueda avanzada",
                "events": "pageview",
            };
        }, 'view');
    }

    /**
     * Track listing tabs.
     */
    function trackListingTabs() {
        trackClickEvent('.p-listing__actions__tab', tab => {
            const pageDetails = getPageDetails(tab);

            return {
                ...pageDetails,
                "events": "pageview",
            };
        }, 'view');
    }

    /**
     * Track save search button.
     */
    function trackSaveSearchBtn() {
        trackClickEvent('.save-search-btn', () => {
            const pageDetails = getActivePageDetails(false, true, false);

            return {
                ...pageDetails,
                "events": "click_view_saved_searches",
                "event_category": "guardar criterios de busqueda",
                "event_action": "click en filtro guardar busqueda",
                "event_label": "aplicar filtro guardar busqueda",
            };
        });
    }

    /**
     * Track advanced search submit button.
     */
    function trackSubmitBtn() {
        const fieldGroups = document.querySelectorAll(".qcf-field-group");
        let formattedData = {
            propertyTypes: {
                casas: [],
                pisos: []
            },
            price: 'notSet',
            surface: 'notSet',
            bedrooms: 'notSet',
            bathrooms: 'notSet',
            state: 'notSet',
            condition: 'notSet',
            features: [],
            otherFilters: []
        };

        fieldGroups.forEach((group) => {
            const groupLabel = group.querySelector('.qcf-field-group__label')?.textContent.trim() || '';
            const inputs = group.querySelectorAll("input, select");

            inputs.forEach(input => {
                if (input.checked && (input.type === "checkbox" || input.type === "radio")) {
                    // Handle property types
                    if (input.name.includes("property_type") && !input.name.includes("property_type[house][all]") && !input.name.includes("property_type[apartment][all]")) {
                        if (input.name.includes("[house]")) {
                            formattedData.propertyTypes.casas.push(input.previousElementSibling.textContent.trim().toLowerCase());
                        } else if (input.name.includes("[apartment]")) {
                            formattedData.propertyTypes.pisos.push(input.previousElementSibling.textContent.trim().toLowerCase());
                        }
                    }

                    // Handle features and other filters based on group label
                    switch(groupLabel) {
                        case 'Estado':
                            formattedData.state = input.closest('.qcf-checkbox-list__item').querySelector('.qcf-checkbox-list__item__label').textContent.trim().toLowerCase();
                            break;
                        case 'Características':
                            formattedData.features.push(input.closest('.qcf-checkbox-list__item').querySelector('.qcf-checkbox-list__item__label').textContent.trim().toLowerCase());
                            break;
                        case 'Otros filtros':
                            formattedData.otherFilters.push(input.closest('.qcf-checkbox-list__item').querySelector('.qcf-checkbox-list__item__label').textContent.trim().toLowerCase());
                            break;
                    }
                } else {
                    // Handle text/number inputs
                    switch(groupLabel) {
                        case 'Precio':
                            const minPrice = document.querySelector('[name="list_selling_price_amount_min"]')?.value || 'notSet';
                            const maxPrice = document.querySelector('[name="list_selling_price_amount_max"]')?.value || 'notSet';
                            if (minPrice !== 'notSet' || maxPrice !== 'notSet') {
                                formattedData.price = `${minPrice}€-${maxPrice}€`;
                            } else {
                                formattedData.price = 'notSet-notSet';
                            }
                            break;
                        case 'Superfície (metros útiles)':
                            if (input.value) {
                                const minSurface = document.querySelector('[name="internal_area_amount_min"]')?.value || 'notSet';
                                const maxSurface = document.querySelector('[name="internal_area_amount_max"]')?.value || 'notSet';
                                if (minSurface || maxSurface) {
                                    formattedData.surface = `${minSurface || '0'}-${maxSurface}`;
                                }
                            }
                            break;
                        case 'Habitaciones':
                            if (input.name === 'bedrooms_min' && input.value) {
                                formattedData.bedrooms = input.value + '+';
                            }
                            break;
                        case 'Baños':
                            if (input.name === 'bathrooms_min' && input.value) {
                                formattedData.bathrooms = input.value;
                            }
                            break;
                        case 'Equipamiento':
                            const fieldGroup = input.closest('.qcf-field-group__content');
                            const selectedOption = fieldGroup.querySelector('[data-value="' + input.value + '"]');
                            const selectedLabelText = selectedOption.querySelector('.qcf-radio-list__item__label').textContent.trim().toLowerCase();

                            formattedData.condition = selectedLabelText;
                            break;
                    }
                }
            });
        });

        // Format the final string with proper handling of multiple selections
        const propertyTypeString = [
            formattedData.propertyTypes.casas.length > 0 ? ['casas', ...formattedData.propertyTypes.casas].join(',') : '',
            formattedData.propertyTypes.pisos.length > 0 ? ['pisos', ...formattedData.propertyTypes.pisos].join(',') : ''
        ].filter(Boolean).join(',');

        const formattedString =
            propertyTypeString + ':' +
            formattedData.price + ':' +
            formattedData.surface + ':' +
            formattedData.bedrooms + ':' +
            formattedData.bathrooms + ':' +
            formattedData.state + ':' +
            formattedData.condition + ':' +
            (formattedData.features.length > 0 ? formattedData.features.join(',') : 'notSet') + ':' +
            (formattedData.otherFilters.length > 0 ? formattedData.otherFilters.join(',') : 'notSet');

        const event_data = {
            ...getActivePageDetails(false, true, false),
            "page_category": "busqueda avanzada",
            "event_category" : "buscador filtro avanzado",
            "event_action" : "click en boton",
            "event_label" : formattedString,
            "events": "click_filterViewProperty",
        }

        const tealium_object = new TealiumTracker();
        tealium_object.trackEvent(event_data, 'view');
    }

    /**
     * Track sorting dropdown.
     */
    function trackSorting() {
        trackClickEvent('.qcf-field-group--name-custom_sort .qcf-field-group__content__list__item', item => {
            const pageDetails = getActivePageDetails(false, true, false);

            return {
                ...pageDetails,
                "events" : "click_sorting",
                "event_category" : "ordenacion catalogo",
                "event_action" : "click en texto",
                "event_label" : item.textContent.toLowerCase().trim() || '',
            }
         });
    }

    /**
     * Track wishlist.
     */
    function trackWishlist() {
        trackClickEvent('.property-item .wishlist-btn', item => {
            let property = item.closest('.property-item');
            const pageDetails = getActivePageDetails(false, true, false);

            return {
                ...pageDetails,
                "events": "click_addToFavoriteList",
                "event_category": "favoritos catalogo",
                "event_action": "click en boton",
                "event_label": 'favoritos',
                "prod_category": property.dataset.category || '',
                "prod_id": property.dataset.ref || '',
                "prod_rooms": property.dataset.rooms || '',
                "prod_bathrooms": property.dataset.bathrooms || '',
                "prod_type": property.dataset.subcategory || '',
                "prod_surface": property.dataset.surface || '',
                "prod_status": property.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                "prod_floor": property.dataset.floor || '',
                "prod_state": property.dataset.state || '',
                "prod_pvp_price": property.dataset.pvpPrice || '',
                "prod_pvp_sale": property.dataset.pvpSale || '',
                "prod_energy_cert": property.dataset.energyCert || '',
                "prod_owner": property.dataset.agent || '',
                "prod_publication_status": property.dataset.websiteStatus || '',
                "prod_publication_date": property.dataset.publicationDate || '',
                "prod_characteristics": property.dataset.characteristics || '',
                "prod_otherfilters": property.dataset.otherFilters || '',
            };
        });
    }

    /**
     * Track contact button.
     */
    function trackContactButton() {
         trackClickEvent('.property-item .contact-us-btn', item => {
            let property = item.closest('.property-item');
            const pageDetails = getActivePageDetails(false, true, false);

            return {
                ...pageDetails,
                "events" : "click_cta",
                "event_category" : "contactar catalogo",
                "event_action" : "click en boton",
                "event_label" : item.textContent.toLowerCase().trim() || '',
                "prod_category": property.dataset.category || '',
                "prod_id": property.dataset.ref || '',
                "prod_rooms": property.dataset.rooms || '',
                "prod_bathrooms": property.dataset.bathrooms || '',
                "prod_type": property.dataset.subcategory || '',
                "prod_surface": property.dataset.surface || '',
                "prod_status": property.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                "prod_floor": property.dataset.floor || '',
                "prod_state": property.dataset.state || '',
                "prod_pvp_price": property.dataset.pvpPrice || '',
                "prod_pvp_sale": property.dataset.pvpSale || '',
                "prod_energy_cert": property.dataset.energyCert || '',
                "prod_owner": property.dataset.agent || '',
                "prod_publication_status": property.dataset.websiteStatus || '',
                "prod_publication_date": property.dataset.publicationDate || '',
                "prod_characteristics": property.dataset.characteristics || '',
                "prod_otherfilters": property.dataset.otherFilters || '',
            };
        });
    }

    /**
     * Track phone button.
     */
    function trackPhone() {
         trackClickEvent('.agent-phone-btn', item => {
            let propertyID = item.getAttribute('property-id');
            let property = document.querySelector('a.property-item[id="' + propertyID + '"]');
            const pageDetails = getActivePageDetails(false, true, false);
            return {
                ...pageDetails,
                "events" : "click_cta",
                "event_category" : "ver telefono catálogo",
                "event_action" : "click en boton",
                "event_label" : "ver teléfono",
                "prod_category": property.dataset.category || '',
                "prod_id": property.dataset.ref || '',
                "prod_rooms": property.dataset.rooms || '',
                "prod_bathrooms": property.dataset.bathrooms || '',
                "prod_type": property.dataset.subcategory || '',
                "prod_surface": property.dataset.surface || '',
                "prod_status": property.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                "prod_floor": property.dataset.floor || '',
                "prod_state": property.dataset.state || '',
                "prod_pvp_price": property.dataset.pvpPrice || '',
                "prod_pvp_sale": property.dataset.pvpSale || '',
                "prod_energy_cert": property.dataset.energyCert || '',
                "prod_owner": property.dataset.agent || '',
                "prod_publication_status": property.dataset.websiteStatus || '',
                "prod_publication_date": property.dataset.publicationDate || '',
                "prod_characteristics": property.dataset.characteristics || '',
                "prod_otherfilters": property.dataset.otherFilters || '',
            };
        });
    }

    /**
     * Track product selection.
     */
    function trackProductSelection() {
        trackClickEvent('.property-item', item => {
            const pageDetails = getActivePageDetails(false, true, false);
            let event_label = item.querySelector('.property-item__inner__row2__details__name')?.textContent.toLowerCase().trim() ||
                              item.querySelector('.property-list-item__details__name__content')?.textContent.toLowerCase().trim() ||
                              '';

            return {
                ...pageDetails,
                "events": 'click_productSelection',
                "event_category": 'seleccion producto',
                "event_action": 'click en producto',
                "event_label": event_label,
                "prod_category": (item.dataset.category || ''),
                "prod_id": item.dataset.ref || '',
                "prod_rooms": item.dataset.rooms || '',
                "prod_bathrooms": item.dataset.bathrooms || '',
                "prod_type": item.dataset.subcategory || '',
                "prod_surface": item.dataset.surface || '',
                "prod_status": item.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                "prod_floor": item.dataset.floor || '',
                "prod_state": item.dataset.state || '',
                "prod_pvp_price": item.dataset.pvpPrice || '',
                "prod_pvp_sale": item.dataset.pvpSale || '',
                "prod_energy_cert": item.dataset.energyCert || '',
                "prod_owner": item.dataset.agent || '',
                "prod_publication_status": item.dataset.websiteStatus || '',
                "prod_publication_date": item.dataset.publicationDate || '',
                "prod_characteristics": item.dataset.characteristics || '',
                "prod_otherfilters": item.dataset.otherFilters || '',
            }
        });
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
     * Handle access registry click.
     *
     * @param {Event} e The event.
     */
    function savedSearchAccessRegistryClick(e) {
        if (typeof TealiumTracker === 'undefined') {
            return;
        }
        e.preventDefault();
        const pageDetails = getActivePageDetails(false, true, false);
        const tealium_object = new TealiumTracker();
        const event_data = {
            ...pageDetails,
            "events": "click_access",
            "event_category": "acceder aviso bajada precio",
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
            document.querySelectorAll('.saved-search-access-registrt-btn').forEach(btn => {
                if (!btn.dataset.listenerAdded) {
                    btn.dataset.listenerAdded = "true";
                    btn.addEventListener('click', savedSearchAccessRegistryClick);
                }
            });
        });

        observer.observe(document.body, { childList: true, subtree: true });
    }

    /**
     * Initialize Tealium events.
     */
    function initializeTealiumEvents() {
        trackListingTabs();
        trackMobileListingFilter();
        trackSorting();
        trackWishlist();
        trackContactButton();
        trackPhone();
        trackProductSelection();
        observeAccessRegistryButtons();
    }

    document.addEventListener('DOMContentLoaded', function(event) {
        add_hidden_fields();
        QoetixCustomFields.eventActions();

        document.querySelectorAll('.listing-filters input').forEach(elem => {
            elem.addEventListener('change', function(){
                clearTimeout(change_value_timeout)
                change_value_timeout = setTimeout(() => {
                    load_sections(prepare_new_url(), true);
                }, 300);
            })
        })

        sale_rent_tabs();
        reset_button_action();
        show_tabs()
        sort_dropdown_enable()
        page_actions()
        ContactUs.eventAgentTel()

        check_size()

        window.addEventListener('resize', function(){
            check_size()
        });

        /**
         * Track advanced search.
         */
        const trackAdvancedSearch = (selector) => {
            document.querySelectorAll(selector).forEach(elem => {
                elem.addEventListener('click', function() {
                    const style = getComputedStyle(elem);
                    if (style.display === 'none' || style.visibility === 'hidden') return;

                    const filter_category = elem.closest('.qcf-field-group').querySelector('.qcf-field-group__label').textContent.toLowerCase().trim() || '';
                    const filter_applied = elem.querySelector('[class$="list__item__label"]')?.textContent.toLowerCase().trim() || elem.textContent.toLowerCase().trim() || '';

                    const normalized_filter = (filter_applied === 'casas') ? 'casa' :
                                         (filter_applied === 'pisos') ? 'piso' :
                                         filter_applied;

                    let event_data = {
                        ...getActivePageDetails(false, true, false),
                        "events": "click_singleFilter",
                        "event_category" : "filtro simple",
                        "event_action": 'click en filtro ' + filter_category,
                        "event_label": 'aplicar filtro ' + normalized_filter
                    }

                    const tealium_object = new TealiumTracker();
                    tealium_object.trackEvent(event_data, 'link');
                });
            });
        }

        trackAdvancedSearch('.qcf-property-type-filters .qcf-checkbox-filter-list__item__main:not(.qcf-checkbox-filter-list__item__main--disabled)');
        trackAdvancedSearch('.qcf-property-type-filters .qcf-checkbox-filter-list__item__sub__group_item:not(.qcf-checkbox-filter-list__item__sub__group_item--disabled)');

        trackAdvancedSearch('.listing-filters .qcf-checkbox-list__item');
        trackAdvancedSearch('.listing-filters .qcf-radio-list__item');
        trackAdvancedSearch('.listing-filters .qcf-field-group__content__list__item');

        const filter_submit_btn = document.querySelector('.filter-submit-btn')
        filter_submit_btn.addEventListener('click', function(e){
            e.preventDefault();
            const filter_mobile_btn = document.querySelector('.filter-mobile-btn')
            const search_form = document.querySelector('.search-form')
            filter_mobile_btn.classList.remove('filter-mobile-btn--active')
            search_form.classList.remove('search-form--visible')
            document.body.classList.remove('disable-scrolling')
            document.removeEventListener('click', monitorMobileFilters);

            trackSubmitBtn();
        })

        update_filter_button_label()

        filter_mobile_counter();

        const { district, params: { area } } = PropertiesRoute.parse(new URL(url));

        storeLocationSearchHistory({ district, area });

        savedSearchClickEvent()

        document.querySelector('#map-listing').addEventListener('map:popup-loaded', function(event) {
            if (typeof TealiumTracker !== 'undefined') {

                const event_data = {
                    ...getActivePageDetails(true, true, false),
                    "events": "click_productsModule",
                    "event_category": "inmuebles mapa",
                    "event_action": "click en inmueble",
                    "event_label": event.detail.property_data.name,
                    "prod_category": getPropertyCategory(event.detail.property_data.category),
                    "prod_id": event.detail.property_data.ref,
                    "prod_rooms": event.detail.property_data.bedrooms,
                    "prod_bathrooms": event.detail.property_data.bathrooms,
                    "prod_type": event.detail.property_data.property_subtype,
                    "prod_surface": event.detail.property_data.surface,
                    "prod_status": event.detail.property_data.construction_stage === 'completed' ? 'obra nueva' : '',
                    "prod_floor": event.detail.property_data.floor_number,
                    "prod_state": event.detail.property_data.address,
                    "prod_energy_cert": event.detail.property_data.energy_efficiency_certificate,
                    "prod_pvp_price": event.detail.property_data.raw_website_price,
                    "prod_pvp_sale": event.detail.property_data.pvp_sale,
                    "prod_owner": event.detail.property_data.agent.id,
                    "prod_publication_status": event.detail.property_data.publication_status.toLowerCase(),
                    "prod_publication_date": event.detail.property_data.publication_date,
                }
                const tealium_object = new TealiumTracker();
                tealium_object.trackEvent(event_data, 'link');
            }
            wishlistPrepareEventsByLogin()
        });

        initializeTealiumEvents();
    });
})();

/**
 * Prepare sothebys popup.
 *
 * @param {object} options The options.
 * @returns {string}
 */
function caixaMapPopup(options) {
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
