<div class="box-border absolute top-0 left-0 z-50 w-full xl:p-10 headerContainer">
  <div class="box-border fixed z-50 flex items-center justify-between w-full p-3 bg-white xl:static xl:bg-transparent logo-btn">
    <!-- w-screen -->
    <img src="<?= $site_data->getLogoUrl() ?>" class="object-contain object-left h-7 w-44 xl:w-52 xl:h-9" alt="logo"/>
    <div class="flex items-center xl:fixed right-4 md:right-11">
      <a class="xl:mr-4 btn-infinity no-underline" href="/#contact-us"> Book Your Viewing</a>
      <div
        class="flex-col hidden text-[#A5A5A5] xl:flex"
      >
        <span class="font-semibold text-[13px]">
          Speak to an Agent
        </span>
        <span class="text-base font-bold"><?= $site_data->get('phone', ['default_value' => '']); ?></span>
      </div>
    </div>
  </div>
  <div class="fixed z-40 hidden bottom-8 right-10 whatsapp-icon xl:block">
    <a href="https://wa.me/<?= $site_data->get('phone'); ?>" target="_blank">
      <svg
        width="46"
        height="46"
        viewBox="0 0 46 46"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <rect x="8" y="10" width="29" height="29" fill="white" />
        <path
          d="M23.0001 0C10.3181 0 0.0001484 10.318 0.0001484 23C0.0001484 26.96 1.02315 30.854 2.96315 34.29L0.0371484 44.73C-0.0588516 45.073 0.0341485 45.441 0.282148 45.696C0.473148 45.893 0.733148 46 1.00015 46C1.08015 46 1.16115 45.99 1.24015 45.971L12.1361 43.272C15.4631 45.058 19.2101 46 23.0001 46C35.6821 46 46.0001 35.682 46.0001 23C46.0001 10.318 35.6821 0 23.0001 0ZM34.5701 31.116C34.0781 32.478 31.7181 33.721 30.5841 33.888C29.5661 34.037 28.2781 34.101 26.8641 33.657C26.0071 33.387 24.9071 33.029 23.4981 32.428C17.5751 29.902 13.7071 24.013 13.4111 23.624C13.1161 23.235 11.0001 20.463 11.0001 17.594C11.0001 14.725 12.5251 13.314 13.0671 12.73C13.6091 12.146 14.2481 12 14.6421 12C15.0361 12 15.4291 12.005 15.7741 12.021C16.1371 12.039 16.6241 11.884 17.1031 13.022C17.5951 14.19 18.7761 17.059 18.9221 17.352C19.0701 17.644 19.1681 17.985 18.9721 18.374C18.7761 18.763 18.6781 19.006 18.3821 19.347C18.0861 19.688 17.7621 20.107 17.4961 20.369C17.2001 20.66 16.8931 20.975 17.2371 21.559C17.5811 22.143 18.7661 24.052 20.5221 25.598C22.7771 27.584 24.6801 28.2 25.2701 28.492C25.8601 28.784 26.2051 28.735 26.5491 28.346C26.8931 27.956 28.0251 26.643 28.4181 26.06C28.8111 25.477 29.2051 25.573 29.7471 25.768C30.2891 25.962 33.1922 27.372 33.7822 27.664C34.3722 27.956 34.7662 28.102 34.9142 28.345C35.0622 28.587 35.0621 29.755 34.5701 31.116Z"
          fill="#0DC143"
        />
      </svg>
    </a>
  </div>
</div>
