<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/vip_portal/css/vip_admin/tw-reset-password'); ?>
<?php $username = $this->request->getData('username'); ?>
<style>
    .message.error {
        color: red;
        padding: 10px 5px;
    }
    .message.success {
        color: green;
        padding: 10px 5px;
    }
</style>
<div class="flex flex-row min-h-screen">
    <div class="w-full shadow-lg lg:w-1/3">
        <div class="flex flex-col h-screen overflow-y-auto place-items-center">
            <div class="flex flex-col items-center justify-center flex-1 w-full box-border" style="padding: 0 10% 2rem;">
                <a href="<?= \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/properties'); ?>" style="max-width:<?= $site_data_options['logo_width'] ?>px">
                    <img loading="lazy" class="mx-auto w-full block" alt="Hello, please sign into your account" src="<?= $site_data->getLogoUrl() ?>">
                </a>
                <h2 class="font-normal text-center text-black m-0 text-2xl leading-none mt-3.5 mb-6">
                    <?= $page_data_options['forgot_password_title'] ?>
                </h2>
                <div class="w-full mt-5">
                    <?= $this->Form->create(null, ['class' => 'm-0']) ?>
                    <div class="relative login-group">
                        <input type="text" name="username" id="username" class="border border-solid border-admin-primary rounded-full py-2 px-5 outline-none text-md w-full login-group__input box-border" 
                            placeholder="Username" required>
                        <label class="absolute bg-white transition-all duration-100 scale-0 -top-1 left-4 text-[10px] px-1 login-group__label">
                            Username
                        </label>
                    </div>
                    <div class="relative mt-6">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn-glow w-full']); ?>
                    </div>
                    <div class="min-h-[40px]">
                        <?= $this->Flash->render() ?>
                    </div>
                    <?= $this->Form->end() ?>
                    <div class="relative text-center mt-11">
                        <a href="<?= \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/login') . ($username ? '?username=' . urlencode($username) : '') ?>" class="text-black leading-7 no-underline transition-all duration-150 inline-block hover:text-admin-primary">
                            Back to Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative inline w-0 bg-no-repeat bg-cover lg:w-2/3" style="background-image:url('<?= \App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'background_image_for_login_and_password'); ?>');" class="bg-center bg-cover bg-no-repeat"></div>
</div>


<?= $this->render('/Preview/general/footer'); ?>

<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>

<script>
    const labels = document.querySelectorAll('.login-group__input')
    labels.forEach(element => {
        element.addEventListener('keyup',function(){
            let parent = this.closest('.login-group')
            if ( '' !== this.value ) {
                parent.querySelector('.login-group__label').classList.add('scale-100')
            } else {
                parent.querySelector('.login-group__label').classList.remove('scale-100')
            }
        })
    });
</script>