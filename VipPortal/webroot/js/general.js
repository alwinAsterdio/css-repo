var mobileToggle = document.querySelector('.menu_toggle');
var navWrapper = document.querySelector('.sidenav_wrapper');
var navOverlay = document.querySelector('.sidenav_overlay');
var navMenuToggle = document.querySelector('.menu_toggle');

mobileToggle.addEventListener('click', function () {
    navWrapper.classList.toggle('sidenav_wrapper_open');
    navOverlay.classList.toggle('sidenav_overlay_open');
    navMenuToggle.classList.toggle('change');
});

navOverlay.addEventListener('click', function () {
    navWrapper.classList.toggle('sidenav_wrapper_open');
    navOverlay.classList.toggle('sidenav_overlay_open');
    navMenuToggle.classList.toggle('change');
});

function toggleAccordion(index) {
    const content = document.getElementById(`sub_menu_inner-${index}`);
    const icon = document.getElementById(`icon-${index}`);
    const minusSVG = `<svg xmlns="http://www.w3.org/2000/svg" class="block fill-gray-500 group-hover:fill-white" viewBox="0 -960 960 960" height="20px" width="20px"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>`;
    const plusSVG = `<svg xmlns="http://www.w3.org/2000/svg" class="block fill-gray-500 group-hover:fill-white" viewBox="0 -960 960 960" height="20px" width="20px"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>`;
    document.querySelector('.sidenav_bar').classList.remove('hide_menu_label--active');
    document.querySelector('.va_content_wrapper').classList.remove('increase_width--active');
    document.querySelector('.hide_label_wrapper').classList.remove('reverse_arrow--active');

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        content.style.maxHeight = '0';
        icon.innerHTML = plusSVG;
    } else {
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.innerHTML = minusSVG;
    }
}
window.addEventListener('DOMContentLoaded', () => {
    const subMenus = document.querySelectorAll('.va_sub_menu');
    subMenus.forEach(menu => {
        if (menu.classList.contains('accordion_active')) {
            if (menu.id.startsWith('sub_menu_inner-')) {
                const idParts = menu.id.split('-');
                const index = idParts[idParts.length - 1];
                toggleAccordion(index);
            } else {
                const contentEl = menu.querySelector('[id^="sub_menu_inner-"]');
                if (contentEl) {
                    const idParts = contentEl.id.split('-');
                    const index = idParts[idParts.length - 1];
                    toggleAccordion(index);
                } else {
                }
            }
        }
    });
});

function toggleSidebarWidth() {
    document.querySelector('.sidenav_bar').classList.toggle('hide_menu_label--active');
    document.querySelector('.va_content_wrapper').classList.toggle('increase_width--active');
    document.querySelector('.hide_label_wrapper').classList.toggle('reverse_arrow--active');
    document.querySelector('.va_sub_menu').style.maxHeight = '0';
}

window.addEventListener('resize', toggleClassBasedOnScreenSize);
function toggleClassBasedOnScreenSize() {
    const mobileBreakpoint = 767;
    if (window.innerWidth <= mobileBreakpoint) {
        navWrapper.classList.add('mobile_screen_active');
    } else {
        navWrapper.classList.remove('mobile_screen_active');
    }
}
toggleClassBasedOnScreenSize();


