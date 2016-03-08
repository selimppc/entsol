<script type="text/javascript">

    //Menu Type :: Menu Id : Menu Name

    $('#menu-data').change(function(){
        $.get("{{ Route('menu-list') }}",
                { menu_type: $(this).val()},
                function(data) {
                   // alert(menu_type);
                    var model = $('#parent-menu-id');
                    model.empty();
                    $.each(data, function(key, element) {
                        model.append("<option value='"+ key +"'>" + element + "</option>");
                    });
                });
    });
</script>
