(function () {
    /**
     * Monitor the escape button in order to close the lead form.
     *
     * @param {object} event The event.
     */
    function monitor_escape_btn(event){
        if (event.key === 'Escape') {
            document.removeEventListener('keydown', monitor_escape_btn);
            document.removeEventListener('click', monitor_outside_clicks);
            close_modal()
        }
    }

    /**
     * Monitor click outside the modal in order to close the lead form.
     *
     * @param {object} event The event.
     */
    function monitor_outside_clicks(event){
        if (event.target.classList.contains('modal')) {
            document.removeEventListener('click', monitor_outside_clicks);
            document.removeEventListener('keydown', monitor_escape_btn);
            close_modal()
        }
    }

    /**
     * Close modal.
     */
    function close_modal(){
        document.querySelector('.modal').classList.remove('modal--open')
        document.querySelector('body').classList.remove('modal-is-open')
    }

    document.addEventListener('DOMContentLoaded', function(event) {
        let call_back_btns = document.querySelectorAll('.request-callback')
        call_back_btns.forEach(btn => {
            btn.addEventListener('click', function(){
                document.querySelector('.modal').classList.add('modal--open')
                document.querySelector('body').classList.add('modal-is-open')


                document.addEventListener('keydown', monitor_escape_btn);
                document.addEventListener('click', monitor_outside_clicks);
            })
        })

        let agreement_elems = document.querySelectorAll('.agreement-group input')
        agreement_elems.forEach(elem => {
            elem.addEventListener('change', function(){
                if (this.checked) {
                    this.closest('form').querySelector('button').removeAttribute('disabled')
                } else {
                    this.closest('form').querySelector('button').setAttribute('disabled', true)
                }
            })
        })

        document.querySelector('.close-modal-btn').addEventListener('click', function(){
            close_modal()
        })
    });
})()