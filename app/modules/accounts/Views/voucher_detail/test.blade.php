<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Autocomplete functionality</title>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>

    <!-- Javascript -->
</head>
<body>
<!-- HTML -->
<label for="search">Search: </label>
<input id="search" />
<input id="searchval" />
<script>
    $.widget( "custom.catcomplete", $.ui.autocomplete, {
        _renderMenu: function( ul, items ) {
            var self = this,
                    currentCategory = "";
            $.each( items, function( index, item ) {
                if ( item.category != currentCategory ) {
                    ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                    currentCategory = item.category;
                }
                self._renderItem( ul, item );
            });
        }
    });
    $(function() {
        /*var data = [
            { label: "anders", id: "1", category: "" },
            { label: "andreas", id: "2", category: "" },
            { label: "antal", id: "3", category: "" },
            { label: "annhhx10", id: "4", category: "Products" },
            { label: "annk K12", id: "5", category: "Products" },
            { label: "annttop C13", id: "6", category: "Products" },
            { label: "anders andersson", id: "7", category: "People" },
            { label: "andreas andersson", id: "8", category: "People" },
            { label: "andreas johnson", id: "9", category: "People" }
        ];*/

        $( "#search" ).catcomplete({
            delay: 0,
            source: "{{Route('coa-list')}}",
            select: function(event, ui) {
                $('#searchval').val(ui.item.label);
            }

        });
    });
</script>
</body>
</html>