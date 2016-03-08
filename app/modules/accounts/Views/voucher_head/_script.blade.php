<style>
    table tr td{
        padding-right: 0;
        padding-left: 0;
        padding: -3px;
    }
    table tr td input, table tr td select{
        width: 100%;
        padding: 2px;
    }
    .form-group{
        margin-bottom: 0px;
    }
    .form-group input, .form-group select, .form-group textarea{
        width: 100%;
        padding: 2px;
    }
    .ui-autocomplete {
        position: relative;
    }
</style>



<script>

    $(function() { $(".auto-search-ac").autocomplete({
        source: "{{Route('coa-list')}}",
        minLength: 1,
        select: function( event, ui ) {
            $('.auto-search-ac').val(ui.item.value);
            $('.coa-id-val').val(ui.item.coa_id);

        }

    });

    });



    $(document).on("focus",'#table tr:last-child td:last-child',function(e) {

        e.preventDefault();
        //append the new row here.
        var table = $("#table");
        var element = '<tr>\
		<td><div> {!! Form::text('ac_title[]', Input::old('coa_id'), ['class'=>'ac-auto-search-ac','placeholder'=>'Search By account head or code','autofocus','title'=>'type your require account head and code']) !!}\
         </td>\
         <td class="hide-td"><div> </div></td>\
		<td><div>{!! Form::Select('branch_id[]', $branch_data, Input::old('branch_id'),['required','title'=>'select branch name']) !!}</div>\
		</td>\
		<td><div>{!! Form::Select('currency_id[]', $currency_data, Input::old('currency_id'), ['class'=>'curr','required','onclick'=>"myFunction()"]) !!}</div>\
		</td>\
		<td>\
		<div>{!! Form::text('debit[]', Input::old('debit'), ['title'=>'enter debit']) !!}</div>\
		</td>\
		<td>\
		<div>{!! Form::text('credit[]', Input::old('credit'), ['title'=>'enter credit']) !!}</div>\
		</td>\
		</tr>';

        table.append(element);

        console.log($("#table tr:last-child").find(".ac-auto-search-ac"));
        //console.log($("#table tr:last-child").find(".coa-id-val"));
        $("#table tr:last-child").find(".ac-auto-search-ac").autocomplete({
            source: "{{Route('coa-list')}}",
            minLength: 1,
            select: function(event, ui) {

                $('<td width="5"><div><input type="hidden" name="coa_id[]"  value=" '+ui.item.coa_id+' " ></div></td>').insertAfter($(this).closest('td'));
                $(".hide-td").css("display", "none");
            }
        });



    });

    /*
     function myFunction() {

     var curr_id = $('select[class=curr]').val();

     $.ajax({
     url: "{{--{{Route('exchange-rate')}}--}}",
     type: 'POST',
     data: {_token: '{!! csrf_token() !!}',currency_id: curr_id },
     success: function(data){
     $('#rate-of-ex').val(data);
     }
     });
     }*/

</script>