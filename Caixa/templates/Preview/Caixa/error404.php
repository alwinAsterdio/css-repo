<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-error404'); ?>
<?= $this->element('top-menu', ['theme_type' => 'light']); ?>

<div class="search-location-section error-404-page min-h-[calc(100vh_-_221px_-_76px)] flex justify-center items-center">
    <div class="flex flex-col items-center pt-[48px] pb-[80px] px-5 lg:w-[630px]">
        <div>
            <svg width="80" height="81" viewBox="0 0 80 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.5" width="80" height="80" rx="40" fill="#BDC3FF"/>
                <path d="M38 56C46.8366 56 54 48.8366 54 40C54 31.1634 46.8366 24 38 24C29.1634 24 22 31.1634 22 40C22 48.8366 29.1634 56 38 56Z" stroke="#003C46" stroke-width="2.33334" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M57.9969 60L49.2969 51.3" stroke="#003C46" stroke-width="2.33334" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M32 33.9L43.6 45.1" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M32 45.1L43.6 33.9" stroke="#003C46" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h4 class="text-theme-primary-color text-2xl font-medium mt-[40px] mb-4 leading-[28.8px]">Página no encontrada</h4>
        <h5 class="text-lg text-[#333] font-normal my-0 mb-[40px] text-center leading-[21.6px]">
            <p>Lo sentimos, no ha sido posible encontrar esta página.</p>
            <p>Te proponemos volver a buscar para encontrar  tu nuevo hogar.</p>
        </h5>
        <div class="bg-[#F6F5F3] w-full p-[24px] box-border flex flex-col gap-[24px] rounded-[8px]">
            <div class="flex for-sale-rent-btns">
                <div class="flex-1 for-sale-rent-btns__item for-sale-rent-btns__item--sale for-sale-rent-btns__item--active" data-value="for_sale">Compra</div>
                <div class="flex-1 for-sale-rent-btns__item for-sale-rent-btns__item--rent" data-value="for_rent">Alquiler</div>
            </div>
            <div class="w-full box-border relative flex h-[48px]">
                <div class="w-full">
                    <div class="relative w-full">
                        <?php
                        $field_details = [
                            'id' => 'location',
                            'name' => 'location',
                            'class' => 'qcf-select-ajax--single-location',
                            'label' => 'Provincia, ciudad o código postal',
                        ];
                        ?>
                        <?= \App\Utils\CustomFields::fieldSingleSelectAjax($field_details); ?>
                        <svg width="16" height="16" class="absolute z-10 -translate-y-1/2 fill-theme-primary-color top-1/2 right-5" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7301 10.3183H10.9891L10.7265 10.065C11.852 8.75184 12.4336 6.96032 12.1147 5.05624C11.6738 2.44869 9.49772 0.366395 6.87141 0.0474853C2.9038 -0.440259 -0.435376 2.89891 0.0523681 6.86652C0.371278 9.49284 2.45357 11.6689 5.06112 12.1098C6.9652 12.4287 8.75672 11.8471 10.0699 10.7216L10.3231 10.9842V11.7252L14.3095 15.7116C14.6941 16.0961 15.3225 16.0961 15.7071 15.7116C16.0916 15.327 16.0916 14.6986 15.7071 14.314L11.7301 10.3183ZM6.10227 10.3183C3.76673 10.3183 1.88141 8.43293 1.88141 6.09739C1.88141 3.76184 3.76673 1.87653 6.10227 1.87653C8.43781 1.87653 10.3231 3.76184 10.3231 6.09739C10.3231 8.43293 8.43781 10.3183 6.10227 10.3183Z"/>
                        </svg>
                    </div>
                    <div class="search_helper"></div>
                </div>
            </div>
            <div>
                <button name="search_btn" id="search_btn" class="w-full font-semibold btn btn-primary btn-pill">Buscar</button>
            </div>
        </div>
    </div>
</div>
<script>
    const properties_slug = '/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>';
    (function() {
        document.addEventListener('DOMContentLoaded',function(){
            QoetixCustomFields.eventActions();

            const sale_rent_btns = document.querySelectorAll('.for-sale-rent-btns__item')
            sale_rent_btns.forEach(btn => {
                btn.addEventListener('click', function(){
                    if (this.classList.contains('for-sale-rent-btns__item--active')) {
                        return;
                    }

                    document.querySelectorAll('.for-sale-rent-btns__item--active').forEach(_btn => {
                        _btn.classList.remove('for-sale-rent-btns__item--active')
                    })

                    this.classList.add('for-sale-rent-btns__item--active')
                })
            })

            const search_btn = document.querySelector('#search_btn')
            search_btn.addEventListener('click', function(){
                const parent_group = document.querySelector('.qcf-select-ajax--single-location')
                const location_input = document.querySelector('input[name="location"]')
                const search_helper = document.querySelector('.search_helper');
                if (location_input === null) {
                    parent_group.classList.add('has-error')
                    search_helper.innerHTML = 'Escribe un criterio de búsqueda para comenzar.';
                    search_helper.classList.add('search_helper--has-error')
                    const search_input = document.querySelector('#search_location')
                    search_input.addEventListener('change', function fn(){
                        search_helper.innerHTML = '';
                        search_helper.classList.remove('search_helper--has-error')
                        parent_group.classList.remove('has-error')
                        search_input.removeEventListener('change', fn)
                    })
                } else {
                    search_helper.innerHTML = '';
                    search_helper.classList.remove('search_helper--has-error')
                    parent_group.classList.remove('has-error')
                    const location_arr = location_input.value.split('.');

                    const sale_rent = document.querySelector('.for-sale-rent-btns__item--active')?.getAttribute('data-value') ?? 'for_sale';

                    const route = new PropertiesRoute(sale_rent, null, location_arr[0]);

                    if (location_arr[1] !== '*') {
                        route.params.area = location_arr[1];
                    }

                    if (location_arr[2] !== '*') {
                        route.params.subarea = location_arr[2];
                    }

                    if (location_arr[3] !== '*') {
                        route.params.post_code = location_arr[3];
                    }

                    window.location = route.buildUrl();
                }
            })
        })
    })();
</script>
<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>'
<?= $this->html->script('/config.js'); ?>'
<?= $this->html->script('/general/js/routing.js'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
