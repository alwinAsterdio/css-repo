(function () {
    const waitForMapToInitialize = setInterval(() => {
        if (QoetixMap.map) {
            clearInterval(waitForMapToInitialize);

            const drawnItems = new L.FeatureGroup();
            QoetixMap.map.addLayer(drawnItems);

            let currentPolygon = null; // Only one polygon allowed
            let apiString = "";
            let drawingActive = false;
            let polygonDataCount = 0;

            // Leaflet.draw control
            const drawControl = new L.Control.Draw({
                edit: { featureGroup: drawnItems, remove: false },
                draw: {
                    polygon: {
                        shapeOptions: {
                            color: "#003C46",
                        }
                    },
                    polyline: false,
                    rectangle: false,
                    circle: false,
                    circlemarker: false,
                    marker: false,
                },
            });
            QoetixMap.map.addControl(drawControl);

            const toast = document.querySelector("#polygon_toast");
            function showToast(message, bgColor = "#FDEBAD") {
                toast.innerText = message;
                toast.style.backgroundColor = bgColor;
            }

            const icons = {
                default: `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;">
                    <path d="M15.1137 5.6804L18.3193 8.88603M4.90839 15.8858L3.83984 20.16L8.11401 19.0914L20.014 7.19132C20.4147 6.79056 20.6397 6.24708 20.6397 5.6804C20.6397 5.11372 20.4147 4.57025 20.014 4.16948L19.8302 3.98569C19.4295 3.58505 18.886 3.35999 18.3193 3.35999C17.7526 3.35999 17.2092 3.58505 16.8084 3.98569L4.90839 15.8858Z" stroke="white" stroke-width="0.96" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
                `,
                cancel: `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;">
                    <path d="M3.5 3.49988L20.4 20.4" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
                    <path d="M3.5 20.4994L20.4 3.59949" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
                </svg>
                `,
            };

            const startBtn = document.getElementById("startPolygonBtn");
            const startBtnIcon = document.getElementById("startPolygonBtnIcon");
            const startBtnText = document.getElementById("startPolygonBtnText");

            // Update button text
            function updateButtonText(propertiesCount = null, loading = false) {
                if (loading) {
                    // Show loading icon only
                    startBtnText.style.display = "none";
                    startBtnIcon.innerHTML = `<div class="spinner"></div>`;
                    startBtnIcon.style.display = "block";
                    return;
                }

                if (drawingActive) {
                    startBtnText.innerText = polygon_search_cancel_button_text;
                    startBtnIcon.innerHTML = icons.cancel;
                    startBtnIcon.style.display = "block";
                    return;
                }

                if (currentPolygon) {
                    if (propertiesCount > 0) {
                        startBtnText.innerText = `Mostrar ${propertiesCount} inmuebles`;
                        startBtnText.style.display = "block";
                        startBtnIcon.style.display = "none";
                    } else if (propertiesCount === 0) {
                        startBtnText.innerText =
                            polygon_search_enabled_button_text;
                        startBtnText.style.display = "block";
                        startBtnIcon.innerHTML = icons.default;
                        startBtnIcon.style.display = "block";
                        showToast(polygon_search_draw_again_text, "#F0B8C7");
                    }
                    return;
                }

                // Default state
                startBtnText.innerText = polygon_search_enabled_button_text;
                startBtnText.style.display = "block";
                startBtnIcon.innerHTML = icons.default;
                startBtnIcon.style.display = "block";
            }
            updateButtonText();

            // Enable polygon drawing only when zoomed to ~50km or less
            function checkZoomForPolygon() {
                const bounds = QoetixMap.map.getBounds();
                const northWest = bounds.getNorthWest();
                const southEast = bounds.getSouthEast();
                const distanceKm = northWest.distanceTo(southEast) / 1000;

                if (distanceKm <= 50) {
                    startBtn.style.pointerEvents = "auto";
                    showToast(polygon_search_enabled_text);
                } else {
                    startBtn.style.pointerEvents = "none";
                    showToast(polygon_search_disabled_text);
                }
            }

            // Initial check & listen to zoom/pan
            checkZoomForPolygon();
            QoetixMap.map.on("zoomend moveend", checkZoomForPolygon);

            // Start Polygon button click
            startBtn.addEventListener("click", function () {
                if (drawingActive) {
                    drawControl._toolbars.draw._modes.polygon.handler.disable();
                    drawingActive = false;
                    updateButtonText();
                } else if (currentPolygon && polygonDataCount > 0) {
                    const urlParams = new URLSearchParams(
                        window.location.search
                    );
                    const saleRent = urlParams.get("sale_rent");
                    let url = properties_url;
                    if (saleRent === "for_rent") {
                        url += "/alquilar/";
                    } else {
                        url += "/comprar/";
                    }
                    url +=
                        "?polygonCoordinates=" + encodeURIComponent(apiString);
                    window.location.href = url;
                } else {
                    if (currentPolygon) {
                        drawnItems.clearLayers();
                        currentPolygon = null;
                        polygonDataCount = 0;
                        apiString = "";
                        showToast(polygon_search_enabled_text);
                    }
                    drawControl._toolbars.draw._modes.polygon.handler.enable();
                    drawingActive = true;
                    updateButtonText();
                }
            });

            // Polygon creation
            QoetixMap.map.on("draw:created", function (event) {
                const layer = event.layer;

                if (currentPolygon) drawnItems.clearLayers();

                drawnItems.addLayer(layer);
                currentPolygon = layer;

                drawingActive = false;
                updateButtonText();

                if (layer instanceof L.Polygon) {
                    const latlngs = layer.getLatLngs()[0];
                    const firstPoint = latlngs[0];
                    const closePolygonIcon = `
                        <svg viewBox="0 0 35 35" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="17.5" cy="17.5" r="17.5" fill="#003C46" fill-opacity="1" />
                        <path d="M10.7383 10.7385L24.1815 24.1818" stroke="white" stroke-width="1.59091" stroke-linecap="square" stroke-linejoin="round"/>
                        <path d="M10.7383 24.261L24.1815 10.8179" stroke="white" stroke-width="1.59091" stroke-linecap="square" stroke-linejoin="round"/>
                        </svg>
                    `;
                    const markerIcon = L.divIcon({
                        className: "closeIcon_polygon",
                        html: closePolygonIcon,
                        iconSize: [20, 20],
                        iconAnchor: [10, 10],
                    });

                    const closeMarker = L.marker(firstPoint, {
                        icon: markerIcon,
                    }).addTo(drawnItems);
                    closeMarker.on("click", function () {
                        drawnItems.clearLayers();
                        currentPolygon = null;
                        apiString = "";
                        drawingActive = false;
                        showToast(polygon_search_enabled_text);
                        updateButtonText();
                    });
                }

                onPolygonComplete(layer);
            });

            function onPolygonComplete(polygonLayer) {
                updateButtonText(null, true);
                const latlngs = polygonLayer.getLatLngs()[0];
                let coords = latlngs;

                apiString = coords
                    .map((pt) => `${pt.lat} ${pt.lng}`)
                    .join(", ");
                apiString += `, ${coords[0].lat} ${coords[0].lng}`; // prepare coordinates from polygon
                getPolygonData(); // get polygon results
            }

            // Limit polygon to 10 clicks
            const MAX_POLYGON_POINTS = 10;
            let currentVertexCount = 0;
            QoetixMap.map.on("draw:drawstart", function (e) {
                currentVertexCount = 0; // reset counter when starting new polygon
            });
            QoetixMap.map.on("draw:drawvertex", function (e) {
                currentVertexCount++;
                if (currentVertexCount >= MAX_POLYGON_POINTS) {
                    const handler = drawControl._toolbars.draw._modes.polygon.handler;
                    handler.completeShape(); // finish polygon immediately
                }
            });

            // Get results from polygon search
            function getPolygonData() {
                const urlParams = new URLSearchParams(window.location.search);
                const saleRent = urlParams.get("sale_rent");
                const params = new URLSearchParams({
                    polygonCoordinates: apiString,
                });
                if (saleRent) {
                    params.append("sale_rent", saleRent);
                }
                fetch(
                    "/api/property-public/polygon-data/?" + params.toString(),
                    {
                        method: "GET",
                        headers: {
                            "Content-type": "application/json; charset=UTF-8",
                        },
                    }
                )
                    .then((response) => response.json())
                    .then((data) => {
                        polygonDataCount = Array.isArray(data.data)
                            ? data.data.length
                            : 0;
                        updateButtonText(polygonDataCount, false);
                    })
                    .catch((error) => console.error("Error:", error));
            }
        }
    }, 100);
})();
