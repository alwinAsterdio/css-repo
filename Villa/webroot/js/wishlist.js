document.addEventListener('DOMContentLoaded', function(event) {
    Wishlist.enable({
        load_dummy_template: function(id) {
            return `<a href='' class="text-black no-underline property-item loading-wishlist-item" id="${id}" data-sale-rent="">
                <div class="shadow-md min-h-[50px] aspect-ratio-[3/4] box-border">
                    <div class="relative">
                        <div class="relative overflow-hidden bg-gray-400 property-img">
                            <div class="aspect-video bg-gray-300">
                                <span class="wishlist-loading-icon"></span>
                            </div>
                        </div>
                        <span class="absolute cursor-pointer shadow-lg text-[#1d1e20] text-base py-1.5 px-3 border-transparent bg-white top-3 left-3 sale-rent"></span>
                    </div>
                    <div class="box-border property-details">
                        <div class="p-4 text-left details">
                            <div class="font-medium text-[#202020] ref">
                                #&nbsp;
                            </div>
                            <div class="text-lg font-medium name">&nbsp;</div>
                            <div class="uppercase text-[#5b5957] font-semibold text-sm mt-4 address">
                                -
                            </div>
                            <div class="font-semibold text-2xl mt-8 price">
                                -
                            </div>
                        </div>
                        <div class="properties-features-section bg-[#F4F5F9] box-border text-center p-2 w-full">
                            <div class="features-short">
                                <div class="features-short__group">
                                    <label class="features-short__group__label">&nbsp;</label>
                                    <span class="features-short__group__value">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>`
        },
        load_property_template: function(property) {
            let features_html = '';
            property.features_short.map(feature => {
                features_html += `<div class="features-short__group">
                    <label class="features-short__group__label">${feature.label}</label>
                    <span class="features-short__group__value">${feature.value}</span>
                </div>`
            })

            let property_elem = document.querySelector('.loading-wishlist-item[id="' + property.id + '"]');
            property_elem.setAttribute('href', property.url);
            property_elem.setAttribute('data-sale-rent', property.sale_rent);

            property_elem.querySelector('.property-img').innerHTML = `<div class="aspect-video"></div><img class="absolute top-0 left-0 object-cover w-full h-full transition-opacity duration-500 opacity-100 cursor-pointer" src="${property.featured_photo}" alt="property-image" loading="lazy"/>`
            property_elem.querySelector('.name').innerHTML = property.name
            property_elem.querySelector('.address').innerHTML = property.address
            property_elem.querySelector('.price').innerHTML = property.website_price
            property_elem.querySelector('.sale-rent').innerHTML = property.sale_rent_display
            property_elem.querySelector('.properties-features-section .features-short').innerHTML = features_html
            property_elem.querySelector('.ref').innerHTML = '#' + property.ref

            property_elem.classList.remove('loading-wishlist-item')
        }
    })
});