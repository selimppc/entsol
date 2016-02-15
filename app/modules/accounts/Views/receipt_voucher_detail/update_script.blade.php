<script>
    $("#update-auto-search-ac").autocomplete({
        source: "{{Route('coa-list')}}",
        minLength: 1,
        select: function( event, ui ) {
            $('#update-auto-search-ac').val(ui.item.value);
            $('#ac-coa-id-val').val(ui.item.coa_id);
        }
    });

    $('select[id=update-currency-data]').change(function () {

        var currency_id =   $(this).val();

        $.ajax({
            url: "{{Route('exchange-rate')}}",
            type: 'POST',
            data: {_token: '{!! csrf_token() !!}',currency_id: currency_id },
            success: function(data){
                $('#update-ex-rate').val(data);
            }
        });
    });
</script>
