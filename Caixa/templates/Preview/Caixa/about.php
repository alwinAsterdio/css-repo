<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/caixa/css/tw-about'); ?>
<?= $this->element('top-menu', ['theme_type' => 'dark']); ?>
<div class="top-menu-padding bg-theme-primary-color pb-10 1.5xl:pb-20">
    <div class="container-section flex flex-col lg:flex-row gap-5">
        <div class="order-2 lg:order-1 about-us-title text-[28px] min-w-[200px] xl:min-w-[350px] md:text-4xl lg:text-5xl 2xl:text-[64px] lg:leading-none font-normal text-theme-secondary-color self-center text-center lg:text-left lg:self-end"><?= $page_data_options['about_title'] ?></div>
        <div class="xl:h-[500px] order-1 lg:order-2 1.5xl:self-end flex-1">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>" class="object-contain w-full h-full" alt="Hero Image" loading="lazy"/>
        </div>
    </div>
</div>

<div class="bg-theme-secondary-color">
    <div class="container-section py-10 xl:min-h-[500px] flex justify-center items-center">
        <div class="px-5 xl:p-20 max-w-[900px] text-center text-2xl 1.5xl:text-4xl text-theme-primary-color"><?= $page_data_options['about_description'] ?></div>
    </div>
</div>

<div style="background-color: <?= $page_data_options['third_section_bg_color'] ?>">
    <div class="flex flex-col md:flex-row py-10 gap-5 lg:gap-10 container-section">
        <div class="flex-1 inline-flex justify-center items-center">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'third_section_bg_img'); ?>" class="object-cover object-center aspect-square w-full 1.5xl:w-[530px] 2xl:w-[600px] rounded-[40px]" alt="Hero Image" loading="lazy"/>
        </div>
        <div class="flex-1 inline-flex flex-col justify-center gap-5">
            <div class="text-2xl 1.5xl:text-3xl text-theme-primary-color"><?= $page_data_options['third_section_description'] ?></div>
            <?php if (!empty($page_data_options['third_section_btn_lbl'])) : ?>
                <span class="w-fit text-[24px] font-medium text-[#003C46] px-6 py-2 bg-white rounded-3xl"><?= $page_data_options['third_section_btn_lbl'] ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Features section -->
<?= $this->element('features-services-list'); ?>

<div class="bg-theme-primary-color">
    <div class="container-section flex flex-col md:flex-row py-5 lg:py-10 gap-5 lg:gap-10">
        <div class="flex-1 inline-flex justify-end">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'fifth_section_bg_img'); ?>" class="object-contain w-full max-h-[480px] 1.5xl:h-[480px]" alt="Solution Image" loading="lazy"/>
        </div>
        <div class="flex-1 inline-flex justify-start my-auto ">
            <div class="inline-flex flex-col justify-center max-w-[500px]">
                <div class="text-theme-secondary-color text-2xl 1.5xl:text-[28px] font-medium mb-5"><?= $page_data_options['fifth_section_title'] ?></div>
                <div class="inline-flex flex-col">
                <?php if (!empty($page_data_options['solution_list'])) : ?>
                    <?php foreach ($page_data_options['solution_list']['solution_list_title'] as $uid => $title) : ?>
                        <div class="flex flex-col">
                            <a href="<?= $page_data_options['solution_list']['solution_list_link'][$uid] ?>" class="flex text-2xl 1.5xl:text-3xl text-theme-secondary-color no-underline mb-3" target="_blank">
                                <span class="flex-1"><?= $title ?></span>
                                <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.81654 11.5H22.5583H1.81654Z" fill="white"/>
                                    <path d="M1.81654 11.5H22.5583" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.1874 21.8708L22.5583 11.5L12.1874 1.12905" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-[#E5EBEC] py-5 lg:py-10">
    <div class="container-section">
        <div class=" flex flex-row bg-white p-8 rounded-3xl gap-10">
            <div class="hidden md:inline-block">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'sixth_section_bg_img'); ?>" class="object-cover w-[250px] h-[250px] rounded-3xl" alt="Hero Image" loading="lazy"/>
            </div>
            <div class="inline-flex flex-col justify-center">
                <div class="text-theme-primary-color font-semibold text-[26px] mb-3"><?= $page_data_options['sixth_section_title'] ?></div>
                <div class="mb-4"><?= $page_data_options['sixth_section_description'] ?></div>
                <div>
                    <a href="/<?= \App\Utils\SitesPage::getFirstPageSlugByTemplate('contact'); ?>" class="btn btn-primary btn-md-c btn-pill inline-flex justify-center items-center">
                        <?= $page_data_options['sixth_section_btn_lbl'] ?>
                        <svg class="pl-3" width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.81452 6.49998H11.1854" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.99997 11.6854L11.1854 6.49998L5.99997 1.31453" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $component_imagin_data_options = \Caixa\Utils\CaixaFunctions::getImaginDetails(); ?>
<script>
    document.addEventListener('caixa-imagin-detected', function(){
        const mortgageFeatureItems = document.querySelectorAll(".mortgage-feature-item");
        mortgageFeatureItems.forEach((item) => {
            item.querySelector('.feature-title').innerText = '<?= $component_imagin_data_options['imagin_title'] ?>';
            item.querySelector('.feature-description').innerText = '<?= $component_imagin_data_options['imagin_description'] ?>';
            item.querySelector('img').src = '<?= $component_imagin_data_options['imagin_img'] ?>';
        });
    });
</script>
<!-- Location section -->
<?= $this->element('location-zones'); ?>

<?= $this->element('footer'); ?>
<?= $this->render('/Preview/general/footer'); ?>
