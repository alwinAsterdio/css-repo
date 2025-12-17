document.addEventListener("DOMContentLoaded", function (event) {
    let similar_properties_elements = document.querySelectorAll(
        ".properties-section"
    );
    similar_properties_elements.forEach((elem) => {
        let glide = new Glide(elem, {
            type: "carousel",
            startAt: 0,
            gap: 20,
            perView: 4,
            autoplay: 30009999,
            breakpoints: {
                600: {
                    perView: 1,
                },
                768: {
                    perView: 3,
                },
            },
        }).mount();
    });
});

(function() {
    document.addEventListener('DOMContentLoaded',function(){
        const gallery_section = document.querySelector('#single-gallery-1');
        newGallery.render_slider_gallery_html(gallery_section, single_page_photo_urls)
    })
})();
