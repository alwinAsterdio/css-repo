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

