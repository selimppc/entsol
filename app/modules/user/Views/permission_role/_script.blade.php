<script>
    $('#select_module').change(function(){
        //alert('gg');
        $.get("{{ Route('module-based-routes')}}",
                {module: $(this).val()},
                function(data) {
                    var model = $('#route-list');
                    model.empty();
                    $.each(data, function(key, element) {
                        model.append("<option value='"+ key +"'>" + element + "</option>");
                    });

                });
    });
</script>

