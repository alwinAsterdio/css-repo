document.addEventListener("DOMContentLoaded", function (event) {
    QoetixCustomFields.eventActions();

    let location_elements = document.querySelectorAll(
        ".location-carousel__glide"
    );
    location_elements.forEach((elem) => {
        let glide = new Glide(elem, {
            type: "carousel",
            startAt: 0,
            gap: 30,
            perView: 6,
            center: true,
            focusAt: "center",
            autoplay: 30009999,
            breakpoints: {
                600: {
                    perView: 2,
                },
                768: {
                    perView: 3,
                },
            },
        }).mount();
    });

    let partner_elements = document.querySelectorAll(
        ".partner-carousel__glide"
    );
    partner_elements.forEach((elem) => {
        let glide = new Glide(elem, {
            type: "carousel",
            startAt: 0,
            gap: 30,
            perView: 8,
            center: true,
            focusAt: "center",
            autoplay: 30009999,
            breakpoints: {
                600: {
                    perView: 2,
                },
                768: {
                    perView: 3,
                },
            },
        }).mount();
    });
});
