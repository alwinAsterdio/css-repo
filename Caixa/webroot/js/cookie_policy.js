(function() {
    document.addEventListener('DOMContentLoaded',function(){
        const gdpr_options = gdpr.get_settings();
        if (gdpr_options.third_party_enabled) {
            const third_party_cookies_input = document.querySelector('#third-party-cookies')
            third_party_cookies_input.checked = true;
        }

        const save_cookies_btn = document.querySelector('.save-cookies');
        save_cookies_btn.addEventListener('click', function() {
            const third_party_cookies_input = document.querySelector('#third-party-cookies')
            gdpr.save_settings({ 'strictly': 1, 'third-party': third_party_cookies_input.checked });
        })
    })
})();