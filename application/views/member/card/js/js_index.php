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



</script>