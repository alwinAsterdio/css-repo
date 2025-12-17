// Sorting Recommended, Favourites, Matching pages
document
    .querySelectorAll(".sort_container .qcf-field-group__content__list__item")
    .forEach((item) => {
        item.addEventListener("click", function () {
            const selectedValue = this.getAttribute("data-value");
            document.getElementById("sort").value = selectedValue;
            const currentUrl = new URL(window.location.href);
            if (currentUrl.searchParams.has("sort")) {
                currentUrl.searchParams.set("sort", selectedValue);
            } else {
                currentUrl.searchParams.append("sort", selectedValue);
            }
            window.location.href = currentUrl.toString();
        });
    });

window.addEventListener("load", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const sortParam = urlParams.get("sort");
    if (sortParam) {
        const items = document.querySelectorAll(
            ".sort_container .qcf-field-group__content__list__item"
        );
        items.forEach((item) => {
            if (item.getAttribute("data-value") === sortParam) {
                item.classList.add(
                    "qcf-field-group__content__list__item--selected"
                );
                document.querySelector(
                    ".sort_container  .qcf-field-group__placeholder"
                ).textContent = item.textContent.trim();
            } else {
                item.classList.remove(
                    "qcf-field-group__content__list__item--selected"
                );
            }
        });
    }
});

