
<link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
<style>
    .bs-datepicker-component{z-index:1151 !important;}
</style>


    <div class="modal-header">
        <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
        <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
    </div>

    <div class="modal-body">
        {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-voucher-head', $data->id]]) !!}

        @include('accounts::voucher_head._form')
        {!! Form::close() !!}
    </div>

<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="{{ URL::asset('assets/admin/js/jquery.min.js') }}">'+"<"+"/script>"); </script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>


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