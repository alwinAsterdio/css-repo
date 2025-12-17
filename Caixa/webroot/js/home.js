/**
 * When the google static map img fails it will load the default image.
 * @param {object} img The img element.
 */
function googleMapStaticImgError(img){
    img.src = img.getAttribute('data-alt-src')
    console.error('Google Static map load failed.');
}

(function() {
    let check_resize_timeout;
    let saved_searches_glide = null;
    let discount_properties_glide = null;
    let location_carousel_glide = null;

    /**
     * Render the location section for small screens.
     */
    function renderSmallScreenLocationSection(){
        let location_carousel = document.querySelector('.glide-locations')
        if (location_carousel !== null) {
            return;
        }

        let properties_items = '';
        for(i in location_properties.location_title) {
            const image_id = location_properties.location_img[i]
            const location_url = properties_slug + location_properties.location_qobrix_url[i]
            properties_items += `<li class="glide__slide carousel-location-group__item" data-url="${location_url}">
                <div class="carousel-location-group__item__title">${location_properties.location_title[i]}</div>
                <img src="/files/download/${image_id}" class="carousel-location-group__item__img" alt="Location image" loading="lazy"/>
            </li>`
        }
        const html = `<div class="glide glide-locations">
            <div class="glide__track pb-[32px]" data-glide-el="track">
                <ul class="glide__slides">
                ${properties_items}
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <div class="glide__arrow glide__arrow--left group" data-glide-dir="<">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" class="stroke-black group-hover:stroke-white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23 16H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 21L10 16L15 11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="glide__arrow glide__arrow--right group" data-glide-dir=">">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" class="stroke-black group-hover:stroke-white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 16H21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17 21L22 16L17 11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>`

        const location_sm_elm = document.querySelector('.location-section-sm')
        location_sm_elm.insertAdjacentHTML("beforeend", html)

        location_carousel_glide = new Glide('.glide-locations', {
            type: 'carousel',
            startAt: 0,
            perView: 2,
            gap: 10,
            breakpoints: {
                425: {
                    perView: 1
                },
                768: {
                    perView: 2
                }
            }
        }).mount();

        const carousel_Location_items = document.querySelectorAll('.carousel-location-group__item');
        carousel_Location_items.forEach(item => {
            item.addEventListener('click', function() {
                const location_url = item.getAttribute('data-url');
                const location_name = item.querySelector('.carousel-location-group__item__title').textContent;
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();

                    const event_data = {
                        "events": 'click_productsModule',
                        "event_category": 'modulo descubre la oferta inmobiliaria',
                        "event_action": 'click en modulo',
                        "event_label": location_name.trim()
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }
                window.location = location_url;
            })
        });
    }

    function checkScreenSize(){
        clearTimeout(check_resize_timeout);
        check_resize_timeout = setTimeout(() => {
            const search_section = document.querySelector('.homepage-single-location-section');
            const search_placeholder = document.querySelector('.qcf-single-select-ajax .qcf-field-group__label')

            let window_width = window.innerWidth;
            if (window_width < 1024) {
                search_placeholder.innerHTML = search_section.getAttribute('data-search-placeholder-sm')
                enableSavedSearchGlide()
                renderSmallScreenLocationSection()
            } else if (window_width < 1280) {
                renderSmallScreenLocationSection()
            } else {
                search_placeholder.innerHTML = search_section.getAttribute('data-search-placeholder-lg')
                if (saved_searches_glide) {
                    saved_searches_glide.destroy();
                    saved_searches_glide = null;
                }
            }
        }, 200);
    }

    /**
     * Enable saved search slider.
     */
    function enableSavedSearchGlide(){
        if (!saved_searches_glide) {
            const saved_searches_elem = document.querySelector('.glide-saved-searches')
            if (saved_searches_elem === null) {
                return;
            }

            saved_searches_glide = new Glide('.glide-saved-searches', {
                type: 'slider',
                startAt: 0,
                perView: 3,
                gap: 24,
                breakpoints: {
                    425: {
                        perView: 1
                    },
                    768: {
                        perView: 2
                    },
                    1023: {
                        perView: 2
                    },
                    1024: {
                        perView: 3
                    },
                    1439: {
                        perView: 3,
                    },
                    1440: {
                        perView: 4
                    }
                }
            }).mount()
        }
    }

    /**
     * Enable saved search slider.
     */
    function enableDiscountPropertiesGlide(){
        if (!discount_properties_glide) {
            const saved_searches_elem = document.querySelector('.glide-properties')
            if (saved_searches_elem === null) {
                return;
            }

            discount_properties_glide = new Glide('.glide-properties', {
                type: document.querySelectorAll('.glide-properties .glide__slide').length <= 4 ? 'slider' : 'carousel',
                startAt: 0,
                perView: 4,
                gap: 24,
                breakpoints: {
                    767: {
                        perView: 1
                    },
                    768: {
                        perView: 2
                    },
                    1023: {
                        perView: 2
                    },
                    1024: {
                        perView: 3
                    },
                    1439: {
                        perView: 3,
                    },
                    1440: {
                        perView: 4
                    }
                }
            }).mount()
        }
    }

    /**
     * Retrieve the location search history from the cookie.
     */
    function getLocationSearchHistory() {
        const match = document.cookie.match(new RegExp('(^| )' + 'location_search_history' + '=([^;]+)'));
        return match ? JSON.parse(decodeURIComponent(match[2])) : null;
    }

    document.addEventListener('DOMContentLoaded',function(){
        QoetixCustomFields.eventActions();
        ContactUs.eventAgentTel()

        enableDiscountPropertiesGlide();

        const special_buttons = document.querySelectorAll('.special-checkbox')
        special_buttons.forEach(btn => {
            btn.addEventListener('click', function(){

                params = {
                    id: btn.closest('.saved-search-item').id,
                    status: btn.checked,
                }

                fetch('/api/saved-searches/update-status', {
                    method: 'POST',
                    body: JSON.stringify(params),
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8'
                    },
                }).then(function (response) {
                    return response.json();
                }).then(function (response) {
                })
            })
        })

        const action_btns = document.querySelectorAll('.saved-search-item__details__title__actions')
        action_btns.forEach(_action_btn => {
            _action_btn.addEventListener('click', function(e){
                e.preventDefault()
                e.stopPropagation();

                const existing_open = document.querySelectorAll('.saved-search-item__details__title__actions--open')
                existing_open.forEach(element => {
                    if (element !== _action_btn) {
                        element.classList.remove('saved-search-item__details__title__actions--open')
                    }
                });

                this.classList.toggle('saved-search-item__details__title__actions--open')
            })
        })

        const delete_action_btns = document.querySelectorAll('.saved-search-item__details__title__actions__list__item--delete')
        delete_action_btns.forEach(_action_btn => {
            _action_btn.addEventListener('click', function(e){
                e.preventDefault()
                e.stopPropagation();

                const deleteSavedSearchModal = new CaixaModal({className: 'saved-searches-delete'});
                deleteSavedSearchModal.open(`<div class="flex flex-col gap-3">
                        <h4 class="m-0 p-0 pt-[54px] text-[24px] leading-[28.8px] text-theme-primary-color font-medium text-[#333333] text-center">Eliminar búsqueda</h4>
                        <div class="font-[Roboto] text-[16px] leading-[20.8px] text-center">¿Estas seguro que deseas eliminar tu búsqueda? Dejarás de recibir notificaciones de nuevos inmuebles.</div>
                    </div>
                <div class="flex flex-col lg:flex-row gap-2">
                    <button class="saved-search-btn-cancel btn btn-pill btn-secondary font-semibold block text-center order-2 lg:order-1">Cancelar</button>
                    <button class="saved-search-btn-confirm btn btn-pill btn-primary flex-1 font-semibold block text-center order-1 lg:order-2">Si, eliminar búsqueda</button>
                </div>
                `)

                document.querySelector('.saved-search-btn-cancel').addEventListener('click', function(){
                    deleteSavedSearchModal.close()
                })

                document.querySelector('.saved-search-btn-confirm').addEventListener('click', function(){
                    if (this.classList.contains('disabled')) {
                        return;
                    }

                    this.classList.add('disabled')

                    fetch('/api/saved-searches/delete/' + _action_btn.closest('.saved-search-item').getAttribute('id'), {
                        method: 'DELETE',
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8',
                        },
                    }).then(function (response) {
                        return response.json();
                    }).then(function (response) {
                        if (response.status) {
                            window.location.reload();
                        } else {
                            deleteSavedSearchModal.close()

                            console.error('Failed to delete lead');
                        }
                    })
                })
            })
        })

        const edit_action_btns = document.querySelectorAll('.saved-search-item__details__title__actions__list__item--edit')
        edit_action_btns.forEach(_action_btn => {
            _action_btn.addEventListener('click', function(e){
                e.preventDefault()
                e.stopPropagation();

                const editSavedSearchModal = new CaixaModal({className: 'saved-searches-delete'});
                editSavedSearchModal.open(`<div class="flex flex-col gap-3">
                    <h4 class="m-0 p-0 pt-[54px] text-[24px] leading-[28.8px] text-theme-primary-color font-medium text-[#333333]">Renombrar búsqueda</h4>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="font-[Roboto] text-[12px] leading-[14.06px] text-[#000000]">Colocarle un nombre a la búsqueda</div>
                    <div>
                        <input type="text" class="py-3 px-2 border border-solid border-[#E8E7E1] focus:outline-none rounded-[8px] font-[Roboto] w-full text-[14px] leading-[16.41px] box-border" name="saved_search_name" id="saved_search_name" placeholder="Viviendas en ${_action_btn.getAttribute('data-district')}" value="${_action_btn.getAttribute('data-name')}">
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row gap-2">
                    <button class="saved-search-btn-cancel btn btn-pill btn-secondary font-semibold block text-center order-2 lg:order-1">Cancelar</button>
                    <button class="saved-search-btn-confirm btn btn-pill btn-primary flex-1 font-semibold block text-center order-1 lg:order-2">Renombrar búsqeda</button>
                </div>
                `)

                document.querySelector('.saved-search-btn-cancel').addEventListener('click', function(){
                    editSavedSearchModal.close()
                })

                document.querySelector('.saved-search-btn-confirm').addEventListener('click', function(){
                    if (this.classList.contains('disabled')) {
                        return;
                    }

                    this.classList.add('disabled')
                    const new_lead_name = document.querySelector('#saved_search_name')?.value ?? '';
                    fetch('/api/saved-searches/update/' + _action_btn.closest('.saved-search-item').getAttribute('id') + '/' + new_lead_name, {
                        method: 'POST',
                        body: JSON.stringify({custom_saved_search_name: new_lead_name}),
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8'
                        },
                    }).then(function (response) {
                        return response.json();
                    }).then(function (response) {
                        if (response.status) {
                            window.location.reload();
                        } else {
                            editSavedSearchModal.close()

                            console.error('Failed to update lead');
                        }
                    })
                })
            })
        })

        checkScreenSize()

        window.addEventListener('resize', checkScreenSize);

        const sale_rent_btns = document.querySelectorAll('.for-sale-rent-btns__item')
        sale_rent_btns.forEach(btn => {
            btn.addEventListener('click', function(){
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    let event_data = {
                        "events": 'click_singleFilter',
                        "event_category": 'filtro simple',
                        "event_action": 'click en filtro compra_alquiler',
                        "event_label": 'aplicar filtro ' + this.innerText.trim().toLowerCase()
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }
                if (this.classList.contains('for-sale-rent-btns__item--active')) {
                    return;
                }

                document.querySelectorAll('.for-sale-rent-btns__item--active').forEach(_btn => {
                    _btn.classList.remove('for-sale-rent-btns__item--active')
                })

                this.classList.add('for-sale-rent-btns__item--active')

                window.location='/?sale_rent=' + this.getAttribute('data-value');
            })
        })

        const search_btn = document.querySelector('#search_btn')
        search_btn.addEventListener('click', function() {
            const parent_group = document.querySelector('.qcf-select-ajax--single-location')
            const location_input = document.querySelector('input[name="location"]')
            const search_helper = document.querySelector('.search_helper');
            const search_input = document.querySelector('#search_location');
            const search_value = search_input ? search_input.value : '';
            const event_data = {
                "event_label": search_btn.textContent,
                "page_internal_search_kw": search_value
            };
            if (location_input === null) {
                parent_group.classList.add('has-error')
                search_helper.innerHTML = 'Escribe un criterio de búsqueda para comenzar. ';
                search_helper.classList.add('search_helper--has-error')
                search_input.addEventListener('change', function fn(){
                    search_helper.innerHTML = '';
                    search_helper.classList.remove('search_helper--has-error')
                    parent_group.classList.remove('has-error')
                    search_input.removeEventListener('change', fn)
                });
                event_data.events = "pageview";
                event_data.page_subcategory1 = "buscador error";
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    tealium_object.trackEvent(event_data, 'view');
                }
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

                event_data.events = "click_searchBar";
                event_data.event_category = "buscador generico";
                event_data.event_action = "click en boton";
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    tealium_object.trackEvent(event_data, 'link');
                }

                window.location = route.buildUrl();
            }
        });

        const location_search_result = document.querySelector('.qcf-single-select-ajax.qcf-select-ajax--single-location');
        location_search_result?.addEventListener('select-ajax:changed', () => {
            search_btn.click();
        });

        const user_search_list = document.querySelectorAll('.user-search-list .user-search-list__item');
        // Retrieve search history.
        const { area, district } = getLocationSearchHistory() || {};
        if (district === undefined) {
            document.querySelector('.user-search-section').style.display='none';
        } else {
            user_search_list.forEach(search_list => {
                search_list.addEventListener('click', function(e) {
                    e.preventDefault();

                    const search_string = search_list.getAttribute('data-search-string');
                    const current_url_params = new URLSearchParams(window.location.search);
                    const params = new URLSearchParams(search_string);
                    const sale_rent = current_url_params.get('sale_rent') ?? params.get('sale_rent') ?? 'for_sale'
                    params.delete('sale_rent');
                    const other_params = {};
                    if (area !== undefined) {
                        other_params['area'] = area;
                    }
                    for (const [key, value] of params.entries()) {
                        other_params[key] = value;
                    }

                    const route = new PropertiesRoute(sale_rent, null, district ?? '', other_params);
                    if (typeof TealiumTracker !== 'undefined') {
                        const tealium_object = new TealiumTracker();
                        const event_data = {
                            "events": 'click_productsModule',
                            "event_category": 'modulo inspiracion para ti',
                            "event_action": 'click en modulo',
                            "event_label": search_list.querySelector('img').getAttribute('alt'),
                        };
                        tealium_object.trackEvent(event_data, 'link');
                    }

                    window.location = route.buildUrl();
                })
            });
        }

        const location_group_items = document.querySelectorAll('.location-group__item');
        location_group_items.forEach(item => {
            item.addEventListener('click', function() {
                const location_url = item.getAttribute('data-url');
                const location_name = item.querySelector('.location-group__item__inner__label a').textContent;
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();

                    const event_data = {
                        "events": 'click_productsModule',
                        "event_category": 'modulo descubre la oferta inmobiliaria',
                        "event_action": 'click en modulo',
                        "event_label": location_name.trim()
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }
                window.location = location_url;
            })
        });

        const feature_service_items = document.querySelectorAll('.feature-service-item');
        feature_service_items.forEach(item => {
            item.addEventListener('click', function() {
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const event_data = {
                        "events": 'click_productsModule',
                        "event_category": 'modulo hogar facil',
                        "event_action": 'click en boton',
                        "event_label": item.querySelector('h3').textContent.trim()
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }
            })
        });

        const mortgage_btn = document.querySelector('.mortgage-btn');
        mortgage_btn.addEventListener('click', function() {
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                const event_data = {
                    "events": 'click_mortgage',
                    "event_category": 'calcular hipoteca',
                    "event_action": 'click en boton',
                    "event_label": mortgage_btn.textContent.trim()
                };
                tealium_object.trackEvent(event_data, 'link');
            }
        });

        const location_list_items = document.querySelectorAll('.location-list__item__areas a');
        location_list_items.forEach(item => {
            item.addEventListener('click', function() {
                const location_name = item.textContent.trim();
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const event_data = {
                        "events": 'click_singleFilter',
                        "event_category": 'filtro simple',
                        "event_action": 'click en filtro provincias',
                        "event_label": 'aplicar filtro ' + location_name
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }
            })
        });


        const property_items = document.querySelectorAll('.property-item');
        property_items.forEach(item => {
            item.addEventListener('click', function() {
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const event_data = {
                        "events": 'click_productsModule',
                        "event_category": 'modulo inmuebles mayores rebajas',
                        "event_action": 'click en producto',
                        "event_label": item.querySelector('.property-item__inner__row2__details__name').textContent.trim(),
                        "prod_category": item.dataset.category,
                        "prod_id": item.dataset.ref,
                        "prod_rooms": item.dataset.rooms,
                        "prod_bathrooms": item.dataset.bathrooms,
                        "prod_type": item.dataset.subcategory,
                        "prod_surface": item.dataset.surface,
                        "prod_status": item.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                        "prod_floor": item.dataset.floor,
                        "prod_state": item.dataset.state,
                        "prod_pvp_price": item.dataset.pvpPrice,
                        "prod_pvp_sale": item.dataset.pvpSale,
                        "prod_energy_cert": item.dataset.energyCert,
                        "prod_owner": item.dataset.agent,
                        "prod_publication_status": item.dataset.websiteStatus,
                        "prod_publication_date": item.dataset.publicationDate,
                        "prod_characteristics": item.dataset.characteristics,
                        "prod_otherfilters": item.dataset.otherFilters,
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }
            })
        });

        const agent_mobile_phones = document.querySelectorAll('.agent-phone-btn')
        agent_mobile_phones.forEach(_btn => {
            _btn.addEventListener('click', function(e){
                e.stopPropagation();
                const propertyID = _btn.getAttribute('property-id');
                const property_item = document.querySelector('a.property-item[id="' + propertyID + '"]');

                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const event_data = {
                        "events": 'click_cta',
                        "event_category": 'ver telefono home',
                        "event_action": 'click en boton',
                        "event_label": 'llamar',
                        "prod_category": property_item.dataset.category,
                        "prod_id": property_item.dataset.ref,
                        "prod_rooms": property_item.dataset.rooms,
                        "prod_bathrooms": property_item.dataset.bathrooms,
                        "prod_type": property_item.dataset.subcategory,
                        "prod_surface": property_item.dataset.surface,
                        "prod_status": property_item.dataset.constructionStage === 'completed' ? 'obra nueva' : '' || '',
                        "prod_floor": property_item.dataset.floor,
                        "prod_state": property_item.dataset.state,
                        "prod_pvp_price": property_item.dataset.pvpPrice,
                        "prod_pvp_sale": property_item.dataset.pvpSale,
                        "prod_energy_cert": property_item.dataset.energyCert,
                        "prod_owner": property_item.dataset.agent,
                        "prod_publication_status": property_item.dataset.websiteStatus,
                        "prod_publication_date": property_item.dataset.publicationDate,
                        "prod_characteristics": property_item.dataset.characteristics,
                        "prod_otherfilters": property_item.dataset.otherFilters,
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }
            });
        });

        const saved_searches_link = document.querySelector('.saved-searches-link');
        saved_searches_link?.addEventListener('click', function(e) {
            e.preventDefault();
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                const count = parseInt(e.currentTarget.dataset.numSaved || 0, 10);
                const event_data = {
                    'page_category': 'home',
                    'event_category': 'ver busquedas guardadas',
                    'event_action': 'click en texto',
                    'event_label': e.currentTarget.textContent.trim(),
                    'num_properties': count,
                    'num_saved': count,
                    'events': 'pageview',
                };
                tealium_object.trackEvent(event_data, 'view');
            }
            window.location.href = e.currentTarget.href;
        });

        const locationContainer = document.querySelector(".qcf-select-ajax--single-location");
        const polygonButton = document.querySelector("#polygon_search_modal--btn");
        const contentDiv = locationContainer.querySelector(".qcf-field-group__content");
        const input = locationContainer.querySelector("#search_location");

        const updateHomeSearchLayout = () => {
            const hasText = input.value.trim() !== "";
            if (contentDiv) {
                contentDiv.style.display = hasText ? "block" : "none";
            }
            if (polygonButton) {
                polygonButton.classList.toggle("md:hidden", hasText);
            }
        };

        if (input) {
            input.addEventListener("input", updateHomeSearchLayout);
            input.addEventListener("focus", updateHomeSearchLayout);
        }

        locationContainer.addEventListener("click", function () {
            if (locationContainer.classList.contains("qcf-field-group--open") && input.value.trim() === "") {
                polygonButton.classList.remove("md:hidden");
                if (contentDiv) {
                    contentDiv.style.display = "none";
                }
            }
        });

        document.addEventListener("click", function (event) {
            if (!locationContainer.contains(event.target) && !polygonButton.contains(event.target)) {
                polygonButton.classList.add("md:hidden");
                if (contentDiv) {
                    contentDiv.style.display = "none";
                }
            }
        });

        const polygonModal = document.getElementById("polygon_search_modal");
        const polygonOpenBtn = document.getElementById("polygon_search_modal--open");
        const polygonCloseBtn = document.getElementById("polygon_search_modal--close");
        polygonOpenBtn.addEventListener("click", () => {
            polygonModal.classList.remove("opacity-0", "pointer-events-none");
            polygonModal.classList.add("opacity-100", "pointer-events-auto");
        });
        polygonCloseBtn.addEventListener("click", () => {
            polygonModal.classList.remove("opacity-100", "pointer-events-auto");
            polygonModal.classList.add("opacity-0", "pointer-events-none");
        });
    })
})();
