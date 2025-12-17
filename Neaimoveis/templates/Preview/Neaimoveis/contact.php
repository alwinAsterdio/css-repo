<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Neaimoveis/css/tw-contact'); ?>
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

  <!-- Get In Touch Section -->
  <div class="px-6 p-20 lg:p-24">
    <div class="container xl:max-w-[1140px] mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-8">
        <div class="lg:max-w-md">
          <h1 class="m-0 text-3xl leading-tight font-bold titleColor">
            <?= $page_data_options['getintouch_title'] ?>
          </h1>
          <div class="mt-5">
            <?= $page_data_options['getintouch_description'] ?>
          </div>
          <div class="mt-5">
            <div class="grid gap-8">
              <div class="grid grid-cols-[41px,1fr] gap-2.5 items-center">
                <img
                  src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'getintouch_email_icon'); ?>"
                  alt="Email"
                  class="block w-full h-auto max-w-10">
                <div class="flexflex-col gap-1">
                  <p class="text-xs leading-tight font-medium">
                    <?= $page_data_options['getintouch_email_title'] ?>
                  </p>
                  <a
                    href="mailto:<?= $site_data->get('email') ?>"
                    class="no-underline text-[#002F6D] hover:text-primary duration-300">
                    <?= $site_data->get('email') ?>
                  </a>
                </div>
              </div>
              <div class="grid grid-cols-[41px,1fr] gap-2.5 items-center">
                <img
                  src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'getintouch_call_icon'); ?>"
                  alt="Email"
                  class="block w-full h-auto max-w-10">
                <div class="flexflex-col gap-1">
                  <p class="text-xs leading-tight font-medium">
                    <?= $page_data_options['getintouch_call_title'] ?>
                  </p>
                  <a
                    href="tel:<?= $site_data->get('phone') ?>"
                    class="no-underline text-[#002F6D] hover:text-primary duration-300">
                    <?= $site_data->get('phone') ?>
                  </a>
                </div>
              </div>
              <?php if ($site_data_options['whatsapp']) : ?>
                <div class="grid grid-cols-[41px,1fr] gap-2.5 items-center">
                  <img
                    src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'getintouch_whatsapp_icon'); ?>"
                    alt="Email"
                    class="block w-full h-auto max-w-10">
                  <div class="flexflex-col gap-1">
                    <p class="text-xs leading-tight font-medium">
                      <?= $page_data_options['getintouch_whatsapp_title'] ?>
                    </p>
                    <a
                      href="https://wa.me/<?= $site_data_options['whatsapp'] ?>"
                      target="_blank"
                      class="no-underline text-[#002F6D] hover:text-primary duration-300">
                      <?= $site_data_options['whatsapp'] ?>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
              <?php if ($site_data['address']) : ?>
                <div class="grid grid-cols-[41px,1fr] gap-2.5 items-center">
                  <img
                    src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'getintouch_address_icon'); ?>"
                    alt="Call"
                    class="block w-full h-auto max-w-10">
                  <div class="flex flex-col gap-1">
                    <p class="text-xs leading-tight font-medium">
                      <?= $page_data_options['getintouch_address_title'] ?>
                    </p>
                    <p class="text-[#002F6D]"><?= $site_data->get('address') ?></p>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="box-border px-6 py-8 lg:px-12 lg:py-12 rounded-3xl border border-solid border-[#A7B2BB] bg-[#F5F5F580]">
          <h1 class="m-0 text-xl leading-tight font-bold titleColor">
            <?= $page_data_options['contact_form_title'] ?>
          </h1>
          <div class="mt-5">
            <?= $page_data_options['contact_form_sub_title'] ?>
          </div>
          <div class="form mt-5">
            <form id="enquiry-form" action="" class="enquiry-form grid grid-cols-2 gap-3" integration-recaptcha=true data-action="lead_form">
              <div class='hidden'>
                <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => 'Contact us form']); ?>
              </div>
              <div class="form-group col-span-2">
                <input type="text" class="box-border py-2.5 px-5 lg:py-4 lg:px-8 w-full leading-tight rounded-full border border-solid border-[#66666680] border-opacity-50" name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                <div class="form-group__helper"></div>
              </div>
              <div class="form-group col-span-1">
                <input type="email" class="box-border py-2.5 px-5 lg:py-4 lg:px-8 w-full leading-tight rounded-full border border-solid border-[#66666680] border-opacity-50 required-field" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                <div class="form-group__helper"></div>
              </div>
              <div class="form-group col-span-1">
                <input type="text" class="box-border py-2.5 px-5 lg:py-4 lg:px-8 w-full leading-tight rounded-full border border-solid border-[#66666680] border-opacity-50" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                <div class="form-group__helper"></div>
              </div>
              <div class="form-group col-span-2">
                <textarea id="message" name="message" cols="30" rows="10" class="font-[inherit] resize-none box-border py-2.5 px-5 lg:py-4 lg:px-8 w-full leading-tight rounded-3xl border border-solid border-[#66666680] border-opacity-50" placeholder="<?= $page_data_options['contact_form_message'] ?>"></textarea>
                <div class="form-group__helper"></div>
              </div>
              <div class="form-group col-span-2 text-xs form__disclaimer">
                <?= $page_data_options['contact_form_disclaimer'] ?>
              </div>
              <div class="col-span-2">
                <button class="btn-pill btn__type__dark border-none" type="submit" id="enquiry-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'enquiry-form'})">
                  <?= $page_data_options['contact_form_btn'] ?>
                </button>
              </div>
              <div class="col-span-2">
                <div class="generic-helper"></div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>

<?php include __DIR__ . '/components/footer.php' ?>

<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>