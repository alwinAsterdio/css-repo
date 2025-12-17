(function() {
    const form_section = document.querySelector('.enquiry-form-section')
    const form = form_section.querySelector('.enquiry-form')
    const custom_contact_topic_section = form.querySelector('.contact-reason')
    const custom_contact_topic_input = form.querySelector('#custom_contact_topic')
    const price_drop_wishlist_btn = document.querySelector('.price-drop-in-wishlist')
    const price_drop_btn = document.querySelector('.price-drop')
    const mortgage_link_btn = document.querySelector('.mortgage-link')
    const mortgage_link_sidebar_btn = document.querySelector('.mortgage-link-sidebar')
    const wishlist_btns = document.querySelectorAll('.wishlist-btn')
    const property_wishlist_btn = document.querySelector('.property-page-actions .wishlist-btn')
    const property_id = price_drop_wishlist_btn.closest('.property-item').getAttribute('id')
    const sale_rent = price_drop_wishlist_btn.closest('.property-item').getAttribute('data-sale-rent')

    const dummyForm = form.cloneNode(true);
    dummyForm.id="dummy"
    dummyForm.classList.remove('enquiry-form')
    dummyForm.classList.add('dummy-form')

    /**
     * Monitor for the popup.
     *
     * @param {object} event The event.
     */
    function monitorPopup(event){
        let close_popup = typeof event === "undefined"
        if (close_popup) {
            reset_form();
            document.removeEventListener('click', monitorPopup);
        }
    }

    const form_contact_reason = form.querySelector('.contact-reason .qcf-select:not(.contact-reason--ready)')
    if (form_contact_reason !== null) {
        form_contact_reason.classList.add('contact-reason--ready')
        form_contact_reason.addEventListener('qcf:open', function(){
            const first_item = form_contact_reason.querySelector('.qcf-field-group__content__list__item[data-value="Solicitar información del inmueble y financiación"]')
            if (sale_rent !== 'for_sale') {
                first_item.classList.add('hidden');
            } else {
                first_item.classList.remove('hidden');
            }
        })

        form_contact_reason.querySelector('input').addEventListener('change', function(){
            const contact_us_description = document.querySelectorAll('.contact_us_description')
            const contact_us_description_alts = document.querySelectorAll('.contact_us_description_alt')
            const contact_us_custom_caixa_customer = document.querySelectorAll('.custom_caixa_customer-group')
            if (this.value === 'Solicitar información del inmueble y financiación') {
                contact_us_description.forEach(_elem => {
                    _elem.classList.add('hidden')
                })
                contact_us_description_alts.forEach(_elem => {
                    _elem.classList.remove('hidden')
                })
                contact_us_custom_caixa_customer.forEach(_elem => {
                    _elem.classList.remove('hidden')
                })
            } else {
                contact_us_description.forEach(_elem => {
                    _elem.classList.remove('hidden')
                })
                contact_us_description_alts.forEach(_elem => {
                    _elem.classList.add('hidden')
                })
                contact_us_custom_caixa_customer.forEach(_elem => {
                    _elem.classList.add('hidden')
                    const _input_field = _elem.querySelector('input');
                    _input_field.checked = false;
                    _input_field.dispatchEvent(new Event('change'))

                })
            }
        })
    }

    /**
     * Reset form.
     */
    function reset_form() {
        const error_fields = document.querySelectorAll('.form-group.has-error')
        error_fields.forEach((element, index) => {
            element.classList.remove('has-error')
            element.querySelector('.form-group__helper').innerHTML = '';
        });

        const reset_field_values = [
            'first_name',
            'phone_2',
            'email',
            'message',
            'counter_offer_price',
            'custom_contact_topic',
        ]

        for (const field_name of reset_field_values) {
            const field_elem = form.querySelector('#' + field_name);
            field_elem.value = '';
            field_elem.dispatchEvent(new Event('change'))
        }

        form.querySelector('.form-title').innerHTML = form.getAttribute('data-title')
        form.querySelector('#counter_offer_price').closest('.form-group').classList.add('hidden')
        form.querySelector('#counter_offer_price').classList.remove('required-field')
        form_section.classList.remove('enquiry-form-section--opened')
        custom_contact_topic_section.classList.remove('hidden')
        custom_contact_topic_input.classList.add('required-field')
        form_section.classList.remove('enquiry-form-section--popup')
        document.querySelector('.dummy-form')?.remove()
        form.querySelector('.form-message').classList.add('hidden')
    }

    /**
     * Lead actions.
     */
    function lead_actions(){
        const form_add_comment_elem = form.querySelector('.form-add-comment')
        if (form_add_comment_elem !== null) {
            form_add_comment_elem.addEventListener('click', function(){
                const form_message_elem = form.querySelector('.form-message')
                if (form_message_elem !== null) {
                    form_message_elem.classList.toggle('hidden')
                }
            })
        }

        // Map form button
        const map_form_btn = document.querySelector('.map-form-btn')
        map_form_btn.addEventListener('click', function(){
            reset_form();
            dummyForm.querySelector('.qcf-select-ajax[data-name="phone_prefix"]').replaceWith(form.querySelector('.qcf-select-ajax[data-name="phone_prefix"]').cloneNode(true))
            form_section.before(dummyForm)
            form_section.classList.add('enquiry-form-section--popup')
            setTimeout(() => {
                form_section.classList.add('enquiry-form-section--opened')
            }, 0);

            setTimeout(() => {
                document.addEventListener('click', monitorPopup)
            }, 0);
        })

        const close_popup_form = document.querySelector('.close-form')
        close_popup_form.addEventListener('click', function(){
            reset_form();
            document.removeEventListener('click', monitorPopup);
        })

        const form_submit_btn = document.querySelector('#submit-btn:not(.form-btn-ready)');
        if (form_submit_btn !== null) {
            form_submit_btn.classList.add('form-btn-ready')
            form_submit_btn.addEventListener('click', function(){
                submit_lead_form({obj: form_submit_btn, form_id: form.id, form_options: contact_form_options})
            })
        }

        open_contact_btn_event();
    }

    /**
     * Open the contact form popup.
     */
    function open_contact_btn_event(){
        const contact_form_open_btns = document.querySelectorAll('.open-contact-form-btn:not(.open-contact-form-btn--ready)')
        contact_form_open_btns.forEach(_btn => {
            _btn.classList.add('open-contact-form-btn--ready')
            _btn.addEventListener('click', function(){
                reset_form();
                dummyForm.querySelector('.qcf-select-ajax[data-name="phone_prefix"]').replaceWith(form.querySelector('.qcf-select-ajax[data-name="phone_prefix"]').cloneNode(true))
                form_section.before(dummyForm)
                form_section.classList.add('enquiry-form-section--popup')
                setTimeout(() => {
                    form_section.classList.add('enquiry-form-section--opened')
                }, 0);

                setTimeout(() => {
                    document.addEventListener('click', monitorPopup)
                }, 0);
            })
        })
    }

    property_wishlist_btn.addEventListener('wishlist:init-added', function fn(){
        price_drop_btn.classList.remove('price-drop--active')
        price_drop_wishlist_btn.classList.add('price-drop-in-wishlist--active')
        property_wishlist_btn.removeEventListener('wishlist:init-added', fn)
    })

    property_wishlist_btn.addEventListener('wishlist:added', function (){
        price_drop_btn.classList.remove('price-drop--active')
        price_drop_wishlist_btn.classList.add('price-drop-in-wishlist--active')
    })

    property_wishlist_btn.addEventListener('wishlist:removed', function (){
        price_drop_btn.classList.add('price-drop--active')
        price_drop_wishlist_btn.classList.remove('price-drop-in-wishlist--active')
    })

     // Price drop action.
     price_drop_btn.addEventListener('click', function(){
        if (is_guest) {
            const icon_svg = `<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="40" rx="20" fill="#CACFFF"/>
                <path d="M20.5 10L20.5 28.4615" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M28.1922 22.3077L20.4999 30L12.8076 22.3077" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>`

            modalLoginTemplate('wishlist-no-login', login_url + '&medio=avisoprecio', icon_svg, modal_options.price_drop_login_title_1, modal_options.price_drop_login_sub_title_1, modal_options.price_drop_login_descr_1, modal_options.price_drop_login_title_2, modal_options.price_drop_login_btn_2, modal_options.price_drop_login_descr_2, 'price-drop-access-registrt-btn')
        } else {
            property_wishlist_btn.classList.add('wishlist-btn--active')
            price_drop_btn.classList.remove('price-drop--active')
            price_drop_wishlist_btn.classList.add('price-drop-in-wishlist--active')
            Wishlist.updateList(property_id, sale_rent, 'add')
            addToWishlist(property_id, false)
        }
    })

    const setupMortgageLinkAnalytics = (mortgageBtn, eventCategory) => {
        if (mortgageBtn === null) {
            return;
        }

        const trackMortgageAnalytics = () => {
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                event_data.event_category = eventCategory;
                event_data.event_action = 'click en en botón';
                event_data.event_label = 'simulador de hipoteca';
                delete event_data.page_subcategory1;
                event_data.events = 'click_cta';

                tealium_object.trackEvent(event_data, 'link');
            }
        };

        mortgageBtn.addEventListener('c-modal-redirection:click', trackMortgageAnalytics);

        mortgageBtn.addEventListener('click', function(e) {
            if (mortgageBtn.classList.contains('c-modal-redirection')) {
                return;
            }

            e.preventDefault();
            e.stopPropagation();

            trackMortgageAnalytics();

            setTimeout(() => {
                window.location.href = mortgageBtn.href;
            }, 10);
        });
    };

    setupMortgageLinkAnalytics(mortgage_link_btn, 'simulador ficha producto');
    setupMortgageLinkAnalytics(mortgage_link_sidebar_btn, 'simulador ficha producto formulario');

    document.addEventListener('qobrix-wishlist:add-action', function(){
        if (typeof TealiumTracker !== 'undefined') {
            const tealium_object = new TealiumTracker();
            event_data.page_category = 'bajada de precio';
            event_data.page_subcategory1 = 'inmueble rebajado guardado';
            event_data.events = 'pageview, prodView';
            tealium_object.trackEvent(event_data, 'view');
        }
        const modal = new CaixaModal({className: 'price-drop'});
        modal.open(`<div class="bg-[#F2F3FF] mt-[54px] rounded-[24px] flex gap-[16px] px-[24px] py-[16px] mb-[6px]">
            <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5165 19.3417C12.2332 19.4417 11.7665 19.4417 11.4832 19.3417C9.0665 18.5167 3.6665 15.075 3.6665 9.24171C3.6665 6.66671 5.7415 4.58337 8.29984 4.58337C9.8165 4.58337 11.1582 5.31671 11.9998 6.45004C12.8415 5.31671 14.1915 4.58337 15.6998 4.58337C18.2582 4.58337 20.3332 6.66671 20.3332 9.24171C20.3332 15.075 14.9332 18.5167 12.5165 19.3417Z" fill="#003C46" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="flex flex-col gap-2">
                <h5 class="m-0 p-0 text-[18px] leading-[21.6px] text-theme-primary-color font-medium">${modal_options.price_drop_message}</h5>
            </div>
        </div>
        <div>
            <h4 class="m-0 p-0 text-[24px] leading-[28.8px] font-medium text-[#333333] text-center">${modal_options.price_drop_title}</h4>
            <div class="font-[Roboto] text-[16px] leading-[20.8px] text-[#333333] text-center pt-[12px]">${modal_options.price_drop_descr}</div>
        </div>`)
    })

    /**
     * Show the agent phone when clicked.
     *
     * @param {object} _btn The phone button.
     */
    function show_agent_phone(_btn) {
        const phone_number = _btn.getAttribute('data-tel');

        if (typeof TealiumTracker !== 'undefined') {
            const tealium_object = new TealiumTracker();
            event_data.events = 'click_cta';
            event_data.event_category = 'ver telefono ficha producto';
            event_data.event_action = 'click en boton';
            event_data.event_label = 'ver teléfono';
            delete event_data.page_subcategory1;
            tealium_object.trackEvent(event_data, 'link');
        }
        window.location.href = 'tel:' + phone_number;
    }

    /**
     * Handle price drop access registry click.
     *
     * @param {Event} e The event.
     */
    function PriceDropAccessRegistryClick(e) {
        if (typeof TealiumTracker !== 'undefined') {
            e.preventDefault();
            const tealium_object = new TealiumTracker();
            event_data.events = 'click_access';
            event_data.event_category = 'acceder guardar busqueda';
            event_data.event_action = 'click en texto';
            event_data.event_label = e.currentTarget.textContent.trim();
            delete event_data.page_subcategory1;
            tealium_object.trackEvent(event_data, 'link');
            setTimeout(() => {
                window.location.href = e.currentTarget.href;
            }, 500);
        }
    }

    document.addEventListener('DOMContentLoaded',function(){
        QoetixCustomFields.eventActions();
        let glide_element = document.querySelector('.glide-properties')
        if ( glide_element !== null && !glide_element.classList.contains('glide--loaded')) {
            new Glide('.glide-properties', {
                type: document.querySelectorAll('.glide-properties .glide__slide').length <= 4 ? 'slider' : 'carousel',
                startAt: 0,
                perView: 4,
                gap: 10,
                breakpoints: {
                    425: {
                        perView: 1
                    },
                    768: {
                        perView: 2
                    },
                    1024: {
                        perView: 3
                    },
                    1440: {
                        perView: 4
                    }
                }
            }).mount()
            glide_element.classList.add('glide--loaded')
        }

        lead_actions();

        const back_link_elm = document.querySelector('.back-link');
        if (back_link_elm !== null) {
            back_link_elm.addEventListener('click', function(event){
                event.preventDefault();
                if (document.referrer && document.referrer.includes(window.location.hostname)) {
                    window.location.href = document.referrer;
                } else {
                    window.location.href = back_link_elm.getAttribute('data-back-link');
                }
            });
        }

        document.querySelectorAll('.properties-section .property-item').forEach(_elem => {
            _elem.addEventListener('click',function (e) {
                let has_website_url = this.getAttribute('data-has-website-url');

                if (has_website_url === 'true') {
                    let website_url = this.getAttribute('href');
                    window.open(website_url, '_blank');
                    e.preventDefault();
                }
            });
        })

        const gallery_section = document.querySelector('#single-gallery-1:not(.qoetix-gallery-section--single-auto)');
        if (gallery_section !== null) {
            CaixaGallery.render_slider_gallery_html(gallery_section, single_page_photo_urls)
        }

        document.addEventListener('gallery:loaded', function(){
            open_contact_btn_event();
        })

        const agent_mobile_phones = document.querySelectorAll('.agent-phone-btn')
        agent_mobile_phones.forEach(_btn => {
            _btn.addEventListener('click', function(e){
                e.preventDefault();
                show_agent_phone(_btn)
            })
        })

        document.querySelector('#map-single').addEventListener('map:popup-open', function(){
            wishlistPrepareEventsByLogin()
        })

        const form_elem = document.querySelector('form')
        form_elem.addEventListener('submit', (event) => {
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                event_data.page_subcategory1 = 'contactar con el anunciante';
                event_data.events = 'lead_F2';
                event_data.event_category = 'formulario contacta';
                event_data.event_action = 'click en boton';
                event_data.event_label = 'contactar';

                tealium_object.trackEvent(event_data, 'link');

                ['event_category', 'event_action', 'event_label'].forEach(key => delete event_data[key]);
                if ( event.detail.form_response.status ) {
                    event_data.page_subcategory1 = 'formulario enviado';
                    event_data.events = 'pageview,prodView';
                } else {
                    event_data.page_subcategory1 = 'formulario no enviado';
                    event_data.events = 'pageview,prodView';
                }
                tealium_object.trackEvent(event_data, 'view');
            }
        });

        wishlist_btns.forEach(_btn => {
            _btn.addEventListener('click', function(){
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    event_data.events = 'click_addToFavoriteList';
                    event_data.event_category = 'favoritos ficha producto';
                    event_data.event_action = 'click en boton';
                    event_data.event_label = 'favoritos';
                    delete event_data.page_subcategory1;
                    tealium_object.trackEvent(event_data, 'link');
                }
            })
        });

        const share_all_btn = document.querySelectorAll('.share-all')
        share_all_btn.forEach(_btn => {
            _btn.addEventListener('click', function(){
                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    event_data.events = 'click_share';
                    event_data.event_category = 'compartir anuncio';
                    event_data.event_action = 'click en boton';
                    event_data.event_label = 'compartir';
                    delete event_data.page_subcategory1;
                    tealium_object.trackEvent(event_data, 'link');
                }
            })
        });

        const observer = new MutationObserver(() => {
            const share_options_btns = document.querySelectorAll('a.a2a_i');
            if (share_options_btns.length > 0) {
                share_options_btns.forEach(_btn => {
                    if (!_btn.dataset.listenerAdded) {
                        _btn.dataset.listenerAdded = "true";
                        _btn.addEventListener('click', function(e){
                            e.preventDefault();
                            if (typeof TealiumTracker !== 'undefined') {
                                const tealium_object = new TealiumTracker();
                                event_data.events = 'click_share';
                                event_data.event_category = 'compartir ficha producto';
                                event_data.event_action = 'click en ' + _btn.textContent.trim();
                                event_data.event_label = 'compartir';
                                delete event_data.page_subcategory1;
                                tealium_object.trackEvent(event_data, 'link');
                            }
                        })
                    }
                });
            }
            document.querySelectorAll('.price-drop-access-registrt-btn').forEach(btn => {
                if (!btn.dataset.listenerAdded) {
                    btn.dataset.listenerAdded = "true";
                    btn.addEventListener('click', PriceDropAccessRegistryClick);
                }
            });
        });
        observer.observe(document.body, { childList: true, subtree: true });

        price_drop_btn.addEventListener('click', function(){
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                event_data.events = 'click_let_me_know';
                event_data.event_category = 'aviso bajada de precio';
                event_data.event_action = 'click en texto';
                event_data.event_label = price_drop_btn.textContent.trim().toLowerCase();
                delete event_data.page_subcategory1;
                tealium_object.trackEvent(event_data, 'link');
            }
        });

        const map_form_btn = document.querySelector('.map-form-btn')
        map_form_btn.addEventListener('click', function(){
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                event_data.events = 'click_address';
                event_data.event_category = 'direccion exacta';
                event_data.event_action = 'click en texto';
                event_data.event_label = map_form_btn.textContent.trim().toLowerCase();
                delete event_data.page_subcategory1;
                tealium_object.trackEvent(event_data, 'link');
            }
        });

        const show_gallery_btn = document.querySelector('.show-gallery')
        show_gallery_btn.addEventListener('click', function(){
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                event_data.events = 'click_viewAll';
                event_data.event_category = 'ver todas';
                event_data.event_action = 'click en boton';
                event_data.event_label = show_gallery_btn.textContent.trim().toLowerCase();
                delete event_data.page_subcategory1;
                tealium_object.trackEvent(event_data, 'link');
            }
        })

        const m_mortgage_icon = document.querySelector('.m-mortgage-icon');
        const m_mortgage_box = document.querySelector('.m-mortgage-box');
        if (m_mortgage_icon) {
            /**
             * Close the mortgage box.
             */
            function closeMortgageBox() {
                m_mortgage_icon.classList.remove('m-mortgage-icon--active');
                m_mortgage_box.classList.remove('m-mortgage-box--active');
                // Remove event listeners when closing
                document.removeEventListener('scroll', closeMortgageBox);
                document.removeEventListener('click', handleOutsideClick);
            }

            /**
             * Handle clicks outside the mortgage box.
             *
             * @param {object} event The event.
             */
            function handleOutsideClick(event) {
                // Check if click is outside both the icon and the box
                if (!m_mortgage_icon.contains(event.target) && !m_mortgage_box.contains(event.target)) {
                    closeMortgageBox();
                }
            }

            m_mortgage_icon.addEventListener('click', function() {
                if (m_mortgage_icon.classList.contains('m-mortgage-icon--active')) {
                    closeMortgageBox();
                } else {
                    m_mortgage_icon.classList.add('m-mortgage-icon--active');
                    m_mortgage_box.classList.add('m-mortgage-box--active');
                    // Add event listeners when opening
                    document.addEventListener('scroll', closeMortgageBox);
                    document.addEventListener('click', handleOutsideClick);
                }
            })
        }

        // Change Submit Button label on Mobile Screen
        const submitBtn = document.querySelector("#submit-btn");
        const defaultText = submitBtn.dataset.defaultLabel;
        const defaultTextMobile = submitBtn.dataset.defaultLabelMobile;
        function updateText() {
            if (window.innerWidth < 1024) {
                submitBtn.innerHTML = defaultTextMobile;
            } else {
                submitBtn.innerHTML = defaultText;
            }
        }
        updateText();
        window.addEventListener("resize", updateText);

    })
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
