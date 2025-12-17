const ContactUsObject = () => {
    let obj = {};

    /**
     * Monitor for the popup.
     *
     * @param {object} event The event.
     */
    obj.monitorPopup = function (event) {
        let close_popup = typeof event === "undefined";
        let shouldClose = false;

        if (close_popup) {
            shouldClose = true;
        } else if (event?.target) {
            const isClickOnCloseButton = event.target.closest('.close-form');

            shouldClose = isClickOnCloseButton;
        }

        if (shouldClose) {
            document.querySelector('.contact-form-popup').classList.remove('contact-form-popup--visible');
            document.removeEventListener('click', obj.monitorPopup);
        }
    }

    /**
     * Reset form.
     */
    obj.resetForm = function(form){
        const agentNumberContainers = document.querySelectorAll('.show-agent-number');
        agentNumberContainers.forEach(container => {
            container.classList.remove('visible');
        });
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

        form.querySelectorAll('.form-fields').forEach(elem => {
            elem.style.removeProperty('display')
        })

        const generic_helper = form.querySelector('.generic-helper');
        generic_helper.innerHTML = ''
        generic_helper.classList.remove('enquiry-completed')
        generic_helper.classList.remove('enquiry-failed')
        form.querySelector('.close-btn')?.parentNode.remove();
        form.querySelector('.form-title').innerHTML = form.getAttribute('data-title')
        form.querySelector('#counter_offer_price').closest('.form-group').classList.add('hidden')
        form.querySelector('#counter_offer_price').classList.remove('required-field')
        document.querySelector('.dummy-form')?.remove()
        form.querySelector('.form-message').classList.add('hidden')

        form.dispatchEvent(new Event('form:reset'))
    }

    /**
     * Track phone button.
     */

    obj.eventAgentTel = function () {
        const agent_mobile_phones = document.querySelectorAll(
            ".agent-phone-btn:not(.agent-phone-btn--active)"
        );
        agent_mobile_phones.forEach((_btn) => {
            _btn.classList.add("agent-phone-btn--active");
            _btn.addEventListener("click", function (e) {
                e.preventDefault();
                const phone_number = _btn.getAttribute("data-tel");
                window.location.href = "tel:" + phone_number;
            });
        });
    };

    /**
     * Reset the agent tel element.
     *
     * @param {object} btn The btn element.
     */
    obj.resetAgentTel = function(btn){
        if (btn?.classList.contains('agent-phone-btn--visible')) {
            btn.querySelector('.agent-phone-btn__label').innerHTML = btn.getAttribute('data-label')
            btn.classList.remove('agent-phone-btn--visible')
            return;
        }
    }

    /**
     * Prepare to show the contact us form.
     */
    obj.prepareForm = function (item_obj){
        const parent = item_obj.closest('.property-item')
        const agent_id = parent.getAttribute('data-agent-id')
        const property_type = parent.getAttribute('data-property-type')
        const property_ref = parent.getAttribute('data-ref')
        const original_ref = parent.getAttribute('data-original-ref')
        const property_id = parent.getAttribute('id')
        const agent_name = parent.getAttribute('data-agent')
        const agent_logo = parent.getAttribute('data-agent-logo')
        const agent_phone = parent.getAttribute('data-agent-phone')
        const sale_rent = parent.getAttribute('data-sale-rent-raw')

        const popup = document.querySelector('.contact-form-popup')
        const form = document.querySelector('.contact-form-popup form')
        const form_id = 'enquiry-form-' + parent.id

        popup.classList.add('contact-form-popup--visible')
        popup.dispatchEvent(new CustomEvent('contact-form:visible'))
        // If its the same form just show the form and dont change data.
        if (form.id === form_id) {
            setTimeout(() => {
                document.addEventListener('click', obj.monitorPopup)
            }, 0);
            return;
        }

        obj.resetForm(form);

        const agent_img_elm = form.querySelector('.form-agent-info__inner__logo')
        const agent_name_elm = form.querySelector('.form-agent-info__inner__name')
        const agent_phone_btn_elm = form.querySelector('.agent-phone-btn');
        const agent_phone_btn_label = form.querySelector('.agent-phone-btn__label');
        const agent_number_container = form.querySelector('.show-agent-number-container');
        const contact_form_sub_title_container = form.querySelector('.contact-form-sub-title');
            
        obj.resetAgentTel(agent_phone_btn_elm)
        form.id = form_id
        if (agent_logo || agent_name) {
            form.querySelector('.form-agent-info')?.classList.remove('hidden')
            form.querySelector('.form-agent-info__inner')?.classList.remove('hidden')
            agent_img_elm.innerHTML = `<img src="${agent_logo}" class="form-agent-info__inner__logo__img"/>`
            agent_name_elm.innerHTML = `${agent_name}`
        } else {
            form.querySelector('.form-agent-info')?.classList.add('hidden')
            form.querySelector('.form-agent-info__inner')?.classList.add('hidden')
            agent_img_elm.innerHTML = ''
            agent_name_elm.innerHTML = ''
        }
        if (!agent_logo) {
            form.querySelector('.form-agent-info__inner')?.classList.add('justify-center','text-center')
            form.querySelector('.form-agent-info__inner__logo')?.classList.add('hidden')
        } else {
            form.querySelector('.form-agent-info__inner')?.classList.remove('justify-center','text-center')
            form.querySelector('.form-agent-info__inner__logo')?.classList.remove('hidden');
        }

        if (agent_phone) {
            agent_number_container.classList.remove('hidden')
            contact_form_sub_title_container.classList.remove('hidden')
            agent_phone_btn_elm?.setAttribute('data-tel', agent_phone)
            agent_phone_btn_elm?.setAttribute('property-id', property_id)
            agent_phone_btn_label.innerHTML = agent_phone
        } else {
            agent_number_container.classList.add('hidden')
            contact_form_sub_title_container.classList.add('hidden')
            agent_phone_btn_elm?.setAttribute('data-tel', '')
            agent_phone_btn_elm?.setAttribute('property-id', '')
            agent_phone_btn_label.innerHTML = ''
        }

        obj.eventAgentTel()

        const hidden_fields_html = `
            <input type="hidden" name="options[website_url]" value="${window.location.href}">
            <input type="hidden" name="options[extra][form_name]" value="Property - Book a viewing">
            <input type="hidden" name="options[custom_property_ref]" value="${property_ref}">
            <input type="hidden" name="options[custom_property_original_ref]" value="${original_ref}">
            <input type="hidden" name="options[source]" value="agent">
            <input type="hidden" name="options[agent]" value="${agent_id}">
            <input type="hidden" name="options[extra][property_id]" value="${property_id}">
            <input type="hidden" name="options[buy_rent]" value="${sale_rent}">
            <input type="hidden" name="options[enquiry_type]" value="${property_type}">`
        form.querySelector('.hidden-fields').innerHTML = hidden_fields_html

        setTimeout(() => {
            document.addEventListener('click', obj.monitorPopup)
        }, 0);
    }
    /**
     * Prepare the contact us button actions.
     */
    obj.prepare = function(){
        const contact_us_btn = document.querySelectorAll('.contact-us-btn:not(.contact-us-btn--ready)')
        contact_us_btn.forEach(btn => {
            btn.classList.add('contact-us-btn--ready')
            btn.addEventListener('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                obj.prepareForm(btn)
            })
        });

        const form = document.querySelector('.contact-form-popup form');

        const close_popup_form = document.querySelector('.close-form');
        close_popup_form.addEventListener('click', function() {
            obj.resetForm(form);
            setTimeout(() => {
                document.removeEventListener('click', obj.monitorPopup);
            }, 0);
        })

        let event_data = {};

        const trackContactFormEvents = (event_data = {}, event_type = 'view') => {
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                tealium_object.trackEvent(event_data, event_type);
            }
        }

        const submit_btn = form.querySelector('#submit-btn:not(.submit-event-ready)')
        if (submit_btn !== null) {
            submit_btn.classList.add('submit-event-ready')
            submit_btn.addEventListener('click', function(e) {
                e.preventDefault();

                if (typeof TealiumTracker !== 'undefined') {
                    let property_id = form.getAttribute('id');
                    property_id = property_id.split('enquiry-form-')[1];

                    const property = document.querySelector('a.property-item[id="' + property_id + '"]');

                    const sale_rent = property.dataset.saleRentRaw;
                    const sale_rent_mapping = {
                        'for_sale': 'compra',
                        'for_rent': 'alquiler'
                    };

                    const form_selected_option = form.querySelector('.contact-topic-list .qcf-radio-list__item--selected')?.dataset.value;

                    event_data = {
                        "page_subcategory1": "contactar con el anunciante",
                        "page_subcategory2": sale_rent_mapping[sale_rent] || '',
                        "events": "lead_F2",
                        "event_category": "formulario contacta",
                        "event_action": "click en boton",
                        "event_label": "contactar",
                        "prod_category": property.dataset.category || '',
                        "prod_id": property.dataset.ref || '',
                        "prod_id_agregator": '',
                        "prod_rooms": property.dataset.rooms || '',
                        "prod_bathrooms": property.dataset.bathrooms || '',
                        "prod_type": property.dataset.subcategory || '',
                        "prod_surface": property.dataset.surface || '',
                        "prod_status": property.dataset.status || '',
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
                        "form_selected_option": form_selected_option,
                    }

                    trackContactFormEvents(event_data, 'link');
                }

                form.addEventListener('form:hidden', function(e){
                    if (form.querySelector('.close-btn') === null) {
                        form.insertAdjacentHTML("beforeend", `<div class="px-5 pb-5"><button class="min-w-[150px] btn btn-primary w-full btn-pill font-semibold close-btn" type="submit">Volver al anuncio</button></div>`)

                        document.querySelector('.close-btn').addEventListener('click', function(e){
                            e.preventDefault();
                            document.querySelector('.close-form').click()
                        })
                    }
                })
                submit_lead_form({obj: submit_btn, form_id: form.id, form_options: contact_form_options})
            })
        }

        form.addEventListener('submit', (event) => {
            const { form_response } = event.detail;
            const isValidResponse = form_response.status !== false;

            if (Object.keys(event_data).length > 0 && typeof TealiumTracker !== 'undefined') {
                event_data.page_subcategory1 = isValidResponse ? 'formulario enviado' : 'formulario no enviado';
                event_data.event_label = 'contactar';
                event_data.events = 'pageview, prodView';

                ['form_selected_option', 'event_category', 'event_action'].forEach(key => {
                    delete event_data[key];
                });

                trackContactFormEvents(event_data);
            }
        });

        const form_add_comment_elem = form.querySelector('.form-add-comment:not(.form-add-comment-event-ready)')
        if (form_add_comment_elem !== null) {
            form_add_comment_elem.classList.add('form-add-comment-event-ready')
            form_add_comment_elem.addEventListener('click', function(){
                const form_message_elem = form.querySelector('.form-message')
                if (form_message_elem !== null) {
                    form_message_elem.classList.toggle('hidden')
                }
            })
        }

        const form_contact_reason = form.querySelector('.contact-reason .qcf-select:not(.contact-reason--ready)')
        if (form_contact_reason !== null) {
            form_contact_reason.classList.add('contact-reason--ready')
            form_contact_reason.addEventListener('qcf:open', function(){
                const elem_sale_rent = form.querySelector('input[name="options[buy_rent]"]').value
                const first_item = form_contact_reason.querySelector('.qcf-field-group__content__list__item[data-value="Solicitar información del inmueble y financiación"]')
                if (elem_sale_rent !== 'for_sale') {
                    first_item.style.display = 'none'
                } else {
                    first_item.style.display = 'flex'
                }
            })

            form_contact_reason.querySelector('input').addEventListener('change', function(){
                const contact_us_description = document.querySelector('.contact_us_description')
                const contact_us_description_alt = document.querySelector('.contact_us_description_alt')
                const contact_us_custom_caixa_customer = document.querySelector('.custom_caixa_customer-group')
                if (this.value === 'Solicitar información del inmueble y financiación') {
                    contact_us_description.classList.add('hidden')
                    contact_us_description_alt.classList.remove('hidden')
                    contact_us_custom_caixa_customer.classList.remove('hidden')
                } else {
                    contact_us_description.classList.remove('hidden')
                    contact_us_description_alt.classList.add('hidden')
                    contact_us_custom_caixa_customer.classList.add('hidden')
                    const _input_field = contact_us_custom_caixa_customer.querySelector('input');
                    _input_field.checked = false;
                    _input_field.dispatchEvent(new Event('change'))
                }
            })
        }

        obj.eventAgentTel();

        QoetixCustomFields.eventActions();
    }

    return obj;
}

const ContactUs = ContactUsObject();

document.addEventListener('DOMContentLoaded', function(){
    ContactUs.prepare()
})