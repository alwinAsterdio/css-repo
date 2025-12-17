document.addEventListener('DOMContentLoaded', function(event) {
    QoetixCustomFields.eventActions();

    let glide_element = document.querySelector('.glide-testimonials')
    if ( glide_element !== null && !glide_element.classList.contains('glide--loaded')) {
        new Glide('.glide-testimonials', {
            type: 'slider',
            startAt: 0,
            perView: 1,
            gap: 10,
            breakpoints: {
                425: {
                    perView: 1
                }
            }
        }).mount()
        glide_element.classList.add('glide--loaded')
    }
});

