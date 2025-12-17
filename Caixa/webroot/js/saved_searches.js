/**
 * When the google static map img fails it will load the default image.
 * @param {object} img The img element.
 */
function googleMapStaticImgError(img){
    img.src = img.getAttribute('data-alt-src')
    console.error('Google Static map load failed.');
}

(function() {
    document.addEventListener('DOMContentLoaded',function(){
        QoetixCustomFields.eventActions();

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

        const sale_rent_dropdown = document.querySelector('#sale_rent');
        sale_rent_dropdown.addEventListener('change', function() {
            if (typeof TealiumTracker !== 'undefined') {
                const mapping = {
                    'for_sale_and_rent': 'compra y alquiler',
                    'for_rent': 'alquiler',
                    'for_sale': 'compra'
                };

                const savedSearchesPage = document.querySelector('[data-num-saved]');
                const numSaved = savedSearchesPage ? parseInt(savedSearchesPage.dataset.numSaved || 0, 10) : 0;

                const tealium_object = new TealiumTracker();
                const event_data = {
                    'page_subcategory1': 'busquedas guardadas',
                    'event_category': 'filtro simple',
                    'event_action': 'click en filtro ' + (mapping[this.value] || this.value),
                    'event_label': 'aplicar filtro ' + (mapping[this.value] || this.value),
                    'num_saved': numSaved,
                    'events': 'click_singleFilter',
                };
                tealium_object.trackEvent(event_data, 'link');
            }

            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('sale_rent', this.value);
            window.location.href = currentUrl.toString();
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

                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const savedSearchesPage = document.querySelector('[data-num-saved]');
                    const numSaved = savedSearchesPage ? parseInt(savedSearchesPage.dataset.numSaved || 0, 10) : 0;
                    const event_data = {
                        'page_subcategory1': 'busquedas guardadas',
                        'event_category': 'eliminar busqueda',
                        'event_action': 'click on text',
                        'event_label': 'eliminar',
                        'num_saved': numSaved,
                        'events': 'click_cta',
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }

                const deleteSavedSearchModal = new CaixaModal({className: 'saved-searches-delete'});
                deleteSavedSearchModal.open(`<div class="flex flex-col gap-3">
                        <h4 class="m-0 p-0 pt-[54px] text-[24px] leading-[28.8px] text-theme-primary-color font-medium text-[#333333] text-center">Eliminar búsqueda</h4>
                        <div class="font-[Roboto] text-[16px] leading-[20.8px] text-center">¿Estás seguro que deseas eliminar tu búsqueda? Dejarás de recibir notificaciones de nuevos inmuebles.</div>
                    </div>
                <div class="flex flex-col lg:flex-row gap-2">
                    <button class="saved-search-btn-cancel btn btn-pill btn-secondary font-semibold block text-center order-2 lg:order-1">Cancelar</button>
                    <button class="saved-search-btn-confirm btn btn-pill btn-primary flex-1 font-semibold block text-center order-1 lg:order-2">Sí, eliminar búsqueda</button>
                </div>
                `)

                document.querySelector('.saved-search-btn-cancel').addEventListener('click', function(){
                    deleteSavedSearchModal.close()
                })

                document.querySelector('.saved-search-btn-confirm').addEventListener('click', function(){
                    if (this.classList.contains('disabled')) {
                        return;
                    }

                    if (typeof TealiumTracker !== 'undefined') {
                        const tealium_object = new TealiumTracker();
                        const savedSearchesPage = document.querySelector('[data-num-saved]');
                        const numSaved = savedSearchesPage ? parseInt(savedSearchesPage.dataset.numSaved || 0, 10) : 0;
                        const event_data = {
                            'page_subcategory1': 'busquedas guardadas',
                            'event_category': 'eliminar busqueda',
                            'event_action': 'click on text',
                            'event_label': this.textContent.trim().toLowerCase(),
                            'num_saved': numSaved,
                            'events': 'click_removeSearch',
                        };
                        tealium_object.trackEvent(event_data, 'link');
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

                if (typeof TealiumTracker !== 'undefined') {
                    const tealium_object = new TealiumTracker();
                    const savedSearchesPage = document.querySelector('[data-num-saved]');
                    const numSaved = savedSearchesPage ? parseInt(savedSearchesPage.dataset.numSaved || 0, 10) : 0;
                    const event_data = {
                        'page_subcategory1': 'busquedas guardadas',
                        'event_category': 'editar busqueda',
                        'event_action': 'click on text',
                        'event_label': 'renombrar',
                        'num_saved': numSaved,
                    };
                    tealium_object.trackEvent(event_data, 'link');
                }

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

                    if (typeof TealiumTracker !== 'undefined') {
                        const tealium_object = new TealiumTracker();
                        const savedSearchesPage = document.querySelector('[data-num-saved]');
                        const numSaved = savedSearchesPage ? parseInt(savedSearchesPage.dataset.numSaved || 0, 10) : 0;
                        const event_data = {
                            'page_subcategory1': 'busquedas guardadas',
                            'event_category': 'renombrar busqueda',
                            'event_action': 'click on text',
                            'event_label': this.textContent.trim().toLowerCase(),
                            'num_saved': numSaved,
                            'events': 'click_renameSearch',
                        };
                        tealium_object.trackEvent(event_data, 'link');
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
    })
})();
