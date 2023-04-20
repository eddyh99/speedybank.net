<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.39/moment-timezone-with-data.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/js/main.js"></script>

<!-- Form JS -->
<script src="<?= base_url() ?>assets/js/form.js"></script>

<!-- AUTO NUMERIC -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/1.8.2/autoNumeric.js"></script>
<?php
if (isset($extra)) {
    $this->load->view($extra);
}
?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JVEK6294YT"></script>

<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-JVEK6294YT');


$(".money-input").autoNumeric('init', {
    aSep: ',',
    aDec: '.',
    aForm: true,
    vMax: '99999999999.99',
    vMin: '0.00'
});

function input(ele) {
    var amount = parseFloat(ele.value);
    $(ele).change(function() {
        if (isNaN(amount) == isNaN()) {
            $(this).val(parseFloat(0).toFixed(2));
        } else {
            var news = amount.toLocaleString("en-US", {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            $(this).val(news);
        }
    });
}
</script>

<script>
    	
    $(document).ready(function(){		
        $("#images-logo").on("change",function(){	
          const $input = $(this);
          const reader = new FileReader();
          reader.onload = function(){
            $("#image-container").attr("src", reader.result);
          }
          reader.readAsDataURL($input[0].files[0]);
        });
    });
                       
</script>
</body>

</html>