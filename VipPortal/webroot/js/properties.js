document.addEventListener("DOMContentLoaded", function (event) {
    QoetixCustomFields.eventActions();
    show_tabs();

    fetch("/api/property-public/coordinates/?" + query_params, {
        method: "GET",
        headers: {
            "Content-type": "application/json; charset=UTF-8",
        },
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (response) {
            QoetixMap.loadMarkers(response);
        });

    const view_map_btn = document.querySelector(".view-map-btn");
    const map_section = document.querySelector(".properties-map-section");
    const menu_nav = document.querySelector(".vip_admin_header");
    view_map_btn?.addEventListener("click", function () {
        let position = menu_nav.offsetHeight;
        window.scroll(0, 0);
        map_section.style.top = position + "px";
        document.querySelector("#map-listing").style.height =
            "calc(100% - " + position + "px)";
        map_section.classList.remove("hidden");
        QoetixMap.resetMapPosition();
        document
            .querySelector("body")
            .classList.add("h-screen", "overflow-hidden");
    });

    const close_map_btn = document.querySelector(".close-map-btn");
    close_map_btn.addEventListener("click", function () {
        map_section.classList.add("hidden");
        document
            .querySelector("body")
            .classList.remove("h-screen", "overflow-hidden");
    });

    /**
     * Show listing tabs sections.
     */
    function show_tabs() {
        const tabs = document.querySelectorAll(".p-listing__actions__tab");

        tabs.forEach((tab) => {
            tab.addEventListener("click", function () {
                if (
                    this.classList.contains("p-listing__actions__tab--active")
                ) {
                    return;
                }

                document
                    .querySelector(".p-listing__actions__tab--active")
                    ?.classList.remove("p-listing__actions__tab--active");
                this.classList.add("p-listing__actions__tab--active");

                document
                    .querySelector(".p-listing__results__section--active")
                    ?.classList.remove("p-listing__results__section--active");
                document
                    .querySelector("#" + this.getAttribute("data-tab"))
                    ?.classList.add("p-listing__results__section--active");

                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set(
                    "tab",
                    this.getAttribute("data-tab")
                );
                window.history.pushState({}, "", currentUrl.toString());
            });
        });

        const currentUrl = new URL(window.location.href);
        const tabFromUrl = currentUrl.searchParams.get("tab");
        if (tabFromUrl !== null) {
            const tab_item_elem = document.querySelector(
                '.p-listing__actions__tab[data-tab="' + tabFromUrl + '"]'
            );
            if (tab_item_elem !== null) {
                tab_item_elem.dispatchEvent(new Event("click"));
            }
        }
    }

    const sort_field = document.querySelector("#sort");
    if (sort_field !== null) {
        const url_params = new URLSearchParams(window.location.search);
        sort_field.addEventListener("change", function () {
            if (sort_field.value === url_params.get("sort")) {
                return;
            }

            const form = document.querySelector(".search-form");
            if (form !== null) {
                if (form.querySelector('[name="page"]')) {
                    form.querySelector('[name="page"]').remove();
                }

                if (form.querySelector('[name="sort"]')) {
                    form.querySelector('[name="sort"]').value =
                        sort_field.value;
                } else {
                    form.insertAdjacentHTML(
                        "beforeend",
                        '<input type="hidden" name="sort" value="' +
                            sort_field.value +
                            '"/>'
                    );
                }

                const activeTab = document.querySelector(
                    ".p-listing__actions__tab--active"
                );
                if (activeTab) {
                    const currentTab = activeTab.getAttribute("data-tab");
                    if (currentTab) {
                        let tabInput = form.querySelector('[name="tab"]');
                        if (tabInput) {
                            tabInput.value = currentTab;
                        } else {
                            form.insertAdjacentHTML(
                                "beforeend",
                                '<input type="hidden" name="tab" value="' +
                                    currentTab +
                                    '"/>'
                            );
                        }
                    }
                }

                form.dispatchEvent(new Event("submit"));
                form.submit();
            }
        });
    }

    const search_form = document.querySelector(".search-form");
    if (search_form !== null) {
        search_form.addEventListener("submit", function (e) {
            const currentUrl = new URL(window.location.href);
            const tabFromUrl = currentUrl.searchParams.get("tab");

            const activeTab = document.querySelector(
                ".p-listing__actions__tab--active"
            );
            const currentTab = activeTab ? activeTab.getAttribute("data-tab") : null;

            const tabToPreserve = tabFromUrl || currentTab;

            if (tabToPreserve) {
                let tabInput = search_form.querySelector('[name="tab"]');
                if (tabInput) {
                    tabInput.value = tabToPreserve;
                } else {
                    search_form.insertAdjacentHTML(
                        "beforeend",
                        '<input type="hidden" name="tab" value="' +
                            tabToPreserve +
                            '"/>'
                    );
                }
            }
        });
    }
});