// Table Sorting For Property List View
function updateUrlSort(buttonType) {
    const currentUrl = new URL(window.location.href);
    const urlParams = new URLSearchParams(currentUrl.search);
    let sortParam = urlParams.get("sort");

    // Handle List Selling Price sorting
    if (buttonType === "selling") {
        if (sortParam === "Properties.list_selling_price_amount") {
            urlParams.set("sort", "-Properties.list_selling_price_amount");
            document.getElementById("arrow-up-selling").classList.add("hidden");
            document.getElementById("arrow-down-selling").classList.remove("hidden");
        } else if (sortParam === "-Properties.list_selling_price_amount") {
            urlParams.set("sort", "Properties.list_selling_price_amount");
            document.getElementById("arrow-up-selling").classList.remove("hidden");
            document.getElementById("arrow-down-selling").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.list_selling_price_amount");
            document.getElementById("arrow-up-selling").classList.remove("hidden");
            document.getElementById("arrow-down-selling").classList.remove("hidden");
        }
    }

    // Handle Property Type sorting
    else if (buttonType === "propertytype") {
        if (sortParam === "Properties.property_type") {
            urlParams.set("sort", "-Properties.property_type");
            document.getElementById("arrow-up-propertytype").classList.add("hidden");
            document.getElementById("arrow-down-propertytype").classList.remove("hidden");
        } else if (sortParam === "-Properties.property_type") {
            urlParams.set("sort", "Properties.property_type");
            document.getElementById("arrow-up-propertytype").classList.remove("hidden");
            document.getElementById("arrow-down-propertytype").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.property_type");
            document.getElementById("arrow-up-propertytype").classList.remove("hidden");
            document.getElementById("arrow-down-propertytype").classList.remove("hidden");
        }
    }

    // Handle Location sorting
    else if (buttonType === "location") {
        if (sortParam === "Properties.location") {
            urlParams.set("sort", "-Properties.location");
            document.getElementById("arrow-up-location").classList.add("hidden");
            document.getElementById("arrow-down-location").classList.remove("hidden");
        } else if (sortParam === "-Properties.location") {
            urlParams.set("sort", "Properties.location");
            document.getElementById("arrow-up-location").classList.remove("hidden");
            document.getElementById("arrow-down-location").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.location");
            document.getElementById("arrow-up-location").classList.remove("hidden");
            document.getElementById("arrow-down-location").classList.remove("hidden");
        }
    }

    // Handle List Rental Price sorting
    else if (buttonType === "rental") {
        if (sortParam === "Properties.list_rental_price_amount") {
            urlParams.set("sort", "-Properties.list_rental_price_amount");
            document.getElementById("arrow-up-rental").classList.add("hidden");
            document.getElementById("arrow-down-rental").classList.remove("hidden");
        } else if (sortParam === "-Properties.list_rental_price_amount") {
            urlParams.set("sort", "Properties.list_rental_price_amount");
            document.getElementById("arrow-up-rental").classList.remove("hidden");
            document.getElementById("arrow-down-rental").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.list_rental_price_amount");
            document.getElementById("arrow-up-rental").classList.remove("hidden");
            document.getElementById("arrow-down-rental").classList.remove("hidden");
        }
    }

    // Handle List Bedrooms sorting
    else if (buttonType === "bedrooms") {
        if (sortParam === "Properties.bedrooms") {
            urlParams.set("sort", "-Properties.bedrooms");
            document.getElementById("arrow-up-bedrooms").classList.add("hidden");
            document.getElementById("arrow-down-bedrooms").classList.remove("hidden");
        } else if (sortParam === "-Properties.bedrooms") {
            urlParams.set("sort", "Properties.bedrooms");
            document.getElementById("arrow-up-bedrooms").classList.remove("hidden");
            document.getElementById("arrow-down-bedrooms").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.bedrooms");
            document.getElementById("arrow-up-bedrooms").classList.remove("hidden");
            document.getElementById("arrow-down-bedrooms").classList.remove("hidden");
        }
    }

    // Handle List Bathrooms sorting
    else if (buttonType === "bathrooms") {
        if (sortParam === "Properties.bathrooms") {
            urlParams.set("sort", "-Properties.bathrooms");
            document.getElementById("arrow-up-bathrooms").classList.add("hidden");
            document.getElementById("arrow-down-bathrooms").classList.remove("hidden");
        } else if (sortParam === "-Properties.bathrooms") {
            urlParams.set("sort", "Properties.bathrooms");
            document.getElementById("arrow-up-bathrooms").classList.remove("hidden");
            document.getElementById("arrow-down-bathrooms").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.bathrooms");
            document.getElementById("arrow-up-bathrooms").classList.remove("hidden");
            document.getElementById("arrow-down-bathrooms").classList.remove("hidden");
        }
    }

    // Handle List Status sorting
    else if (buttonType === "status") {
        if (sortParam === "Properties.status") {
            urlParams.set("sort", "-Properties.status");
            document.getElementById("arrow-up-status").classList.add("hidden");
            document.getElementById("arrow-down-status").classList.remove("hidden");
        } else if (sortParam === "-Properties.status") {
            urlParams.set("sort", "Properties.status");
            document.getElementById("arrow-up-status").classList.remove("hidden");
            document.getElementById("arrow-down-status").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.status");
            document.getElementById("arrow-up-status").classList.remove("hidden");
            document.getElementById("arrow-down-status").classList.remove("hidden");
        }
    }

    // Handle List Area sorting
    else if (buttonType === "area") {
        if (sortParam === "Properties.total_area_amount") {
            urlParams.set("sort", "-Properties.total_area_amount");
            document.getElementById("arrow-up-area").classList.add("hidden");
            document.getElementById("arrow-down-area").classList.remove("hidden");
        } else if (sortParam === "-Properties.total_area_amount") {
            urlParams.set("sort", "Properties.total_area_amount");
            document.getElementById("arrow-up-area").classList.remove("hidden");
            document.getElementById("arrow-down-area").classList.add("hidden");
        } else {
            urlParams.set("sort", "-Properties.total_area_amount");
            document.getElementById("arrow-up-area").classList.remove("hidden");
            document.getElementById("arrow-down-area").classList.remove("hidden");
        }
    }

    window.location.href = `${currentUrl.origin}${currentUrl.pathname}?${urlParams.toString()}`;
}

