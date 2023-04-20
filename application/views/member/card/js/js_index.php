<script src="<?= base_url() ?>assets/vendor/intl-tel-input-master/build/js/intlTelInput.js"></script>

<script>
    var inputTel = document.querySelector("#telephone");

    window.intlTelInput(inputTel, {
        autoHideDialCode:false,
        formatOnDisplay: false,
        hiddenInput: "full_number",
        nationalMode: false,
        preferredCountries: ['id', 'us', 'it'],
        utilsScript: "<?= base_url() ?>assets/vendor/intl-tel-input-master/build/js/utils.js"
    });

    var inputTelCard = document.querySelector("#telphonecard");

    window.intlTelInput(inputTelCard, {
        autoHideDialCode:false,
        formatOnDisplay: false,
        hiddenInput: "full_number",
        nationalMode: false,
        preferredCountries: ['id', 'us', 'it'],
        utilsScript: "<?= base_url() ?>assets/vendor/intl-tel-input-master/build/js/utils.js"
    });

    $("#togglePassword").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $("#togglePassword2").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });



    // Start Open Eye in Member Card Already
    const toogleEye = document.getElementById('eye-toggle');
    const textSecret = document.getElementById('text-secret');

    toogleEye.addEventListener('click', function(e) {
        const type = textSecret.getAttribute('type') === 'password' ? 'text' : 'password';
        textSecret.setAttribute('type', type);

        this.classList.toggle('ri-eye-off-line');
    });

    const toogleEye2 = document.getElementById('eye-toggle2');
    const textSecret2 = document.getElementById('text-secret2');

    toogleEye2.addEventListener('click', function(e) {
        const type = textSecret2.getAttribute('type') === 'password' ? 'text' : 'password';
        textSecret2.setAttribute('type', type);

        this.classList.toggle('ri-eye-off-line');
    });
    // End Open Eye in Member Card Already


</script>