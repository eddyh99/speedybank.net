<script>
    $('#activecurrency').on("change", function() {
        window.location.replace('homepage?cur=' + $(this).val())
    })
    $(function() {
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];

        var currentMonth = moment().month();
        var currentYear = moment().year();

        var start = moment().subtract(29, 'days'); // Subtract 29 days from today
        var end = moment(); // Today

        var dateRange = {};
        dateRange["Today"] = [moment(), moment()];
        dateRange["Yesterday"] = [moment().subtract(1, 'days'), moment()];
        dateRange["Last 7 Days"] = [moment().subtract(7, 'days'), moment()];
        dateRange["Last 30 Days"] = [moment().subtract(29, 'days'), moment()];

        $('#tgl').daterangepicker({
            startDate: end,
            endDate: end,
            ranges: dateRange,
            minDate: moment().subtract(90, 'days'),
            maxDate: moment(),
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
    })

    $('#tgl').on("change", function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>history/gethistory",
            method: "post",
            data: $("#frmhistory").serialize(),
            success: function(response) {
                var data = JSON.parse(response);
                $("#history").html(data.message);
                $("#token").val(data.token);
            },
            error: function(xhr, status, error) {
                var data = JSON.parse(xhr.responseText);
                $("#token").val(data.token);
                alert(data.message);
            }
        });
    })

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