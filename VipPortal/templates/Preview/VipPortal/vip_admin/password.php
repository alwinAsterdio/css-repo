<?= $this->render('/Preview/general/header'); ?>
<?= $this->Html->css('/vip_portal/css/vip_admin/tw-password'); ?>
<?php $username = $_GET['username'] ?? ''; ?>
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
            <div class="flex flex-col items-center justify-center flex-1 w-full box-border"
                style="padding: 0 10% 2rem;">
                <a href="<?= \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/properties'); ?>"
                    style="max-width:<?= $site_data_options['logo_width'] ?>px">
                    <img loading="lazy" class="mx-auto w-full block" alt="Hello, please sign into your account"
                        src="<?= $site_data->getLogoUrl() ?>">
                </a>
                <h2 class="font-normal text-center text-black m-0 text-2xl leading-none mt-3.5 mb-6">
                    <?= $page_data_options['set_new_password_title'] ?>
                </h2>
                <?php if (!empty($username)): ?>
                    <div class="w-full mt-5">
                        <?= $this->Form->create(null, ['class' => 'm-0']) ?>
                        <div class="relative login-group">
                            <input type="password" name="password" id="password"
                                class="border border-solid border-admin-primary rounded-full py-2 px-5 outline-none text-md w-full login-group__input box-border"
                                placeholder="Password" required>
                            <label
                                class="absolute bg-white transition-all duration-100 scale-0 -top-1 left-4 text-[10px] px-1 login-group__label">
                                Password
                            </label>
                            <button type="button"
                                class="group absolute right-5 top-1/2 -translate-y-1/2 bg-transparent border-none outline-none h-4 w-4 p-0 hover:cursor-pointer"
                                onclick="togglePassword('password', this)">
                                <svg class="icon-open h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <path fill="#c4c4c4" class="group-hover:fill-[rgb(64,117,255)] duration-200"
                                        d="M12 4C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4m0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5m0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3">
                                    </path>
                                </svg>
                                <svg class="icon-closed hidden h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <path fill="#c4c4c4" class="group-hover:fill-[rgb(64,117,255)] duration-200"
                                        d="M12 6.5c2.76 0 5 2.24 5 5 0 .51-.1 1-.24 1.46l3.06 3.06 c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l2.17 2.17 c.47-.14.96-.24 1.47-.24M2.71 3.16a.996.996 0 0 0 0 1.41l1.97 1.97 A11.9 11.9 0 0 0 1 11.5C2.73 15.89 7 19 12 19 c1.52 0 2.97-.3 4.31-.82l2.72 2.72 a.996.996 0 1 0 1.41-1.41L4.13 3.16 c-.39-.39-1.03-.39-1.42 0M12 16.5c-2.76 0-5-2.24-5-5 0-.77.18-1.5.49-2.14l1.57 1.57 c-.03.18-.06.37-.06.57 0 1.66 1.34 3 3 3 .2 0 .38-.03.57-.07L14.14 16 c-.65.32-1.37.5-2.14.5m2.97-5.33a2.97 2.97 0 0 0-2.64-2.64z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="relative login-group mt-5">
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                class="border border-solid border-admin-primary rounded-full py-2 px-5 outline-none text-md w-full login-group__input box-border"
                                placeholder="Confirm Password" required>
                            <label
                                class="absolute bg-white transition-a8l duration-100 scale-0 -top-1 left-4 text-[10px] px-1 login-group__label">
                                Confirm Password
                            </label>
                            <button type="button"
                                class="group absolute right-5 top-1/2 -translate-y-1/2 bg-transparent border-none outline-none h-4 w-4 p-0 hover:cursor-pointer"
                                onclick="togglePassword('confirmPassword', this)">
                                <svg class="icon-open h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <path fill="#c4c4c4" class="group-hover:fill-[rgb(64,117,255)] duration-200"
                                        d="M12 4C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4m0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5m0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3">
                                    </path>
                                </svg>
                                <svg class="icon-closed hidden h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <path fill="#c4c4c4" class="group-hover:fill-[rgb(64,117,255)] duration-200"
                                        d="M12 6.5c2.76 0 5 2.24 5 5 0 .51-.1 1-.24 1.46l3.06 3.06 c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l2.17 2.17 c.47-.14.96-.24 1.47-.24M2.71 3.16a.996.996 0 0 0 0 1.41l1.97 1.97 A11.9 11.9 0 0 0 1 11.5C2.73 15.89 7 19 12 19 c1.52 0 2.97-.3 4.31-.82l2.72 2.72 a.996.996 0 1 0 1.41-1.41L4.13 3.16 c-.39-.39-1.03-.39-1.42 0M12 16.5c-2.76 0-5-2.24-5-5 0-.77.18-1.5.49-2.14l1.57 1.57 c-.03.18-.06.37-.06.57 0 1.66 1.34 3 3 3 .2 0 .38-.03.57-.07L14.14 16 c-.65.32-1.37.5-2.14.5m2.97-5.33a2.97 2.97 0 0 0-2.64-2.64z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="relative mt-6">
                            <?= $this->Form->button(__('Save'), ['class' => 'btn-glow w-full']); ?>
                        </div>
                        <div class="min-h-[40px]">
                            <?= $this->Flash->render() ?>
                        </div>
                        <?= $this->Form->end() ?>
                        <div class="relative text-center">
                            <a href="<?= \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/login') . ($username ? '?username=' . urlencode($username) : '') ?>"
                                class="text-black leading-7 no-underline transition-all duration-150 inline-block hover:text-admin-primary">
                                Back to Login
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="relative text-center w-full">
                        <p class="message error">Email is missing or invalid.</p>
                        <a href="<?= \App\Utils\SitesPage::getFirstPageUrlByTemplate('vip_admin/reset-password') . ($username ? '?username=' . urlencode($username) : '') ?>"
                            class="btn-glow w-full box-border">
                            Go Back
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="relative inline w-0 bg-no-repeat bg-cover lg:w-2/3"
        style="background-image:url('<?= \App\Utils\SitesPage::getMediaOptionByKey($site_data_options, 'background_image_for_login_and_password'); ?>');"
        class="bg-center bg-cover bg-no-repeat"></div>
</div>


<?= $this->render('/Preview/general/footer'); ?>

<?= $this->Html->script('/js/lead.js', ['defer' => true]) ?>
<?= $this->html->script('/general/js/wishlist.js'); ?>
<?= $this->Html->script('/admin/js/qoetix-cf.js'); ?>
<?= $this->html->script('/general/js/search.js'); ?>

<script>
    const labels = document.querySelectorAll('.login-group__input')
    labels.forEach(element => {
        element.addEventListener('keyup', function () {
            let parent = this.closest('.login-group')
            if ('' !== this.value) {
                parent.querySelector('.login-group__label').classList.add('scale-100')
            } else {
                parent.querySelector('.login-group__label').classList.remove('scale-100')
            }
        })
    });

    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const openIcon = button.querySelector(".icon-open");
        const closedIcon = button.querySelector(".icon-closed");

        if (input.type === "password") {
            input.type = "text";
            openIcon.classList.add("hidden");
            closedIcon.classList.remove("hidden");
        } else {
            input.type = "password";
            closedIcon.classList.add("hidden");
            openIcon.classList.remove("hidden");
        }
    }
</script>