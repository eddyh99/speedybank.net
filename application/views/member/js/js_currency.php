<script>
    function enablecurrency(cur,status){
        $.get("<?=base_url()?>homepage/setCurrency?currency="+cur+"&status="+status,function(data){
            var data=JSON.parse(data);
            if (data.error=='failed'){
                alert(data.message);
                $("#"+cur).prop('checked',true);
            }
        });
    }
</script>