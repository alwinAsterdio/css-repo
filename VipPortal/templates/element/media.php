<?php
$imageData = [];
foreach ($page_data_options['display_property_media_options'] as $fieldName => $_) {
    if ($fieldName === 'videos') {
        $videoUrls = $property->getYoutubeLink(['for_display' => true]);
        if (!empty($videoUrls)) {
            if (!is_array($videoUrls)) {
                $videoUrls = [$videoUrls];
            }
            foreach ($videoUrls as $url) {
                if (empty($url))
                    continue;
                $imageData[] = [
                    'url' => $url,
                    'category' => $fieldName,
                    'type' => 'video'
                ];
            }
        }
        continue;
    }
    $mediaItems = $property->getMedia($fieldName, ['default_value' => []]);
    foreach ($mediaItems as $mediaItem) {
        if (empty($mediaItem['file']) || empty($mediaItem['file']['href']) || empty($mediaItem['file']['mime_type'])) {
            continue;
        }
        $href = $mediaItem['file']['href'];
        $mime_type = $mediaItem['file']['mime_type'];
        $filename = $mediaItem['file']['original_filename'];
        $imageData[] = [
            'url' => $href,
            'category' => $fieldName,
            'filename' => $filename,
            'type' => $mime_type,
        ];
    }
}
?>

<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<style>
    body.media_category_modal--open {
        overflow: hidden;
    }
</style>

<div class="grid grid-cols-1 md:grid-cols-[25%,75%] border-0 border-t border-solid border-[var(--border-light)]">
    <div class="overflow-hidden overflow-x-scroll md:overflow-x-hidden w-full media_category_list_wrapper">
        <ul class="media_category_list" id="media_category--tabs"></ul>
    </div>
    <div class="mt-8 md:mt-0 min-h-px md:min-h-[50rem] md:pl-10 md:pt-10 w-full">
        <div class="media_gallery_container" id="media_gallery_container--property"></div>
    </div>
</div>

<div id="media_category_modal">
    <div class="modal-content">
        <span class="close-lightbox" id="closeLightbox">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z">
                </path>
            </svg>
        </span>

        <div class="glide" id="glideSlider">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides" id="glideSlidesMedia"></ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">‹</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">›</button>
            </div>
        </div>
    </div>
</div>

<!-- Glide.js -->
<?= $this->html->script('/plugins/glide/glide.min.js'); ?>

