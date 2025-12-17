<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/mansion/css/tw-blog'); ?>
<div class="blog-page">
    <div class="relative hero-section">
        <?php include __DIR__ . '/components/top-menu.php' ?>
        <div class="box-border h-[40vh] lg:h-[60vh] xl:h-[50vh] !bg-center text-white flex flex-col justify-center pt-14 !bg-cover  !bg-blend-multiply" style="background:url(<?= \App\Utils\SitesPage::getMediaOptionByKey($page_data_options, 'hero_image'); ?>),linear-gradient(180deg,rgba(26,41,48,0.25) 50%,rgba(26,41,48,0) 100%); text-shadow: 0.08em 0.08em 0.08em rgba(0,0,0,0.14);">
            <div class="box-border text-center text-lg font-extralight">
                <?= $page_data['publish_from']->format('M d, Y') ?>
            </div>
            <div class="box-border text-center text-4xl font-[Jaldi]">
                <?= $page_data['page_title'] ?>
            </div>
        </div>
    </div>
    <div class="box-border mt-10 mx-auto lg:max-w-[700px] 2xl:max-w-[1000px] px-10 md:px-20">
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
