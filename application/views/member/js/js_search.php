<script>
$("#country").on("change", function() {
    var country = $(this).val();
    $.ajax({
        url: "<?= base_url() ?>link/getstate?country=" + country,
        success: function(response) {
            var data = JSON.parse(response);
            var select = document.getElementById("state");
            for(i = select.options.length - 1; i > 0; i--) {
                select.remove(i);
            }
            for(var i = 0; i < data.length; i++)
             {
                 var option = document.createElement("OPTION"),
                 txt = document.createTextNode(data[i].state_name);
                 option.appendChild(txt);
                 option.setAttribute("value",data[i].state_code);
                 select.insertBefore(option,select.lastChild);
             }
        },
        error: function(response) {
            alert(response);
        }
    })
});

$("#state").on("change", function() {
    var country = $("#country").val();
    var state   = $(this).val();
    $.ajax({
        url: "<?= base_url() ?>link/getcity?country=" + country+"&state="+state,
        success: function(response) {
            var data = JSON.parse(response);
            var select = document.getElementById("city");
            for(i = select.options.length - 1; i > 0; i--) {
                select.remove(i);
            }
            for(var i = 0; i < data.length; i++)
             {
                 var option = document.createElement("OPTION"),
                 txt = document.createTextNode(data[i].city_name);
                 option.appendChild(txt);
                 option.setAttribute("value",data[i].id);
                 select.insertBefore(option,select.lastChild);
             }
        },
        error: function(response) {
            alert(response);
        }
    })
});

var searchme =
    $('#tblsearchme').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>search/searchme",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val();
                d.city = $("#city").val();
                d.kategori = $("#kategori").val();
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                return data["history"];
            },
        },
        "pageLength": 100,
        "columns": [{
                "data": "business_name"
            },
            {
                "data": "googlemap",
                render: function(data, type, row) {
                    return "<a href='"+data+"' class='gmaps-search-val text-black text-decoration-underline border border-0' target='_blank'>Our Location</a>"
                }
            },
            {
                "data": "logo",
                render: function(data, type, row) {
                    return "<img src='<?=base_url()?>/qr/logo/"+data+"' class='img-fluid'>";
                }
            },
        ]
    });

$('#search').on("click", function(e) {
        e.preventDefault();
        searchme.ajax.reload();
    })
</script>