
<script type="text/javascript">

    $("#auto-search-ac").autocomplete({
        source: "{{Route('coa-list')}}",
        minLength: 1,
        select: function( event, ui ) {
            $('#auto-search-ac').val(ui.item.value);
            $('#coa-id-val').val(ui.item.coa_id);
        }
    });

//currency :exchange rate..
    $('select[id=currency-data]').change(function () {

        var currency_id =   $(this).val();

        $.ajax({
            url: "{{Route('exchange-rate')}}",
            type: 'POST',
            data: {_token: '{!! csrf_token() !!}',currency_id: currency_id },
            success: function(data){
                $('#ex-rate').val(data);
            }
        });
    });
</script>