<script>
    const display_property_media = <?= json_encode($page_data_options['display_property_media'] ?? 'off') ?>;
    const mediaBaseUrl = "<?= \App\Connector\Qobrix::getMediaUrl() ?>";
    const placeholderImage = "<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'placeholder_documents_image'); ?>";
    const images = <?= json_encode($imageData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?>;
    const gallery = document.getElementById("media_gallery_container--property");
    const glideSlides = document.getElementById("glideSlidesMedia");
    const modal = document.getElementById("media_category_modal");
    let glideInstance;
    let currentFilteredImages = images;

    function renderTabs() {
        const tabsContainer = document.getElementById("media_category--tabs");
        const categories = [...new Set(images.map(item => item.category))];
        const categoryCounts = {};
        images.forEach(item => {
            categoryCounts[item.category] = (categoryCounts[item.category] || 0) + 1;
        });

        let html = `<li data-category="all" class="media_category--active">All Files <span>${images.length}</span></li>`;
        categories.forEach(category => {
            const label = category
                .replace(/_/g, ' ')
                .replace(/\b\w/g, c => c.toUpperCase());
            const count = categoryCounts[category] || 0;
            html += `
                <li data-category="${category}">
                    ${label}<span>${count}</span>
                </li>
            `;
        });

        html += `<div class="hidden md:block h-full border-0 border-solid border-r border-[var(--border-light)]"></div>`;

        tabsContainer.innerHTML = html;

        bindTabEvents();
    }

    function bindTabEvents() {
        const tabs = document.querySelectorAll("#media_category--tabs li");
        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                tabs.forEach((t) => t.classList.remove("media_category--active"));
                tab.classList.add("media_category--active");
                const category = tab.dataset.category;
                renderGallery(category);
            });
        });
    }

    function renderGallery(category = "all") {
        gallery.innerHTML = "";
        currentFilteredImages = category === "all"
            ? images
            : images.filter((img) => img.category === category);

        let html = "";
        currentFilteredImages.forEach((img, index) => {
            let imgSrc = "";
            let altText = "";
            if (img.type === "video") {
                const videoIdMatch = img.url.match(/\/embed\/([^?&"'>]+)/);
                const videoId = videoIdMatch ? videoIdMatch[1] : null;
                if (videoId) {
                    imgSrc = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
                    html += `
                    <div class="media_gallery_wrapper">
                        <div class="media_gallery_item">
                            <img src="${imgSrc}" data-index="${index}" />
                        </div>
                    </div>
                `;
                } else {
                    imgSrc = "";
                }
            }
            else if (img.type.startsWith("image/")) {
                imgSrc = img.url;
                html += `
                <div class="media_gallery_wrapper">
                    <div class="media_gallery_item">
                        <img src="${mediaBaseUrl}${imgSrc}" data-index="${index}" />
                    </div>
                </div>
            `;
            }
            else {
                html += `
                <div class="media_gallery_wrapper">
                    <div class="media_gallery_item type_document">
                        <img src="${placeholderImage}" alt="PDF Thumbnail" data-index="${index}" />${img.filename || 'File'}
                    </div>
                </div>
            `;
            }
        });
        gallery.innerHTML = html;
        gallery.querySelectorAll("img").forEach(imgEl => {
            imgEl.addEventListener("click", () => openModal(parseInt(imgEl.dataset.index)));
        });
    }

    function renderSlides() {
        glideSlides.innerHTML = "";
        currentFilteredImages.forEach((img) => {
            const li = document.createElement("li");
            li.className = "glide__slide";
            if (img.type === "video") {
                li.innerHTML = `
                    <div class="slide_container type_video">
                        <iframe src="${img.url}" frameborder="0" allowfullscreen width="100%" height="100%"></iframe>
                    </div>
                `;
            } else if (img.type.startsWith("image/")) {
                li.innerHTML = `
                <div class="slide_container">
                    <img src="${mediaBaseUrl}${img.url}">
                </div>
            `;
            } else {
                li.innerHTML = `
                <div class="slide_container type_document">
                    <a href="${mediaBaseUrl}${img.url}" target="_blank" rel="noopener noreferrer" class="file_link">
                        ${img.filename || 'File'}
                    </a>
                </div>
            `;
            }
            glideSlides.appendChild(li);
        });
    }

    function openModal(startAt) {
        document.body.classList.add('media_category_modal--open');
        modal.style.display = "block";
        if (glideInstance) {
            glideInstance.destroy();
        }
        renderSlides();
        requestAnimationFrame(() => {
            glideInstance = new Glide("#glideSlider", {
                type: "carousel",
                startAt: Math.max(0, startAt),
                perView: 1,
            });
            glideInstance.on('run.after', () => {
                // Stop video playback in non-active slides
                document.querySelectorAll('.glide__slide').forEach((slide) => {
                    if (!slide.classList.contains('glide__slide--active')) {
                        slide.querySelectorAll('iframe').forEach(iframe => {
                            iframe.src = iframe.src;
                        });
                    }
                });
            });
            glideInstance.mount();
        });
    }

    document.querySelector('#closeLightbox')?.addEventListener('click', function () {
        modal.style.display = 'none';
        document.body.classList.remove('media_category_modal--open');
        modal.querySelectorAll('iframe').forEach(iframe => {
            iframe.src = iframe.src;
        });
    });

    renderGallery();
    renderTabs();
</script>