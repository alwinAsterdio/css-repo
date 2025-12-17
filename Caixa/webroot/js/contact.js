(function() {
    document.addEventListener('DOMContentLoaded',function() {
        QoetixCustomFields.eventActions();

        const form_elem = document.querySelector('form');

        const trackContactFormEvents = (event_data = {}) => {
            if (typeof TealiumTracker !== 'undefined') {
                event_data.events = 'pageview';

                const tealium_object = new TealiumTracker();
                tealium_object.trackEvent(event_data, 'view');
            }
        }

        form_elem.addEventListener('submit', (event) => {
            const { form_response } = event.detail;

            const pageSubcategory = form_response.status !== false
                ? 'contactar enviado'
                : 'contactar no enviado';

            trackContactFormEvents({ page_subcategory1: pageSubcategory });
        });
    })
})();