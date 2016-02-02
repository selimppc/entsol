
<script type="text/javascript">
    $('select[id=coa-account]').change(function () {

        var coa_id =   $(this).val();

        $.ajax({
            url: "{{Route('ajax-account-code')}}",
            type: 'POST',
            data: {_token: '{!! csrf_token() !!}',coa_id: coa_id },
            success: function(data){
                $('#coa-account-code').val(data);
            }
        });
    });
</script>
