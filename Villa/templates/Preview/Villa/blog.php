<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/Villa/css/tw-blog'); ?>

<div class="news-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[40vh] lg:h-[60vh] xl:h-[50vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover text-4xl md:text-6xl font-extralight !bg-blend-multiply" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>),linear-gradient(180deg,rgba(26,41,48,0.25) 50%,rgba(26,41,48,0) 100%); text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.14);">
            <div class="box-border pl-[5%] mt-6 lg:pl-[10%] xl:pl-[12%] 2xl:pl-[20%]">
                <?= $page_data['page_title'] ?>
            </div>
        </div>
    </div>
    <div class="box-border mx-[5%] lg:mx-[10%] xl:mx-[12%] 2xl:mx-[20%] mt-3.5 mb-6 md:mt-10 md:mb-16 lg:my-14 2xl:my-16 news">
        <div class="text-base text-[#2d2d2d] !leading-7 news-content">
            <?= $page_data_options['blog_content'] ?>
            <div class="a2a_kit my-4 a2a_kit_size_32 a2a_default_style clear-both">
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_email"></a>
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/components/footer.php' ?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->render('/Preview/general/footer'); ?>