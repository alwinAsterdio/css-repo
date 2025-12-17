<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/mansion/css/tw-about'); ?>
<?= $this->Html->css('/plugins/glide/glide.core.min.css'); ?>
<div class="about-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[30vh] md:h-[35vh] lg:h-[45vh] xl:h-[50vh] 2xl:h-[60vh] bg-center flex justify-center items-center" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, .66) 0, rgba(0, 0, 0, 0) 100%), url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>); background-position: 50%; background-size: cover;">
            <span class="pt-20 font-[Jaldi] text-4xl md:text-5xl text-white uppercase"><?= $page_data['page_title'] ?></span>
        </div>
    </div>
    <div class="box-border mx-[10%] 2xl:mx-[20%] my-10 lg:my-14 2xl:my-16 about">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center lg:gap-14 2xl:gap-16 box-border text-base leading-7 mb-12 content-1">
            <div class="text-[#2d2d2d]">
                <div class="font-[Jaldi] text-4xl text-black mb-3 title">
                    <?= $page_data_options['about_team_title'] ?>
                </div>
                <div class="text-lg"><?= $page_data_options['about_content_1'] ?></div>
            </div>
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_team_image_1'); ?>" class="h-full min-h-[40vh] object-cover w-full" alt="team-img">
        </div>
        <div class="text-[#2d2d2d] grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 2xl:gap-16 items-center box-border text-base leading-7 content-2">
            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'about_team_image_2'); ?>" class="h-full min-h-[40vh] object-cover w-full order-last lg:order-first" alt="team-img">
            <div class="text-lg">
                <?= $page_data_options['about_content_2'] ?>
            </div>
        </div>
    </div>

    <?php if (!empty($page_data_options['services_list'])) : ?>
            <?php ksort($page_data_options['services_list']['service_title']); ?>
            <div class="grid grid-cols-4 pt-10 gap-10">
                <?php foreach ($page_data_options['services_list']['service_title'] as $uid => $title) : ?>
                    <div class="flex flex-col gap-3">
                        <div>
                            <img src="<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options['services_list']['service_icon'], $uid); ?>" class="h-[55px]" loading="lazy"/>
                        </div>
                        <div class="text-white text-xl text-medium"><?= $title ?></div>
                        <div class="text-white text-base text-medium"><?= $page_data_options['services_list']['service_description'][$uid] ?></div>
                        <div>
                            <a href="<?= $page_data_options['services_list']['service_url'][$uid] ?>" class="inline-block btn btn-tertiary no-underline focus:no-underline btn-sm"><?= $page_data_options['services_list']['service_btn_label'][$uid] ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    <?php endif; ?>


<!-- Clients Review -->
<?php if (!empty($page_data_options['client_reviews_list'])) : ?>
    <div class="px-16 max-w-[800px] xl:max-w-[1000px] mx-auto clients-review-section">
        <div class="relative w-full xl:w-[1000px] xl:mx-auto mb-8">
            <div class="text-3xl mb-3 text-center font-[Jaldi] font-medium"><?= $page_data_options['clients_review_title'] ?></div>
            <div class="glide glide-client-reviews">
                <div class="glide__track pb-5" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php foreach ($page_data_options['client_reviews_list']['client_name'] as $uid => $title) : ?>
                            <li class="glide__slide flex flex-col gap-10">
                                <div>
                                    <div class="text-theme-primary-color text-3xl font-medium"><?= $title ?></div>
                                    <div class="py-5">
                                        <span class="text-lg font-bold text-[#666]">Location: </span>
                                        <span class="text-lg"><?= $page_data_options['client_reviews_list']['client_location'][$uid] ?></span>
                                    </div>
                                    <div class="text-lg text-[#666] italic"><?= $page_data_options['client_reviews_list']['client_description'][$uid] ?></div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="glide__arrows flex absolute w-full top-1/2 -translate-y-1/2" data-glide-el="controls">
                    <div class="glide__arrow absolute left-[-50px] bg-theme-primary-color inline-flex justify-center items-center text-[40px] text-white w-[40px] h-[40px] rounded-full pb-[10px] hover:cursor-pointer glide__arrow--left" data-glide-dir="<">‹</div>
                    <div class="glide__arrow absolute right-[-50px] bg-theme-primary-color inline-flex justify-center items-center text-[40px] text-white w-[40px] h-[40px] rounded-full pb-[10px] hover:cursor-pointer glide__arrow--right" data-glide-dir=">">›</div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


    <div class="py-10 xl:py-12 bg-[#f0efef]">
        <div class="mb-6 text-3xl px-[8%] text-center font-[Jaldi] font-medium title">
            <?= $page_data_options['contact_form_title'] ?>
        </div>
        <div class="px-[12%] lg:px-[15%] xl:px-[22%] 2xl:px-[27%]">
            <form id="about-us-form" action="" class="enquiry-form grid grid-cols-2 gap-4" integration-recaptcha=true data-action="lead_form">
                <div class='hidden'>
                    <?= \App\Utils\Leads::loadDefaultRequiredFields(['form_name' => $page_data_options['contact_form_title']]); ?>
                </div>
                <div class="form-group col-span-2">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border" name="full_name" id="full_name" placeholder="<?= $page_data_options['contact_form_name'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-1">
                    <input type="email" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border" name="email" id="email" placeholder="<?= $page_data_options['contact_form_email'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group  col-span-1">
                    <input type="text" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border required-field" name="phone" id="phone" placeholder="<?= $page_data_options['contact_form_phone'] ?>">
                    <div class="form-group__helper"></div>
                </div>
                <div class="form-group col-span-2">
                    <textarea id="message" name="message" cols="30" rows="10" class="w-full border border-solid border-[#A19E99] border-opacity-50 px-3 py-3.5 box-border required-field" placeholder="<?= $page_data_options['contact_form_message'] ?>"></textarea>
                    <div class="form-group__helper"></div>
                </div>
                <div class="col-span-2">
                    <button class="mt-3 btn btn-primary w-full min-[540px]:w-auto" type="submit" id="about-us-btn" onClick="javascript:submit_lead_form({obj: this, form_id: 'about-us-form'})">
                    <?= $page_data_options['contact_form_btn'] ?>
                </button>
                </div>
                <div class="generic-helper col-span-2"></div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/components/footer.php' ?>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>
<script>
    document.addEventListener('DOMContentLoaded',function(){
        let glide_element = document.querySelector('.glide-client-reviews')
        if ( glide_element !== null && !glide_element.classList.contains('glide--loaded')) {
            new Glide('.glide-client-reviews', {
                type: 'carousel',
                startAt: 0,
                perView: 1,
                gap: 10,
                breakpoints: {
                    425: {
                        perView: 1
                    }
                }
            }).mount()
            glide_element.classList.add('glide--loaded')
        }
    })
</script>
<?= $this->html->script('/plugins/glide/glide.min.js'); ?>
