const newGalleryObject = () => {
    let obj = {};

    const video_btn = `<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.67531 5.87258L7.67537 5.87262L12.6921 8.66011C12.6922 8.66013 12.6922 8.66015 12.6923 8.66018C12.7528 8.69386 12.8033 8.74312 12.8384 8.80284C12.8735 8.8626 12.8921 8.93067 12.8921 9C12.8921 9.06933 12.8735 9.1374 12.8384 9.19716C12.8032 9.25692 12.7527 9.3062 12.6921 9.33989L7.67537 12.1274L7.6753 12.1274C7.58901 12.1754 7.49167 12.2 7.39295 12.1987C7.29422 12.1975 7.19753 12.1705 7.11245 12.1204C7.02737 12.0703 6.95686 11.9988 6.9079 11.9131C6.85894 11.8274 6.83324 11.7303 6.83333 11.6316V11.6311V6.36889V6.36841C6.83324 6.26968 6.85894 6.17264 6.9079 6.08689C6.95686 6.00115 7.02737 5.92969 7.11245 5.87959C7.19753 5.82949 7.29422 5.80248 7.39295 5.80125C7.49167 5.80002 7.58901 5.82461 7.67531 5.87258ZM9 17.5C10.1162 17.5 11.2215 17.2801 12.2528 16.853C13.2841 16.4258 14.2211 15.7997 15.0104 15.0104C15.7997 14.2211 16.4258 13.2841 16.853 12.2528C17.2801 11.2215 17.5 10.1162 17.5 9C17.5 7.88376 17.2801 6.77846 16.853 5.74719C16.4258 4.71592 15.7997 3.77889 15.0104 2.98959C14.2211 2.20029 13.2841 1.57419 12.2528 1.14702C11.2215 0.719859 10.1162 0.5 9 0.5C6.74566 0.5 4.58365 1.39553 2.98959 2.98959C1.39553 4.58365 0.5 6.74566 0.5 9C0.5 11.2543 1.39553 13.4163 2.98959 15.0104C4.58365 16.6045 6.74566 17.5 9 17.5Z" stroke="white"/>
        </svg>`;

    const fields_list = {
        featured_photo: {
            size: 'large',
            thumbnails: {
                size: 'small'
            }
        },
        photos: {
            size: 'large',
            thumbnails: {
                size: 'small'
            }
        },
    }

    obj.render_slider_gallery = function(gallery_elm) {
        const property_id = gallery_elm.closest('.property-item')
        if (property_id === null) {
            return;
        }

        fetch('/api/property-public/media/' + property_id.getAttribute('id'), {
            method: 'POST',
            body: JSON.stringify({fields: fields_list}),
            headers: {
                'Content-type': 'application/json; charset=UTF-8'
            },
        }).then(function (response) {
            return response.json();
        }).then(function (response) {
            let photos_urls = []
            for (const field_name in fields_list) {
                response[field_name].urls.forEach(url => {
                    photos_urls.push(url)
                })
            }
            obj.render_slider_gallery_html(gallery_elm, photos_urls)
        })
    }

    /**
     * Render the slider gallery html.
     *
     * @param {object} elem The element.
     * @param {array} photos_urls The photo urls.
     */
    obj.render_slider_gallery_html = function(elem, photos_urls) {
        let html = QoetixGallery.prepare_slider_gallery_html(photos_urls)
        elem.innerHTML = html;
        QoetixGallery.qoetix_enable_glide( '#' + elem.id)
    }

    obj.enable_gallery = function(){
        let index = 0;
        const gallery_sections = document.querySelectorAll('.qoetix-gallery-section--auto:not(.has-website-url)');
        gallery_sections.forEach(gallery_elm => {
            gallery_elm.id = 'gallery-' + index++;
            obj.render_slider_gallery(gallery_elm)
        })
    }

    obj.render_gallery_popup = function(btn_elem) {
        const parent = btn_elem.closest('.property-item')
        const property_name = parent.querySelector('.property-name')?.innerHTML ?? '';
        const property_actions_btns = parent.querySelector('.property-page-actions')?.innerHTML ?? '';
        const property_price = parent.querySelector('.property-price')?.innerHTML ?? '';
        const property_features = parent.querySelector('.property-features')?.innerHTML ?? '';
        const all_images = parent.querySelectorAll('.glide__slide:not(.glide__slide--clone) .gallery-img')

        let image_html = '';

        let img_index = 0;
        all_images.forEach(img => {
            image_html += `<div class="gallery-popup__row__inner__img" data-index="${img_index++}">${img.outerHTML}</div>`
        });

        let popup_html = `<div class="gallery-popup">
            <div class="gallery-popup__row gallery-popup__row--header">
                <div class="gallery-popup__row__col">
                    <div class="gallery-popup__row__col__row gallery-popup__row__col__row--back-btn flex-1">
                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 6H2" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 11L1 6L6 1" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="gallery-popup__row__col__row flex-1"></div>
                </div>
                <div class="gallery-popup__row__col">
                    <div class="gallery-popup__row__col__row">
                        <div class="gallery-popup__row__col__row__name">${property_name}</div>
                        <div class="gallery-popup__row__col__row__actions">${property_actions_btns}</div>
                    </div>
                    <div class="gallery-popup__row__col__row gallery-popup__row__col__row--price-features">
                        <div class="gallery-popup__row__col__row__price">${property_price}</div>
                        <div class="gallery-popup__row__col__row__features">${property_features}</div>
                    </div>
                </div>
            </div>
            <div class="gallery-popup__row gallery-popup__row--gallery">
                <div class="gallery-popup__row__inner">
                    ${image_html}
                </div>
            </div>
        </div>`;

        document.body.insertAdjacentHTML("beforeend", popup_html);
        // Initialize again the share buttons.
        if (window.a2a) {
            a2a.init('page');
        }

        const wishlist_btn = document.querySelector('.gallery-popup .wishlist-btn')

        if (wishlist_btn !== null) {
            wishlist_btn.addEventListener('click', function(){
                document.querySelector('.property-item .wishlist-btn').dispatchEvent(new Event('click'))
                this.classList.toggle('wishlist-btn--active')
            })
        }

        document.querySelectorAll('.gallery-popup__row__inner__img').forEach(img => {
            img.addEventListener('click', function(){
                const index = this.getAttribute('data-index')
                QoetixLightBox.show(parent.querySelector('.glide__slide[data-index="' + index + '"] img'), '.qoetix-gallery-section', index)
            })
        })
        document.body.classList.add('gallery-popup-is-open')

        const gallery_close_btn = document.querySelector('.gallery-popup__row__col__row--back-btn')
        gallery_close_btn.addEventListener('click', function(){
            document.querySelector('.gallery-popup')?.remove()
            document.body.classList.remove('gallery-popup-is-open')
        })

        document.dispatchEvent(new Event('gallery:loaded'))
    }

    return obj;
}

const newGallery = newGalleryObject();

(function () {
    document.addEventListener('DOMContentLoaded', function (event) {
        newGallery.enable_gallery()

        document.addEventListener('qoetix-lightbox-loaded', function(){
            document.querySelector('.lightbox-section .glide__arrow--left').innerHTML = `<svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="16" cy="16.6787" r="16" fill="#EDECE7"/>
            <path d="M23 16.6787H11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15 21.6787L10 16.6787L15 11.6787" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>`

            document.querySelector('.lightbox-section .glide__arrow--right').innerHTML = `<svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="16" cy="16" r="16" transform="matrix(-1 0 0 1 32 0.678711)" fill="#E8E7E1"/>
            <path d="M9 16.6787H21" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M17 21.6787L22 16.6787L17 11.6787" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>`
        })

        const show_gallery_btns = document.querySelectorAll('.property-item .show-gallery')
        show_gallery_btns.forEach(elem => {
            elem.addEventListener('click', function(){
                newGallery.render_gallery_popup(elem)
            })
        });
    })
})()
