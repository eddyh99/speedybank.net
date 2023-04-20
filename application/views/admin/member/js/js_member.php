<script>
var i = 1;
$(function() {
    $('#member').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>admin/member/get_all",
            "type": "POST",
            "data": {
                csrf_freedy: $("#token").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                return data["member"];
            },
        },
        order: [
            [0, 'asc']
        ],
        "pageLength": 100,
        "columns": [{
                "mRender": function(data, type, full, meta) {
                    return i++;
                }
            }, {
                "data": "email"
            },
            {
                "data": "ucode"
            },
            {
                "data": "referral"
            },
            {
                "data": "last_login"
            },
        ]
    });
})
</script>