<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-home'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<div>
  <!-- Hero Section -->
  <div class="bg-[var(--accent-color)]" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position:center; background-size:cover;">
    <div class="px-6">
      <div class="container xl:max-w-[1140px] mx-auto pt-64 pb-36">
        <div>
          <div class="max-w-2xl">
            <span class="text-primary uppercase">
              <?= $page_data_options['hero_sub_title'] ?>
            </span>
            <h1 class="mt-5 text-4xl leading-tight font-bold text-white">
              <?= $page_data_options['hero_title'] ?>
            </h1>
          </div>
          <?php echo \App\Utils\Search::render('simple', ['row_class' => 'grid-cols-1 md:grid-cols-3 lg:grid-cols-6']); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Featured Properties Section -->
  <div class="featuredProperties px-6">
    <div class="container xl:max-w-[1140px] mx-auto py-24">
      <div class="section-wrapper">
        <div class="max-w-[555px] mx-auto text-center">
          <span class="text-primary uppercase">
            <?= $page_data_options['featured_sub_title'] ?>
          </span>
          <h1 class="mt-5 text-2xl md:text-3xl lg:text-4xl titleColor leading-tight font-semibold">
            <?= $page_data_options['featured_title'] ?>
          </h1>
          <div class="mt-5 text-lg leading-normal">
            <?= $page_data_options['featured_description'] ?>
          </div>
        </div>
      </div>

      <?php $featured_properties = \App\Connector\Property::getFeaturedProperties(1, 8); ?>
      <?php if (!empty($featured_properties['data']) && $featured_properties['pagination']['count'] > 0) : ?>
        <div class="grid grid-flow-row-dense gap-[24px] mt-8 md:mt-10 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php foreach ($featured_properties['data'] as $property) { ?>
                <?php include __DIR__ . '/components/property-item.php' ?>
            <?php } ?>
        </div>
      <?php endif ?>

      <div class="mt-8 md:mt-10 text-center">
        <a
          class="btn-pill"
          href="<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('properties'); ?>?sale_rent=for_sale&featured=1">
          <?= $page_data_options['featured_button_label'] ?>
        </a>
      </div>
    </div>
  </div>

  <!-- Locations Section -->
  <div class="locations text-white bg-[var(--accent-color)] py-24">
    <div class="px-6">
      <div class="container xl:max-w-[1140px] mx-auto">
        <div class="grid grid-flow-row-dense gap-[30px] md:gap-[40px] lg:gap-[80px] xl:gap-[120px] sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-[460px,1fr]">
          <div class="section-wrapper">
            <span class="text-primary uppercase">
              <?= $page_data_options['locations_sub_title'] ?>
            </span>
            <h1 class="m-0 mt-5 text-2xl md:text-3xl lg:text-4xl leading-5 font-semibold">
              <?= $page_data_options['locations_title'] ?>
            </h1>
          </div>
          <div class="section-wrapper">
            <div class="text-lg leading-6">
              <?= $page_data_options['locations_description'] ?>
            </div>
            <div class="mt-5">
              <a
                class="btn-pill"
                href="#">
                <?= $page_data_options['locations_button_label'] ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carousel section -->   
    <?php
    if (
          !empty($page_data_options['location_list']) &&
          !empty($page_data_options['location_list']['location_district'])
    ) :
        ?>
        <div class="mt-8 md:mt-10 max-w-[1440px mx-auto">
        <div class="location-carousel px-5 lg:px-20">
          <div class="glide h-full location-carousel__glide">
            <div class="glide__inner h-full">
              <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                  <?php foreach ($page_data_options['location_list']['location_district'] as $uid => $title) { ?>
                    <li class="glide__slide">
                      <div class="location-item rounded-xl relative overflow-hidden">
                        <?php
                        $image_url = \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['location_list']['location_image'], $uid);
                        if ($image_url) : ?>
                          <img src="<?= $image_url ?>" alt="Location Image" class="relative z-0 h-full w-full block" loading="lazy" />
                        <?php else : ?>
                          <img src="path/to/default/image.jpg" alt="Default Location Image" class="relative z-0 h-full w-full block" loading="lazy" />
                        <?php endif; ?>
                        <div class="absolute z-10 bottom-0 p-7 text-white w-full text-center box-border">
                          <h2 class="text-2xl leading-5 font-semibold" title="<?= htmlspecialchars($title) ?>">
                            <?= htmlspecialchars($title) ?>
                          </h2>
                          <?php
                            $property_district = \App\Connector\Reports::propertyDistrictList();
                            $total = !empty($property_district[$title]) ? $property_district[$title]['total'] : 0;
                            ?>
                          <p class="mt-3.5">
                            <?= $total . ($total > 1 ? ' properties' : ' property') ?>
                          </p>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <div class="glide__arrows" data-glide-el="controls">
                <div class="glide__arrow glide__arrow--left" data-glide-dir="<">
                  <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="Group 485">
                      <circle id="Ellipse 130" cx="42" cy="42" r="42" fill="black" fill-opacity="0.4" />
                      <path id="Vector 4" d="M47 30L35 42L47 54" stroke="white" stroke-width="5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                  </svg>
                </div>
                <div class="glide__arrow glide__arrow--right" data-glide-dir=">">
                  <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="Group 484">
                      <circle id="Ellipse 130" cx="42" cy="42" r="42" transform="matrix(-1 0 0 1 84 0)" fill="black"
                        fill-opacity="0.4" />
                      <path id="Vector 4" d="M37 30L49 42L37 54" stroke="white" stroke-width="5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                  </svg>
                </div>
              </div>
            </div>
            <div class="glide-scrollable">
              <div class="glide__bullets" data-glide-el="controls[nav]">
                <?php
                $location_districts = array_values($page_data_options['location_list']['location_district']);
                foreach ($location_districts as $index => $location) {
                    ?>
                  <div class="glide__bullet" data-glide-dir="=<?= $index ?>">
                    <span></span>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        </div>
    <?php endif; ?>
  </div>

  <?php include __DIR__ . '/components/services.php' ?>
  
  <!-- Partners Section -->
  <div class="partners">
    <div class="px-6">
      <div class="container xl:max-w-[1140px] mx-auto">
        <div class="section-wrapper">
          <div class="max-w-[555px] mx-auto text-center">
            <span class="text-primary uppercase">
              <?= $page_data_options['partners_sub_title'] ?>
            </span>
            <h1 class="mt-5 text-2xl md:text-3xl lg:text-4xl leading-5 titleColor font-semibold">
              <?= $page_data_options['partners_title'] ?>
            </h1>
            <div class="mt-5 text-lg leading-6">
              <?= $page_data_options['partners_description'] ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Partners Carousel section -->
    
      <?php
        if (
              !empty($page_data_options['partners_list']) &&
            !empty($page_data_options['partners_list']['partners_title'])
        ) :
            ?>
        <div class="mb-16 mt-8 md:mt-10 max-w-[1440px] mx-auto">
        <div class="partner-carousel px-5 lg:px-20">
          <div class="glide h-full partner-carousel__glide">
            <div class="glide__inner h-full">
              <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                  <?php foreach ($page_data_options['partners_list']['partners_title'] as $uid => $title) { ?>
                    <li class="glide__slide">
                      <div class="border border-solid border-slate-500 rounded-xl relative overflow-hidden p-4 lg:p-6">
                        <?php
                        $image_url = \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['partners_list']['partners_image'], $uid);
                        if ($image_url) : ?>
                          <img src="<?= $image_url ?>" alt="Partner" class="relative z-0 h-full w-full block" loading="lazy" />
                        <?php else : ?>
                          <img src="path/to/default/image.jpg" alt="Default Location Image" class="relative z-0 h-full w-full block" loading="lazy" />
                        <?php endif; ?>
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <div class="glide-scrollable">
              <div class="glide__bullets" data-glide-el="controls[nav]">
                <?php
                $location_districts = array_values($page_data_options['partners_list']['partners_title']);
                foreach ($location_districts as $index => $partner) {
                    ?>
                  <div class="glide__bullet" data-glide-dir="=<?= $index ?>">
                    <span></span>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php endif; ?>
    
    <div class="px-6">
      <div class="container xl:max-w-[1140px] mx-auto pb-24">
        <div class="mt-8 md:mt-10 text-center">
          <a
            class="btn-pill"
            href="#">
            <?= $page_data_options['partners_button_label'] ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Explore Properties Section -->
  <div class="locationsExplore px-6 bg-[#f5f5f5]">
    <div class="container xl:max-w-[1140px] mx-auto py-24">
      <div class="section-wrapper">
        <div class="max-w-2xl">
          <span class="text-primary uppercase">
            <?= $page_data_options['explore_sub_title'] ?>
          </span>
          <h1 class="mt-5 text-2xl md:text-3xl lg:text-4xl leading-5 titleColor font-semibold">
            <?= $page_data_options['explore_title'] ?>
          </h1>
          <div class="mt-5 text-lg leading-6">
            <?= $page_data_options['explore_description'] ?>
          </div>
        </div>
      </div>

      <!-- Location section -->
      <?php include __DIR__ . '/components/location-zones.php' ?>

    </div>
  </div>

</div>

<?php include __DIR__ . '/components/footer.php' ?>

<?= $this->html->script('/plugins/glide/glide.min.js'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/neaimoveis/js/home.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>