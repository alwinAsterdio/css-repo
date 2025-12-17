<div class="vip_admin_header">
    <div class="nav_wrapper">
        <div>
            <div class="mobile_toggle">
            <div class="menu_toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        </div>
        <div class="va_dropdown_action">
            <span class="icon_container">
                <svg fill="none" viewBox="0 0 21 28">
                    <path fill-rule="evenodd" d="M15.475 4.997c0 2.76-2.227 4.997-4.975 4.997S5.525 7.757 5.525 4.997 7.752 0 10.5 0s4.975 2.237 4.975 4.997m2.45 11.486A10.5 10.5 0 0 1 21 23.908q-.001.098-.005.193c-.005.124-.01.245.005.367V28H0v-4.092a10.5 10.5 0 0 1 17.925-7.425" clip-rule="evenodd">
                    </path>
                </svg>
            </span>
            <div class="va_dropdown_action_menu">
                <ul>
                    <li>
                        <a href="/vip/logout" class="">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
     document.addEventListener("DOMContentLoaded", function() {
        let menu_items = document.querySelectorAll('.va_dropdown_action')
        menu_items.forEach(menu_item => {
            menu_item.addEventListener('click', function(){
                if (!menu_item.classList.contains('va_dropdown_action--open')) {
                    menu_item.classList.add('va_dropdown_action--open')
                    setTimeout(() => {
                        document.addEventListener('click', function fn() {
                            document.removeEventListener('click', fn);
                            menu_item.classList.remove('va_dropdown_action--open')
                        });
                    }, 100);
                } else {
                    menu_item.classList.remove('va_dropdown_action--open')
                }
            })
        })
     })
</script>