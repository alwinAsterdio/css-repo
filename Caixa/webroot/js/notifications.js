const favorites_elem = document.querySelector('#favorites_notification')
favorites_elem.addEventListener('change', function(){
    if (typeof TealiumTracker !== 'undefined') {
        if(favorites_elem.checked) {
            label = 'notificaciones seleccionadas';
        } else {
            label = 'notificaciones no seleccionadas';
        }
        const tealium_object = new TealiumTracker();
        tealium_object.trackEvent({
            "events": "click_cta",
            "event_category": "configuracion notificaciones",
            "event_action": "click en botón",
            "event_label": label,
            "page_subcategory1": "notificaciones",
        }, 'link');
    }
    fetch('/api/wishlist/update-notification-status/' + (favorites_elem.checked ? '1' : '0'), {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    }).then(function (response) {
        return response.json();
    }).then(function (response) {})
});

document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.contact_us_btn_tealium').forEach(function(btn){
        btn.addEventListener('click', function(e){
            e.preventDefault();
            if (typeof TealiumTracker !== 'undefined') {
                const tealium_object = new TealiumTracker();
                tealium_object.trackEvent({
                    "events": "click_cta",
                    "event_category": "contactar",
                    "event_action": "click en texto",
                    "event_label": e.currentTarget.textContent.trim().toLowerCase(),
                    "page_subcategory1": "notificaciones",
                }, 'link');
            }
            setTimeout(() => {
                window.location.href = e.currentTarget.href;
            }, 500);
        });
    });
});