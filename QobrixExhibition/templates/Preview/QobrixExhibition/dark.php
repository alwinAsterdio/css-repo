<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/QobrixExhibition/css/tw-dark'); ?>
<?php include __DIR__ . '/components/top-menu.php' ?>

<?php
$component_data = \App\Utils\SitesPage::getFirstPageByTemplate('components/form');
$form_options = json_decode($component_data['options'], true);
?>

<div>

  <!-- Introduction -->
  <div class="px-6 pt-12">
    <div class="container max-w-screen-xl m-auto">
      <div class="text-center max-w-xl m-auto text-slate-100">
        <h1 class="m-0 max-w-lg mx-auto text-3xl lg:text-4xl leading-tight font-semibold">
          <?= $form_options['intro_title'] ?>
        </h1>
        <p class="m-0 mt-8">
          <?= $form_options['intro_description'] ?>
        </p>
      </div>
    </div>
  </div>
  <!-- End Introduction -->

  <!-- Form -->
  <div class="px-6 py-16 lg:py-24">
    <div class="container max-w-screen-xl m-auto">
      <div class="text-center m-auto max-w-2xl">
        <div class="border border-solid border-slate-300 p-5 lg:p-10 bg-slate-100 rounded-xl text-left">
          <?php include __DIR__ . '/components/form.php' ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Form -->

  <!-- Copyright -->
  <div class="px-6">
    <div class="container max-w-screen-xl m-auto">
      <div class="pb-8 text-center text-slate-100">
        &copy; Copyright
        <script>
          document.write(new Date().getFullYear())
        </script> <?= $site_data->get('site_title') ?>.
      </div>
    </div>
  </div>
  <!-- End Copyright -->

  <!-- Background -->
  <div class="fixed top-0 inset-0 -z-10 h-full w-full items-center px-5 py-24 [background:radial-gradient(125%_125%_at_50%_10%,#000000_40%,var(--theme-primary-color))]">
  </div>
  <!-- End Background -->

</div>

<script defer src="/js/lead.js"></script>
<?= $this->render('/Preview/general/footer'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>