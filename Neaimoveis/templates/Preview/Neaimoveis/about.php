<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-about'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<div>

  <!-- Hero Section -->
  <div class="bg-[#002F6D]">
    <div class="px-6">
      <div class="container xl:max-w-[1140px] mx-auto pt-48 pb-20 lg:pb-24">
        <div class="max-w-2xl">
          <span class="text-primary uppercase">
            <?= $page_data_options['hero_sub_title'] ?>
          </span>
          <h1 class="mt-5 text-4xl leading-tight font-bold text-white">
            <?= $page_data_options['hero_title'] ?>
          </h1>
        </div>
      </div>
    </div>
  </div>

  <!-- Our Service -->
  <div class="px-6 p-20 lg:p-24">
    <div class="container xl:max-w-5xl mx-auto text-center">
      <span class="text-primary uppercase">
        <?= $page_data_options['ourservice_sub_title'] ?>
      </span>
      <h1 class="mt-5 text-3xl titleColor leading-tight font-bold">
        <?= $page_data_options['ourservice_title'] ?> </h1>
      <div class="mt-5">
        <?= $page_data_options['ourservice_description'] ?>
      </div>
    </div>
    <?php if (!empty($page_data_options['gallery_column_one'])) : ?>
      <div class="container xl:max-w-[1140px] mx-auto mt-16 lg:mt-24">
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-6 items-center">
          <div class="rounded-xl lg:rounded-2xl overflow-hidden h-60 md:h-60 lg:h-64">
            <img
              src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'gallery_column_one'); ?>"
              alt="card Image"
              class="relative z-0 object-cover object-center h-full w-full" />
          </div>
          <div class="grid grid-row-2 gap-6">
            <div class="rounded-xl lg:rounded-2xl overflow-hidden h-60 md:h-[108px] lg:h-36">
              <img
                src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'gallery_column_two_a'); ?>"
                alt="card Image"
                class="relative z-0 object-cover object-center h-full w-full" />
            </div>
            <div class="rounded-xl lg:rounded-2xl overflow-hidden h-60 md:h-[108px] lg:h-36">
              <img
                src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'gallery_column_two_b'); ?>"
                alt="card Image"
                class="relative z-0 object-cover object-center h-full w-full" />
            </div>
          </div>
          <div class="rounded-xl lg:rounded-2xl overflow-hidden h-60 md:h-60 lg:h-[500px]">
            <img
              src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'gallery_column_three'); ?>"
              alt="card Image"
              class="relative z-0 object-cover object-center h-full w-full" />
          </div>
          <div class="grid grid-row-2 gap-6">
            <div class="rounded-xl lg:rounded-2xl overflow-hidden h-60 md:h-[108px] lg:h-36">
              <img
                src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'gallery_column_four_a'); ?>"
                alt="card Image"
                class="relative z-0 object-cover object-center h-full w-full" />
            </div>
            <div class="rounded-xl lg:rounded-2xl overflow-hidden h-60 md:h-[108px] lg:h-36">
              <img
                src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'gallery_column_four_b'); ?>"
                alt="card Image"
                class="relative z-0 object-cover object-center h-full w-full" />
            </div>
          </div>
          <div class="rounded-xl lg:rounded-2xl overflow-hidden h-60 md:h-60 lg:h-64">
            <img
              src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'gallery_column_five'); ?>"
              alt="card Image"
              class="relative z-0 object-cover object-center h-full w-full" />
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <!-- Why Choose Us -->
  <div class="bg-[#002F6D]">
    <div class="px-6 p-20 lg:p-24">
      <div class="container lg:max-w-xl mx-auto text-center text-white">
        <span class="text-primary uppercase">
          <?= $page_data_options['whyus_sub_title'] ?>
        </span>
        <h1 class="mt-5 text-3xl leading-tight font-bold">
          <?= $page_data_options['whyus_title'] ?>
        </h1>
        <div class="mt-5">
          <?= $page_data_options['whyus_description'] ?>
        </div>
      </div>
      <?php if (!empty($page_data_options['whyus_list'])) : ?>
        <div class="container xl:max-w-[1140px] mx-auto">
          <div class="mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
              <?php foreach ($page_data_options['whyus_list']['whyus_title'] as $uid => $title) : ?>
                <div class="bg-white rounded-xl lg:rounded-2xl border border-solid border-[#A7B2BB] p-6 lg:p-8">
                  <img 
                    src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['whyus_list']['whyus_image'], $uid); ?>"
                    class="w-full h-auto block max-w-10 mb-5" alt="" />
                  <h2 class="text-2xl leading-tight font-bold text-[#333333]">
                    <?= $title ?>
                  </h2>
                  <p class="mt-4">
                    <?= $page_data_options['whyus_list']['whyus_details'][$uid] ?? '' ?>
                  </p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <?php include __DIR__ . '/components/services.php' ?>

</div>

<?php include __DIR__ . '/components/footer.php' ?>

<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>