<script type="text/javascript">

    $("#auto-search-ac").autocomplete({
        source: "{{Route('coa-list-report')}}",
        minLength: 1,
        select: function( event, ui ) {
            $('#auto-search-ac').val(ui.item.value);
            $('#coa-id-val').val(ui.item.coa_title);
        }
    });

</script>
