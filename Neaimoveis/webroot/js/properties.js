/**
 * When the google static map img fails it will load the default image.
 * @param {object} img The img element.
 */
function googleMapStaticImgError(img){
    img.src = img.getAttribute('data-alt-src')
    console.error('Google Static map load failed.');
}

(function() {

    let loadPropertiesController;

    const filter_btn_string = "Show %d results";
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
            QoetixMap.resetMapPosition()
            pagination_section?.classList.add('hidden')
            mobile_list_btn.classList.add('mobile-btn--active')
            mobile_map_btn.classList.remove('mobile-btn--active')
        })

        mobile_list_btn.addEventListener('click',function(){
            document.querySelector('.p-listing__results__section--active').classList.remove('p-listing__results__section--active')
            document.querySelector('#section-listing-2').classList.add('p-listing__results__section--active')
            const pagination_section = document.querySelector('.c-pagination-section')
            pagination_section?.classList.remove('hidden')
            mobile_map_btn.classList.add('mobile-btn--active')
            mobile_list_btn.classList.remove('mobile-btn--active')
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

                url.searchParams.set('tab', this.getAttribute('data-tab'));
                window.history.pushState({}, '', url);
            })
        })

        if (url.searchParams.get('tab') !== null) {
            const tab_item_elem = document.querySelector('.p-listing__actions__tab[data-tab="' + url.searchParams.get('tab') + '"]')
            if (tab_item_elem !== null) {
                tab_item_elem.dispatchEvent(new Event('click'))
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

        if (route.get('sale_rent') !== 'for_sale') {
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
    function load_sections(url) {
        const route = PropertiesRoute.parse(new URL(url));
        route.params.ajax = true;

        const api_url = route.buildUrl();

        const content_results_elem = document.querySelector('.content-results')
        content_results_elem.classList.add('content-results--loading')
        if (content_results_elem.querySelector('.listing-loading-div') === null) {
            content_results_elem.insertAdjacentHTML("beforeend", spinner_div)
        }

        window.history.pushState({}, '', url);

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
            // Reset map.
            if (QoetixMap.resetMap()) {
                // Load map new coordinates.
                const map_coordinates = await load_map_coordinates();
            }
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

    document.addEventListener('DOMContentLoaded', function(event) {
        add_hidden_fields();
        QoetixCustomFields.eventActions();
        load_map_coordinates();

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

        check_size()

        window.addEventListener('resize', function(){
            check_size()
        });

        const filter_submit_btn = document.querySelector('.filter-submit-btn')
        filter_submit_btn.addEventListener('click', function(e){
            e.preventDefault();
            const filter_mobile_btn = document.querySelector('.filter-mobile-btn')
            const search_form = document.querySelector('.search-form')
            filter_mobile_btn.classList.remove('filter-mobile-btn--active')
            search_form.classList.remove('search-form--visible')
            document.body.classList.remove('disable-scrolling')
            document.removeEventListener('click', monitorMobileFilters);
        })

        update_filter_button_label()

        filter_mobile_counter();
    });
})();