window.addEventListener("DOMContentLoaded", () => {
    const currentUrl = new URL(window.location.href);
    const urlParams = new URLSearchParams(currentUrl.search);
    const sortParam = urlParams.get("sort");

    if (!sortParam) {
        // No sorting, show both arrows
        document.getElementById("arrow-up-propertytype").classList.remove("hidden");
        document.getElementById("arrow-down-propertytype").classList.remove("hidden");
        document.getElementById("arrow-up-location").classList.remove("hidden");
        document.getElementById("arrow-down-location").classList.remove("hidden");
        document.getElementById("arrow-up-selling").classList.remove("hidden");
        document.getElementById("arrow-down-selling").classList.remove("hidden");
        document.getElementById("arrow-up-rental").classList.remove("hidden");
        document.getElementById("arrow-down-rental").classList.remove("hidden");
        document.getElementById("arrow-up-bedrooms").classList.remove("hidden");
        document.getElementById("arrow-down-bedrooms").classList.remove("hidden");
        document.getElementById("arrow-up-bathrooms").classList.remove("hidden");
        document.getElementById("arrow-down-bathrooms").classList.remove("hidden");
        document.getElementById("arrow-up-status").classList.remove("hidden");
        document.getElementById("arrow-down-status").classList.remove("hidden");
        document.getElementById("arrow-up-area").classList.remove("hidden");
        document.getElementById("arrow-down-area").classList.remove("hidden");
    } else {
        // Property Type
        if (sortParam === "Properties.property_type") {
            document.getElementById("arrow-up-propertytype").classList.remove("hidden");
            document.getElementById("arrow-down-propertytype").classList.add("hidden");
        } else if (sortParam === "-Properties.property_type") {
            document.getElementById("arrow-up-propertytype").classList.add("hidden");
            document.getElementById("arrow-down-propertytype").classList.remove("hidden");
        }

        // Location
        if (sortParam === "Properties.location") {
            document.getElementById("arrow-up-location").classList.remove("hidden");
            document.getElementById("arrow-down-location").classList.add("hidden");
        } else if (sortParam === "-Properties.location") {
            document.getElementById("arrow-up-location").classList.add("hidden");
            document.getElementById("arrow-down-location").classList.remove("hidden");
        }

        // Selling Price
        if (sortParam === "Properties.list_selling_price_amount") {
            document.getElementById("arrow-up-selling").classList.remove("hidden");
            document.getElementById("arrow-down-selling").classList.add("hidden");
        } else if (sortParam === "-Properties.list_selling_price_amount") {
            document.getElementById("arrow-up-selling").classList.add("hidden");
            document.getElementById("arrow-down-selling").classList.remove("hidden");
        }

        // Rental Price
        if (sortParam === "Properties.list_rental_price_amount") {
            document.getElementById("arrow-up-rental").classList.remove("hidden");
            document.getElementById("arrow-down-rental").classList.add("hidden");
        } else if (sortParam === "-Properties.list_rental_price_amount") {
            document.getElementById("arrow-up-rental").classList.add("hidden");
            document.getElementById("arrow-down-rental").classList.remove("hidden");
        }

        // Bedrooms
        if (sortParam === "Properties.bedrooms") {
            document.getElementById("arrow-up-bedrooms").classList.remove("hidden");
            document.getElementById("arrow-down-bedrooms").classList.add("hidden");
        } else if (sortParam === "-Properties.bedrooms") {
            document.getElementById("arrow-up-bedrooms").classList.add("hidden");
            document.getElementById("arrow-down-bedrooms").classList.remove("hidden");
        }

        // Bathrooms
        if (sortParam === "Properties.bathrooms") {
            document.getElementById("arrow-up-bathrooms").classList.remove("hidden");
            document.getElementById("arrow-down-bathrooms").classList.add("hidden");
        } else if (sortParam === "-Properties.bathrooms") {
            document.getElementById("arrow-up-bathrooms").classList.add("hidden");
            document.getElementById("arrow-down-bathrooms").classList.remove("hidden");
        }

        // Status
        if (sortParam === "Properties.status") {
            document.getElementById("arrow-up-status").classList.remove("hidden");
            document.getElementById("arrow-down-status").classList.add("hidden");
        } else if (sortParam === "-Properties.status") {
            document.getElementById("arrow-up-status").classList.add("hidden");
            document.getElementById("arrow-down-status").classList.remove("hidden");
        }

        // Area
        if (sortParam === "Properties.total_area_amount") {
            document.getElementById("arrow-up-area").classList.remove("hidden");
            document.getElementById("arrow-down-area").classList.add("hidden");
        } else if (sortParam === "-Properties.total_area_amount") {
            document.getElementById("arrow-up-area").classList.add("hidden");
            document.getElementById("arrow-down-area").classList.remove("hidden");
        }
    }
});

// Add event listeners for all the sorting buttons
document.getElementById("toggleSortPropertyType").addEventListener("click", () => updateUrlSort("propertytype"));
document.getElementById("toggleSortLocation").addEventListener("click", () => updateUrlSort("location"));
document.getElementById("toggleSortSellingPrice").addEventListener("click", () => updateUrlSort("selling"));
document.getElementById("toggleSortRentalPrice").addEventListener("click", () => updateUrlSort("rental"));
document.getElementById("toggleSortBedrooms").addEventListener("click", () => updateUrlSort("bedrooms"));
document.getElementById("toggleSortBathrooms").addEventListener("click", () => updateUrlSort("bathrooms"));
document.getElementById("toggleSortStatus").addEventListener("click", () => updateUrlSort("status"));
document.getElementById("toggleSortArea").addEventListener("click", () => updateUrlSort("area"));