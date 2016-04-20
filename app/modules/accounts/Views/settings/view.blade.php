<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body" id="asdf">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">Type</th>
                <td>{{ isset($data->type)?ucfirst($data->type):''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Code</th>
                <td>{{ isset($data->code)?$data->code:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Title</th>
                <td>{{ isset($data->title)?ucfirst($data->title):''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Last Number</th>
                <td>{{ isset($data->last_number)?$data->last_number:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Increment</th>
                <td>{{ isset($data->increment)?$data->increment:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Status</th>
                <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="modal-footer">
    <a href="{{ URL::previous()}}" class="btn btn-default" type="button" data-placement="top" data-content="click close button for close this entry form" onclick="close_modal();"> Close </a>
</div>

<script>
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


   /*function ChangeUrl(page,url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = { Page: page, Url: url };
            //history.pushState(obj, obj.Page, obj.Url);
            //window.history.pushState(obj, obj.Page, obj.Url);
            //window.history.replaceState(obj, obj.Page, obj.Url);
            //window.location.href = url;
        } else {
            alert("Browser does not support HTML5.");
        }
    }
    $(function () {
        $("#abc").click(function () {
            ChangeUrl('Page1', '{{ URL::previous()}}');
        });

    });*/

    /*function updateURL()
    {
        if (history.pushState) {
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?para=hello';
            //alert(newurl);
            window.history.pushState('{{ URL::previous()}}','',newurl);
        }
    }*/

    /*$('document').ready(function()
    {
        var state = document.readyState;
        alert(state);
        if (state == 'interactive') {
            document.getElementById('asdf').style.visibility="hidden";
        } else if (state == 'complete') {
            setTimeout(function(){alert(5678);
                document.getElementById('interactive');
                document.getElementById('load').style.visibility="hidden";
                document.getElementById('asdf').style.visibility="visible";
            },1000);
        }
    });
*/

function close_modal(){
    document.getElementById('etsbModal').style.visibility="hidden";
}

</script>




