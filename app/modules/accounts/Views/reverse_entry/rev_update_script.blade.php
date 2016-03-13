<script>
    $('.bs-datepicker-component').datepicker({
        format: 'yyyy/mm/dd (D)',
        autoclose: true,
    });

    $('.bs-datepicker-example').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
    });
</script>

<script>

    $(document).ready(function()  { $(".rev-auto-search-ac").autocomplete({
        source: "{{Route('coa-list')}}",
        minLength: 1,
        select: function( event, ui ) {
            $('.rev-auto-search-ac').val(ui.item.value);
            $('.rev-coa-id-val').val(ui.item.coa_id);

        }

    });

    });



    $(document).on("focus",'#update-table tr:last-child td:last-child',function(e) {
        e.preventDefault();
        var coa_name = $('#update-table tr:last-child td:first-child input').val();

        if(coa_name != "")
        {
            //append the new row here.
            var table = $("#update-table");

            var element = '<tr>\
            <td><div> {!! Form::text('ac_title[]', Input::old('coa_id'), ['class'=>'update-auto-search-ac form-control','placeholder'=>'Search By account head or code','autofocus','title'=>'type your require account head and code']) !!}\
             </td>\
             <td class="hide-td"><div> </div></td>\
            <td><div>{!! Form::Select('branch_id[]', $branch_data, Input::old('branch_id'),['class' => 'form-control','title'=>'select branch name']) !!}</div>\
            </td>\
            <td><div>{!! Form::Select('currency_id[]', $currency_data, Input::old('currency_id'), ['class'=>'curr form-control','title'=>'select currency','onclick'=>"myFunction()"]) !!}</div>\
            </td>\
            <td>\
            <div>{!! Form::text('debit[]', Input::old('debit'), ['title'=>'enter debit', 'class' => 'form-control']) !!}</div>\
            </td>\
            <td>\
            <div>{!! Form::text('credit[]', Input::old('credit'), ['title'=>'enter credit', 'class' => 'form-control']) !!}</div>\
            </td>\
            </tr>';

            table.append(element);

            console.log($("#update-table tr:last-child").find(".update-auto-search-ac"));
            //console.log($("#table tr:last-child").find(".coa-id-val"));
            $("#update-table tr:last-child").find(".update-auto-search-ac").autocomplete({
                source: "{{Route('coa-list')}}",
                minLength: 1,
                select: function(event, ui) {

                    $('<td width="5"><div><input type="hidden" name="coa_id[]"  value=" '+ui.item.coa_id+' " ></div></td>').insertAfter($(this).closest('td'));
                    $(".hide-td").css("display", "none");
                }
            });
        }

    });



    $(".btn").popover({ trigger: "manual" , html: true, animation:false})
            .on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide");
                    }
                }, 300);
            });


    $(".form-control").tooltip();
    $('input:disabled, button:disabled').after(function (e) {
        d = $("<div>");
        i = $(this);
        d.css({
            height: i.outerHeight(),
            width: i.outerWidth(),
            position: "absolute",
        })
        d.css(i.offset());
        d.attr("title", i.attr("title"));
        d.tooltip();
        return d;
    });

</script>
