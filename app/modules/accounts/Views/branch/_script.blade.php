<script>
    function myFunction() {

        var curr_id = $('select[id=curr]').val();
        $.ajax({
            url: "{{Route('exchange-rate')}}",
            type: 'POST',
            data: {_token: '{!! csrf_token() !!}',currency_id: curr_id },
            success: function(data){
                $('#exchange_rate').val(data);
            }
        });
    }
</script>