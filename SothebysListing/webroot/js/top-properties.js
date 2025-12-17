document.addEventListener('DOMContentLoaded', function(event) {
    QoetixCustomFields.eventActions();

    fetch('/api/property-public/coordinates/?' + query_params, {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        },
    }).then(function (response) {
        return response.json();
    }).then(function (response) {
        QoetixMap.loadMarkers(response)
    })

    const view_map_btn = document.querySelector('.view-map-btn')
    const map_section = document.querySelector('.properties-map-section');
    const menu_nav = document.querySelector('.menu-section');
    view_map_btn?.addEventListener('click', function(){
        let position = menu_nav.offsetHeight;
        window.scroll(0,0);
        map_section.style.top = position + 'px';
        document.querySelector('#map-listing').style.height = 'calc(100% - ' + position + 'px)'
        map_section.classList.remove('hidden')
        QoetixMap.resetMapPosition()
        document.querySelector('body').classList.add('h-screen', 'overflow-hidden')
    })

    const close_map_btn = document.querySelector('.close-map-btn')
    close_map_btn.addEventListener('click', function(){
        map_section.classList.add('hidden')
        document.querySelector('body').classList.remove('h-screen', 'overflow-hidden')
    })
});

/**
 * Prepare sothebys popup.
 *
 * @param {object} options The options.
 * @returns {string}
 */
function sothebysMapPopup(options){
    let popup_html = '<div class="sothebys-map">';
    if (options?.url) {
        popup_html += '<a href="' + options.url + '" class="no-underline text-black">';
    }

    popup_html += `<div class="sothebys-map__image">
        <img src="${options.image}" class="sothebys-map__image__item"/>
        <span class="sothebys-map__image__sale_rent">${options.sale_rent_display}</span>
    </div>`

    popup_html += '<div class="sothebys-map__details">';
    popup_html += `<div class="sothebys-map__details__title">${options.title}</div>`
    popup_html += `<div class="sothebys-map__details__location">
        <svg width="12" height="14" viewBox="0 0 5 7" class="fill-theme-secondary-color" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.24307 6.85877C0.351172 3.97894 0 3.68338 0 2.625C0 1.17525 1.11928 0 2.5 0C3.88072 0 5 1.17525 5 2.625C5 3.68338 4.64883 3.97894 2.75693 6.85877C2.63277 7.04709 2.36721 7.04707 2.24307 6.85877ZM2.5 3.71875C3.0753 3.71875 3.54167 3.22906 3.54167 2.625C3.54167 2.02094 3.0753 1.53125 2.5 1.53125C1.9247 1.53125 1.45833 2.02094 1.45833 2.625C1.45833 3.22906 1.9247 3.71875 2.5 3.71875Z"/>
        </svg>
        <span>${options.address}</span>
    </div>`
    popup_html += `<div class="sothebys-map__details__action">
        <button>View Property</button>
    </div>`
    popup_html += '</div>';

    if (options?.url) {
        popup_html += '</a>'
    }

    popup_html += '</div>'
    return popup_html;
}