
<script type="text/javascript">

    //Coa: account code
    init.push(function () {
        // Single select
        $("#coa_id").select2({
            allowClear: true,
            placeholder: "Select A Chart Of Account"
        });

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
