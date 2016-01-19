@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')
    {{--Form components /Layouts--}}
    <div class="page-header">
        <h1><span class="text-light-gray">Form components / </span>Layouts</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <!-- 5. $INLINE_FORM ===============================================================================

                            Inline form
            -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Inline form</span>
                </div>
                <div class="panel-body">
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="px"> <span class="lbl">Remember me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
            <!-- /5. $INLINE_FORM -->

        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">

            <!-- 6. $HORIZONTAL_FORM ===========================================================================

                            Horizontal form
            -->
            <form action="#" class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">Horizontal form</span>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- /6. $HORIZONTAL_FORM -->

            <!-- 7. $NO_LABEL_FORM =============================================================================

                            No label form
            -->
            <form action="#" class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">No label form</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name" placeholder="Name" class="form-control form-group-margin">
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" placeholder="Email" class="form-control form-group-margin">
                        </div>
                        <div class="col-md-4">
                            <input type="url" name="website" placeholder="Website" class="form-control form-group-margin">
                        </div>
                    </div><!-- row -->
                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Send message</button>
                </div>
            </form>
            <!-- /7. $NO_LABEL_FORM -->

        </div>
        <div class="col-sm-6">

            <!-- 8. $BORDERED_FORM =============================================================================

                            Bordered form
            -->
            <form action="#" class="panel form-horizontal form-bordered">
                <div class="panel-heading">
                    <span class="panel-title">Bordered form</span>
                </div>
                <div class="panel-body no-padding-hr">
                    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                        <div class="row">
                            <label class="col-sm-4 control-label">Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group no-margin-hr no-margin-b panel-padding-h">
                        <div class="row">
                            <label class="col-sm-4 control-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- /8. $BORDERED_FORM -->

            <!-- 9. $BLOCK_STYLED_FORM =============================================================================

                            Block styled form
            -->
            <form action="#" class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">Block styled form</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control">
                            </div>
                        </div><!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control">
                            </div>
                        </div><!-- col-sm-6 -->
                    </div><!-- row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div><!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Website</label>
                                <input type="url" name="website" class="form-control">
                            </div>
                        </div><!-- col-sm-6 -->
                    </div><!-- row -->
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Send</button>
                </div>
            </form>
            <!-- /9. $BLOCK_STYLED_FORM -->

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <!-- 10. $FORM_EXAMPLE =============================================================================

                            Form example
            -->
            <form class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">Form example</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputEmail2" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail2" placeholder="Email">
                        </div>
                    </div> <!-- / .form-group -->
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div> <!-- / .form-group -->
                    <div class="form-group">
                        <label for="asdasdas" class="col-sm-2 control-label">Text</label>
                        <div class="col-sm-10">
                            <textarea class="form-control"></textarea>
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div> <!-- / .form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Text</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" class="px" checked="">
                                    <span class="lbl">Option one is this and that—be sure to include why it's great</span>
                                </label>
                            </div> <!-- / .radio -->
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" class="px">
                                    <span class="lbl">Option two can be something else and selecting it will deselect option one</span>
                                </label>
                            </div> <!-- / .radio -->
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2-2" value="option2" class="px">
                                    <span class="lbl">Option three</span>
                                </label>
                            </div> <!-- / .radio -->
                        </div> <!-- / .col-sm-10 -->
                    </div> <!-- / .form-group -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="px"> <span class="lbl">Remember me</span>
                                </label>
                            </div> <!-- / .checkbox -->
                        </div>
                    </div> <!-- / .form-group -->
                    <div class="form-group" style="margin-bottom: 0;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div> <!-- / .form-group -->
                </div>
            </form>
            <!-- /10. $FORM_EXAMPLE -->

        </div>
    </div>
    {{--Form components /Layouts:: Ends--}}

    {{--Form components /General--}}
    <div class="page-header">
        <h1><span class="text-light-gray">Form components / </span>General</h1>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <!-- 5. $CONTROLS ==================================================================================

                            Controls
            -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Controls</span>
                </div>
                <table class="table" id="inputs-table">
                    <thead>
                    <th>Control</th>
                    <th>Default</th>
                    <th>Disabled</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Inputs
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Text input">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Text input" disabled="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Textarea
                        </td>
                        <td>
                            <textarea class="form-control" rows="3"></textarea>
                        </td>
                        <td>
                            <textarea class="form-control" rows="3" disabled=""></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Checkboxes
                        </td>
                        <td>
                            <div class="checkbox" style="margin: 0;">
                                <label>
                                    <input type="checkbox" value="" class="px">
                                    <span class="lbl">Option one</span>
                                </label>
                            </div> <!-- / .checkbox -->
                        </td>
                        <td>
                            <div class="checkbox" style="margin: 0;">
                                <label>
                                    <input type="checkbox" value="" disabled="" class="px">
                                    <span class="lbl">Option one</span>
                                </label>
                            </div> <!-- / .checkbox -->
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Inline checkboxes
                        </td>
                        <td>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1" class="px"> <span class="lbl">1</span>
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" value="option2" checked="" class="px"> <span class="lbl">2</span>
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="option3" class="px"> <span class="lbl">3</span>
                            </label>
                        </td>
                        <td>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox11" value="option1" disabled="" class="px"> <span class="lbl">1</span>
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox21" value="option2" checked="" disabled="" class="px"> <span class="lbl">2</span>
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox31" value="option3" disabled="" class="px"> <span class="lbl">3</span>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Radios
                        </td>
                        <td>
                            <div class="radio" style="margin-top: 0;">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" class="px">
                                    <span class="lbl">Option one</span>
                                </label>
                            </div> <!-- / .radio -->
                            <div class="radio" style="margin-bottom: 0;">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" class="px">
                                    <span class="lbl">Option two</span>
                                </label>
                            </div> <!-- / .radio -->
                        </td>
                        <td>
                            <div class="radio" style="margin-top: 0;">
                                <label>
                                    <input type="radio" name="optionsRadios2" id="optionsRadios3" value="option3" checked="" disabled="" class="px">
                                    <span class="lbl">Option one</span>
                                </label>
                            </div> <!-- / .radio -->
                            <div class="radio" style="margin-bottom: 0;">
                                <label>
                                    <input type="radio" name="optionsRadios2" id="optionsRadios4" value="option4" disabled="" class="px">
                                    <span class="lbl">Option two</span>
                                </label>
                            </div> <!-- / .radio -->
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Selects
                        </td>
                        <td>
                            <select class="form-control form-group-margin">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                            <select multiple class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-group-margin" disabled="">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                            <select multiple class="form-control" disabled="">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /5. $CONTROLS -->

        </div>
    </div>
    {{--Form components /General:: Ends--}}

    {{--Form components /Advanced--}}

    <div class="page-header">
        <h1><span class="text-light-gray">Form components / </span>Advanced</h1>
    </div> <!-- / .page-header -->

    <div class="row">
        <div class="col-md-12">

            <!-- 5. $SWITCHERS =================================================================================

                            Switchers
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $('#switcher-example-1').switcher();

                    $('#switcher-example-2').switcher({
                        theme: 'square',
                        on_state_content: '<span class="fa fa-check"></span>',
                        off_state_content: '<span class="fa fa-times"></span>'
                    });

                    $('#switcher-example-3').switcher({
                        theme: 'modern'
                    });

                    // Colors
                    $('#switchers-colors-default > input').switcher();
                    $('#switchers-colors-square > input').switcher({ theme: 'square' });
                    $('#switchers-colors-modern > input').switcher({ theme: 'modern' });

                    // Sizes
                    $('#switchers-sizes .switcher-example-default').switcher();
                    $('#switchers-sizes .switcher-example-square').switcher({ theme: 'square' });
                    $('#switchers-sizes .switcher-example-modern').switcher({ theme: 'modern' });

                    // Disabled state
                    $('#switcher-disabled-default').switcher();
                    $('#switcher-disabled-square').switcher({ theme: 'square' });
                    $('#switcher-disabled-modern').switcher({ theme: 'modern' });

                    $('#switcher-enable-all').click(function () {
                        $('#switchers-disabled input').switcher('enable');
                    });

                    $('#switcher-disable-all').click(function () {
                        $('#switchers-disabled input').switcher('disable');
                    });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Switchers</span>
                </div>
                <div class="panel-body" id="switcher-examples">
                    <div>
                        <div class="switcher"><input type="checkbox" id="switcher-example-1"><div class="switcher-toggler"></div>
                            <div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-theme-square checked">
                            <input type="checkbox" id="switcher-example-2" checked="checked">
                            <div class="switcher-toggler"></div>
                            <div class="switcher-inner">
                                <div class="switcher-state-on"><span class="fa fa-check"></span></div>
                                <div class="switcher-state-off"><span class="fa fa-times"></span></div>
                            </div>
                        </div>&nbsp;&nbsp;
                        <div class="switcher switcher-theme-modern">
                            <input type="checkbox" id="switcher-example-3">
                            <div class="switcher-toggler"></div><div class="switcher-inner">
                                <div class="switcher-state-on">ON</div>
                                <div class="switcher-state-off">OFF</div>
                            </div>
                        </div>
                    </div>

                    <hr class="panel-wide">

                    <!-- Colors -->
                    <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">COLORS</h6>

                    <div id="switchers-colors-default" class="form-group-margin">
                        <div class="switcher switcher-primary checked"><input type="checkbox" data-class="switcher-primary" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-success checked"><input type="checkbox" data-class="switcher-success" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-warning checked"><input type="checkbox" data-class="switcher-warning" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-danger checked"><input type="checkbox" data-class="switcher-danger" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-info checked"><input type="checkbox" data-class="switcher-info" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>
                    </div>
                    <div id="switchers-colors-square" class="form-group-margin">
                        <div class="switcher switcher-theme-square switcher-primary checked"><input type="checkbox" data-class="switcher-primary" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-theme-square switcher-success checked"><input type="checkbox" data-class="switcher-success" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-theme-square switcher-warning checked"><input type="checkbox" data-class="switcher-warning" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-theme-square switcher-danger checked"><input type="checkbox" data-class="switcher-danger" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;
                        <div class="switcher switcher-theme-square switcher-info checked"><input type="checkbox" data-class="switcher-info" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>
                    </div>
                    <div id="switchers-colors-modern">
                        <div class="switcher switcher-theme-modern switcher-primary checked"><input type="checkbox" data-class="switcher-primary" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;&nbsp;
                        <div class="switcher switcher-theme-modern switcher-success checked"><input type="checkbox" data-class="switcher-success" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;&nbsp;
                        <div class="switcher switcher-theme-modern switcher-warning checked"><input type="checkbox" data-class="switcher-warning" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;&nbsp;
                        <div class="switcher switcher-theme-modern switcher-danger checked"><input type="checkbox" data-class="switcher-danger" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>&nbsp;&nbsp;&nbsp;
                        <div class="switcher switcher-theme-modern switcher-info checked"><input type="checkbox" data-class="switcher-info" checked="checked"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on">ON</div><div class="switcher-state-off">OFF</div></div></div>
                    </div>

                    <hr class="panel-wide">

                    <!-- Sizes -->
                    <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">SIZES</h6>

                    <div id="switchers-sizes">
                        <div class="form-group-margin">
                            <div class="switcher switcher-lg">
                                <input type="checkbox" data-class="switcher-lg" class="switcher-example-default">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;
                            <div class="switcher switcher-theme-square switcher-lg">
                                <input type="checkbox" data-class="switcher-lg" class="switcher-example-square">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="switcher switcher-theme-modern switcher-lg">
                                <input type="checkbox" data-class="switcher-lg" class="switcher-example-modern">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-margin">
                            <div class="switcher">
                                <input type="checkbox" class="switcher-example-default">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;
                            <div class="switcher switcher-theme-square">
                                <input type="checkbox" class="switcher-example-square">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="switcher switcher-theme-modern">
                                <input type="checkbox" class="switcher-example-modern">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="switcher switcher-sm">
                                <input type="checkbox" data-class="switcher-sm" class="switcher-example-default">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;
                            <div class="switcher switcher-theme-square switcher-sm">
                                <input type="checkbox" data-class="switcher-sm" class="switcher-example-square">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="switcher switcher-theme-modern switcher-sm">
                                <input type="checkbox" data-class="switcher-sm" class="switcher-example-modern">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="panel-wide">

                    <!-- Disabled state -->
                    <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">DISABLED STATE</h6>

                    <div id="switchers-disabled">
                        <div class="form-group-margin">
                            <div class="switcher disabled">
                                <input type="checkbox" id="switcher-disabled-default" disabled="disabled">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;
                            <div class="switcher switcher-theme-square disabled checked">
                                <input type="checkbox" id="switcher-disabled-square" checked="checked" disabled="disabled">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="switcher switcher-theme-modern disabled">
                                <input type="checkbox" id="switcher-disabled-modern" disabled="disabled">
                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-success btn-sm" id="switcher-enable-all">Enable</button>&nbsp;&nbsp;
                            <button class="btn btn-danger btn-sm" id="switcher-disable-all">Disable</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /5. $SWITCHERS -->

            <!-- 6. $STYLED_CHECKBOXES_AND_RADIOS ==============================================================

                            Styled checkboxes and radios
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $('#styled-ch-btn').on('click', function () {
                        var $c = $(this).parent().find('input[type="checkbox"]');
                        $c.each(function () {
                            var $p  = $(this).parent(),
                                    $el = $(this).detach().addClass('px'),
                                    t   = $p.text().trim();

                            $p.html('');
                            $p.append($el);
                            $p.append($('<span class="lbl">' + t + '</span>'));
                        });
                        $(this).remove();
                    });

                    $('#styled-r-btn').on('click', function () {
                        var $r = $(this).parent().find('input[type="radio"]');
                        $r.each(function () {
                            var $p  = $(this).parent(),
                                    $el = $(this).detach().addClass('px'),
                                    t   = $p.text().trim();

                            $p.html('');
                            $p.append($el);
                            $p.append($('<span class="lbl">' + t + '</span>'));
                        });
                        $(this).remove();
                    });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Styled checkboxeds and radios</span>
                </div>
                <div class="panel-body no-padding-t">

                    <!-- Checkboxes -->
                    <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">CHECKBOXES</h6>

                    <!-- Checkbox styling -->
                    <p>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="px">
                            <span class="lbl">One</span>
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="px" checked="checked">
                            <span class="lbl">Two</span>
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="px">
                            <span class="lbl">Three</span>
                        </label>
                    </p>
                    <hr>
                    <!-- Checkbox styling on button click -->
                    <p>
                        <label class="checkbox-inline"><input type="checkbox"> One</label>
                        <label class="checkbox-inline"><input type="checkbox" checked="checked"> Two</label>
                        <label class="checkbox-inline"><input type="checkbox"> Three</label>
                        <br><br>
                        <button class="btn btn-xs" id="styled-ch-btn">Add some magic</button>
                    </p>

                    <hr class="panel-wide">

                    <!-- Radios -->
                    <h6 class="text-light-gray text-semibold text-xs" style="margin:20px 0 10px 0;">RADIOS</h6>

                    <!-- Radio styling -->
                    <p>
                        <label class="radio">
                            <input type="radio" name="styled-r1" class="px">
                            <span class="lbl">One</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="styled-r1" class="px" checked="checked">
                            <span class="lbl">Two</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="styled-r1" class="px">
                            <span class="lbl">Three</span>
                        </label>
                    </p>
                    <hr>
                    <!-- Radio styling on button click -->
                    <p>
                        <label class="radio"><input type="radio" name="styled-r2"> One</label>
                        <label class="radio"><input type="radio" name="styled-r2" checked="checked"> Two</label>
                        <label class="radio"><input type="radio" name="styled-r2"> Three</label>
                        <button class="btn btn-xs" id="styled-r-btn">Add some magic</button>
                    </p>

                    <hr class="panel-wide">

                    <div class="note">
                        Also you can create single checkbox/radio without text label (see source code).
                    </div>

                    <p>
                        <label class="px-single"><input type="checkbox" name="" value="" class="px"><span class="lbl"></span></label>
                        &nbsp;&nbsp;&nbsp;
                        <label class="px-single"><input type="checkbox" name="" value="" class="px"><span class="lbl"></span></label>
                        &nbsp;&nbsp;&nbsp;
                        <label class="px-single"><input type="checkbox" name="" value="" class="px"><span class="lbl"></span></label>
                    </p>

                    <div>
                        <label class="px-single"><input type="radio" name="single-radio" value="" class="px"><span class="lbl"></span></label>
                        &nbsp;&nbsp;&nbsp;
                        <label class="px-single"><input type="radio" name="single-radio" value="" class="px"><span class="lbl"></span></label>
                        &nbsp;&nbsp;&nbsp;
                        <label class="px-single"><input type="radio" name="single-radio" value="" class="px"><span class="lbl"></span></label>

                    </div>

                </div>
            </div>
            <!-- /6. $STYLED_CHECKBOXEDS_AND_RADIOS -->

            <!-- 7. $JQUERY_CHARACTER_LIMIT ====================================================================

                            jQuery Character limit
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $("#character-limit-input").limiter(20, { label: '#character-limit-input-label' });
                    $("#character-limit-textarea").limiter(100, { label: '#character-limit-textarea-label' });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">jQuery Character limit</span>
                </div>
                <div class="panel-body">
                    <input type="text" id="character-limit-input" class="form-control" maxlength="20">
                    <div id="character-limit-input-label" class="limiter-label form-group-margin">Characters left: <span class="limiter-count">20</span></div>

                    <textarea id="character-limit-textarea" rows="3" class="form-control"></textarea>
                    <div id="character-limit-textarea-label" class="limiter-label">Characters left: <span class="limiter-count">100</span></div>
                </div>
            </div>
            <!-- /7. $JQUERY_CHARACTER_LIMIT -->

            <!-- 8. $JQUERY_EXPANDING_INPUTS ===================================================================

                            jQuery Expanding inputs
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $("#jq-expanding-input").expandingInput({
                        target: 'input[type="text"]',
                        hidden_content: '> div',
                        placeholder: 'Input example'
                    });
                    $("#jq-expanding-textarea").expandingInput({
                        target: 'textarea',
                        hidden_content: '> div',
                        placeholder: 'Textarea example'
                    });

                    // Sizes

                    $("#jq-expanding-input-sm").expandingInput({
                        target: 'input[type="text"]',
                        hidden_content: '> div',
                        placeholder: 'Small input'
                    });
                    $("#jq-expanding-input-default").expandingInput({
                        target: 'input[type="text"]',
                        hidden_content: '> div',
                        placeholder: 'Default input'
                    });
                    $("#jq-expanding-input-lg").expandingInput({
                        target: 'input[type="text"]',
                        hidden_content: '> div',
                        placeholder: 'Large input'
                    });

                    // Callbacks

                    $("#jq-expanding-input-callbacks").expandingInput({
                        target: 'textarea',
                        hidden_content: '> div',
                        placeholder: 'Resize textarea on expand',
                        onBeforeExpand: function () {
                            console.log('onBeforeExpand callback');
                        },
                        onAfterExpand: function () {
                            console.log('onAfterExpand callback');
                            this.$target.attr('rows', 4);
                        }
                    });
                });
            </script>
            <!-- / Javascript -->

            <!-- /8. $JQUERY_EXPANDING_INPUTS -->

        </div>
        <div class="col-md-6">

            <!-- 9. $JQUERY_SELECT2 ============================================================================

                            jQuery Select2
            -->
            <!-- Javascript -->
            <script>
                function movieFormatResult(movie) {
                    var markup = "<table class='movie-result'><tr>";
                    if (movie.posters !== undefined && movie.posters.thumbnail !== undefined) {
                        markup += "<td class='movie-image' style='vertical-align: top'><img src='" + movie.posters.thumbnail + "' style='max-width: 60px; display: inline-block; margin-right: 10px; margin-left: 10px;' /></td>";
                    }
                    markup += "<td class='movie-info'><div class='movie-title' style='font-weight: 600; color: #000; margin-bottom: 6px;'>" + movie.title + "</div>";
                    if (movie.critics_consensus !== undefined) {
                        markup += "<div class='movie-synopsis'>" + movie.critics_consensus + "</div>";
                    }
                    else if (movie.synopsis !== undefined) {
                        markup += "<div class='movie-synopsis'>" + movie.synopsis + "</div>";
                    }
                    markup += "</td></tr></table>";
                    return markup;
                }

                function movieFormatSelection(movie) {
                    return movie.title;
                }

                init.push(function () {
                    // Single select
                    $("#jquery-select2-example").select2({
                        allowClear: true,
                        placeholder: "Select a State"
                    });

                    // Multiselect
                    $("#jquery-select2-multiple").select2({
                        placeholder: "Select a State"
                    });

                    // External source
                    $("#jquery-select2-external").select2({
                        placeholder: "Search for a movie",
                        minimumInputLength: 1,
                        ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                            url: "http://api.rottentomatoes.com/api/public/v1.0/movies.json",
                            dataType: 'jsonp',
                            data: function (term, page) {
                                return {
                                    q: term, // search term
                                    page_limit: 10,
                                    apikey: "ju6z9mjyajq2djue3gbvv26t" // please do not use so this example keeps working
                                };
                            },
                            results: function (data, page) { // parse the results into the format expected by Select2.
                                // since we are using custom formatting functions we do not need to alter remote JSON data
                                return {results: data.movies};
                            }
                        },
                        initSelection: function(element, callback) {
                            // the input tag has a value attribute preloaded that points to a preselected movie's id
                            // this function resolves that id attribute to an object that select2 can render
                            // using its formatResult renderer - that way the movie name is shown preselected
                            var id=$(element).val();
                            if (id!=="") {
                                $.ajax("http://api.rottentomatoes.com/api/public/v1.0/movies/"+id+".json", {
                                    data: {
                                        apikey: "ju6z9mjyajq2djue3gbvv26t"
                                    },
                                    dataType: "jsonp"
                                }).done(function(data) { callback(data); });
                            }
                        },
                        formatResult: movieFormatResult, // omitted for brevity, see the source of this page
                        formatSelection: movieFormatSelection,  // omitted for brevity, see the source of this page
                        dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
                        escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
                    });

                    // Disabled state
                    $(".select2-disabled-examples select").select2({ placeholder: 'Select option...' });

                    // Colors
                    $(".select2-colors-examples select").select2();
                });
            </script>
            <!-- / Javascript -->


            <!-- /9. $JQUERY_SELECT2 -->

            <!-- 10. $MASKED_INPUTS ============================================================================

                            Masked inputs
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $("#masked-inputs-examples-date").mask("99/99/9999");
                    $("#masked-inputs-examples-phone").mask("(999) 999-9999");
                    $("#masked-inputs-examples-ssn").mask("999-99-9999");
                    $("#masked-inputs-examples-product-key").mask("a*-999-a999", {
                        placeholder: " ",
                        completed: function(){
                            alert("You typed the following: " + this.val());
                        }
                    });
                });
            </script>
            <!-- / Javascript -->



            <!-- 11. $STYLED_FILE_INPUTS ==============================================================================

                            Styled file inputs
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $('#styled-finputs-example').pixelFileInput({ placeholder: 'No file selected...' });
                })
            </script>
            <!-- / Javascript -->


            <!-- /11. $STYLED_FILE_INPUTS -->

            <!-- 12. $JQUERY_AUTORESIZING_TEXTAREA =============================================================

                            jQuery Autoresizing Textarea
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $("#jq-autoresizing-textarea-example").autosize();
                });
            </script>
            <!-- / Javascript -->


            <!-- /12. $JQUERY_AUTORESIZING_TEXTAREA -->

            <!-- 13. $JQUERY_KNOB ==============================================================================

                            jQuery Knob
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $(".knob-input-example").knob();
                });
            </script>
            <!-- / Javascript -->


            <!-- /13. $JQUERY_KNOB -->

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <!-- 14. $DROPZONEJS_FILE_UPLOADS ==================================================================

                            Dropzone.js file uploads
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $("#dropzonejs-example").dropzone({
                        url: "//dummy.html",
                        paramName: "file", // The name that will be used to transfer the file
                        maxFilesize: 0.5, // MB

                        addRemoveLinks : true,
                        dictResponseError: "Can't upload file!",
                        autoProcessQueue: false,
                        thumbnailWidth: 138,
                        thumbnailHeight: 120,

                        previewTemplate: '<div class="dz-preview dz-file-preview">' +
                        '<div class="dz-details">' +
                        '<div class="dz-filename">' +
                        '<span data-dz-name></span></div>' +
                        '<div class="dz-size">File size: <span data-dz-size></span>' +
                        '</div>' +
                        '<div class="dz-thumbnail-wrapper">' +
                        '<div class="dz-thumbnail">' +
                        '<img data-dz-thumbnail><span class="dz-nopreview">No preview</span>' +
                        '<div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div>' +
                        '<div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div>' +
                        '<div class="dz-error-message"><span data-dz-errormessage></span></div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="progress progress-striped active">' +
                        '<div class="progress-bar progress-bar-success" data-dz-uploadprogress></div>' +
                        '</div>' +
                        '</div>',

                        resize: function(file) {
                            var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                                    srcRatio = file.width / file.height;
                            if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                                info.trgHeight = this.options.thumbnailHeight;
                                info.trgWidth = info.trgHeight * srcRatio;
                                if (info.trgWidth > this.options.thumbnailWidth) {
                                    info.trgWidth = this.options.thumbnailWidth;
                                    info.trgHeight = info.trgWidth / srcRatio;
                                }
                            } else {
                                info.trgHeight = file.height;
                                info.trgWidth = file.width;
                            }
                            return info;
                        }
                    });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Dropzone.js file uploads</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="http://www.dropzonejs.com/" target="_blank">http://www.dropzonejs.com</a></div>

                    <div id="dropzonejs-example" class="dropzone-box dz-clickable">
                        <div class="dz-default dz-message">
                            <i class="fa fa-cloud-upload"></i>
                            Drop files in here<br><span class="dz-text-small">or click to pick manually</span>
                        </div>
                        <form action="http://dummy.html/">

                        </form>
                    </div>
                </div>
            </div>
            <!-- /14. $DROPZONEJS_FILE_UPLOADS -->

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <!-- 15. $BOOTSTRAP_X_EDITABLE =====================================================================

                            Bootstrap X-Editable
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $('#bs-x-editable-username').editable({
                        type: 'text',
                        name: 'username',
                        title: 'Enter username'
                    });

                    $('#bs-x-editable-firstname').editable({
                        validate: function(value) {
                            if($.trim(value) == '') return 'This field is required';
                        }
                    });

                    $('#bs-x-editable-sex').editable({
                        prepend: "not selected",
                        source: [
                            {value: 1, text: 'Male'},
                            {value: 2, text: 'Female'}
                        ],
                        display: function(value, sourceData) {
                            var colors = {"": "gray", 1: "green", 2: "blue"},
                                    elem = $.grep(sourceData, function(o){return o.value == value;});

                            if(elem.length) {
                                $(this).text(elem[0].text).css("color", colors[value]);
                            } else {
                                $(this).empty();
                            }
                        }
                    });

                    $('#bs-x-editable-vacation').editable({
                        datepicker: {
                            todayBtn: 'linked'
                        }
                    });

                    $('#bs-x-editable-dob').editable();

                    $('#bs-x-editable-event').editable({
                        combodate: {
                            firstItem: 'name'
                        }
                    });

                    $('#bs-x-editable-comments').editable({
                        showbuttons: 'bottom'
                    });

                    $('#bs-x-editable-state2').editable({
                        value: 'California',
                        typeahead: {
                            name: 'state',
                            local: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
                        }
                    });

                    $('#bs-x-editable-fruits').editable({
                        limit: 3,
                        source: [
                            {value: 1, text: 'banana'},
                            {value: 2, text: 'peach'},
                            {value: 3, text: 'apple'},
                            {value: 4, text: 'watermelon'},
                            {value: 5, text: 'orange'}
                        ]
                    });

                    $('#bs-x-editable-tags').editable({
                        select2: {
                            tags: ['html', 'javascript', 'css', 'ajax'],
                            tokenSeparators: [",", " "]
                        }
                    });

                    var countries = [];
                    $.each({"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Bartelemey", "BM": "Bermuda", "BN": "Brunei Darussalam", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "O1": "Other Country", "LV": "Latvia", "RW": "Rwanda", "RS": "Serbia", "TL": "Timor-Leste", "RE": "Reunion", "LU": "Luxembourg", "TJ": "Tajikistan", "RO": "Romania", "PG": "Papua New Guinea", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "BZ": "Belize", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "TM": "Turkmenistan", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "RU": "Russian Federation", "EE": "Estonia", "EG": "Egypt", "TK": "Tokelau", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "EU": "Europe", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova, Republic of", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania, United Republic of", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "FX": "France, Metropolitan", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands (Malvinas)", "FM": "Micronesia, Federated States of", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "CI": "Cote d'Ivoire", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos (Keeling) Islands", "CA": "Canada", "CG": "Congo", "CF": "Central African Republic", "CD": "Congo, The Democratic Republic of the", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syrian Arab Republic", "KG": "Kyrgyzstan", "KE": "Kenya", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "Korea, Republic of", "SI": "Slovenia", "KP": "Korea, Democratic People's Republic of", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "Virgin Islands, British", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Lao People's Democratic Republic", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "A1": "Anonymous Proxy", "TO": "Tonga", "LT": "Lithuania", "A2": "Satellite Provider", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libyan Arab Jamahiriya", "VA": "Holy See (Vatican City State)", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "Virgin Islands, U.S.", "IS": "Iceland", "IR": "Iran, Islamic Republic of", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AN": "Netherlands Antilles", "AQ": "Antarctica", "AP": "Asia/Pacific Region", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"}, function(k, v) {
                        countries.push({id: k, text: v});
                    });

                    $('#bs-x-editable-country').editable({
                        source: countries,
                        select2: {
                            width: 200,
                            placeholder: 'Select country',
                            allowClear: true
                        }
                    });

                    $('#bs-x-editable-address').editable({
                        value: {
                            city: "Moscow",
                            street: "Lenina",
                            building: "12"
                        },
                        validate: function(value) {
                            if(value.city == '') return 'city is required!';
                        },
                        display: function(value) {
                            if(!value) {
                                $(this).empty();
                                return;
                            }
                            var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' st., bld. ' + $('<div>').text(value.building).html();
                            $(this).html(html);
                        }
                    });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Bootstrap X-Editable</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="http://vitalets.github.io/x-editable/" target="_blank">http://vitalets.github.io/x-editable/</a></div>

                    <table id="user" class="table table-bordered table-striped" style="clear: both">
                        <tbody>
                        <tr>
                            <td width="35%">Simple text field</td>
                            <td width="65%"><a href="#" id="bs-x-editable-username" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click">superuser</a></td>
                        </tr>
                        <tr>
                            <td>Empty text field, required</td>
                            <td><a href="#" id="bs-x-editable-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">Empty</a></td>
                        </tr>
                        <tr>
                            <td>Select, local array, custom display</td>
                            <td><a href="#" id="bs-x-editable-sex" data-type="select" data-pk="1" data-value="" data-title="Select sex" class="editable editable-click" style="color: gray;">not selected</a></td>
                        </tr>
                        <tr>
                            <td>Datepicker</td>
                            <td><a href="#" id="bs-x-editable-vacation" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-placement="right" data-title="When you want vacation to start?" class="editable editable-click">25.02.2013</a></td>
                        </tr>
                        <tr>
                            <td>Combodate (date)</td>
                            <td><a href="#" id="bs-x-editable-dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth" class="editable editable-click">15/05/1984</a></td>
                        </tr>
                        <tr>
                            <td>Combodate (datetime)</td>
                            <td><a href="#" id="bs-x-editable-event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1" data-title="Setup event date and time" class="editable editable-click editable-empty">Empty</a></td>
                        </tr>
                        <tr>
                            <td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
                            <td><a href="#" id="bs-x-editable-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments" class="editable editable-pre-wrapped editable-click">awesome user!</a></td>
                        </tr>
                        <tr>
                            <td>Twitter typeahead.js</td>
                            <td><a href="#" id="bs-x-editable-state2" data-type="typeaheadjs" data-pk="1" data-placement="right" data-title="Start typing State.." class="editable editable-click">California</a></td>
                        </tr>
                        <tr>
                            <td>Checklist</td>
                            <td><a href="#" id="bs-x-editable-fruits" data-type="checklist" data-value="2,3" data-title="Select fruits" class="editable editable-click">peach<br>apple</a></td>
                        </tr>

                        <tr>
                            <td>Select2 (tags mode)</td>
                            <td><a href="#" id="bs-x-editable-tags" data-type="select2" data-pk="1" data-title="Enter tags" class="editable editable-click">html, javascript</a></td>
                        </tr>
                        <tr>
                            <td>Select2 (dropdown mode)</td>
                            <td><a href="#" id="bs-x-editable-country" data-type="select2" data-pk="1" data-value="BS" data-title="Select country" class="editable editable-click">Bahamas</a></td>
                        </tr>

                        <tr>
                            <td>Custom input, several fields</td>
                            <td><a href="#" id="bs-x-editable-address" data-type="address" data-pk="1" data-title="Please, fill address" class="editable editable-click"><b>Moscow</b>, Lenina st., bld. 12</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /15. $BOOTSTRAP_X_EDITABLE -->

        </div>
    </div>
    {{--Form components /Advanced:: Ends--}}

    {{--Form components /Pickers --}}
    <div class="page-header">
        <h1><span class="text-light-gray">Form components / </span>Pickers</h1>
    </div> <!-- / .page-header -->

    <div class="row">
        <div class="col-sm-12">

            <!-- 5. $BOOTSTRAP_DATEPAGINATOR ===================================================================

                            Bootstrap Datepaginator
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    if (! $('html').hasClass('ie8')) {
                        $('#bs-datepaginator-example').datepaginator();
                        $('#bs-datepaginator-small').datepaginator({ size: 'small' });
                        $('#bs-datepaginator-large').datepaginator({ size: 'large' });
                    } else {
                        $('.ie8-note').attr('style', '');
                    }
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Bootstrap Datepaginator</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="http://jondmiles.com/bootstrap-datepaginator/" target="_blank">http://jondmiles.com/bootstrap-datepaginator/</a></div>

                    <div class="note note-danger ie8-note" style="display:none">Bootstrap-Datepaginator is disabled because it is extremely slow on IE8.</div>

                    <div id="bs-datepaginator-example"></div>

                    <hr class="panel-wide">

                    <!-- Sizes -->
                    <h6 class="text-muted text-semibold text-xs" style="margin:20px 0 10px 0;">SIZES</h6>

                    <div id="bs-datepaginator-small" class="form-group-margin"></div>
                    <div id="bs-datepaginator-large"></div>
                </div>
            </div>
            <!-- /5. $BOOTSTRAP_DATEPAGINATOR -->

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <!-- 6. $JQUERY_MINICOLORS =========================================================================

                            jQuery Minicolors
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $('#minicolors-hue-demo').minicolors({
                        control: 'hue',
                        position: 'bottom left',
                        theme: 'bootstrap'
                    });
                    $('#minicolors-saturation-demo').minicolors({
                        control: 'saturation',
                        position: 'bottom right',
                        theme: 'bootstrap'
                    });
                    $('#minicolors-brightness-demo').minicolors({
                        control: 'brightness',
                        position: 'top left',
                        theme: 'bootstrap'
                    });
                    $('#minicolors-wheel-demo').minicolors({
                        control: 'wheel',
                        position: 'top right',
                        theme: 'bootstrap'
                    });
                    $('#minicolors-opacity-demo').minicolors({
                        control: 'wheel',
                        opacity: true,
                        theme: 'bootstrap'
                    });
                    $('#minicolors-hidden-demo').minicolors({ theme: 'bootstrap' });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">jQuery Minicolors</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="http://labs.abeautifulsite.net/jquery-minicolors/" target="_blank">http://labs.abeautifulsite.net/jquery-minicolors/</a></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="minicolors-hue-demo">Hue (default)</label>
                                <input type="text" id="minicolors-hue-demo" class="form-control" value="#ff6161">
                            </div>
                            <div class="form-group">
                                <label for="minicolors-saturation-demo">Saturation</label>
                                <input type="text" id="minicolors-saturation-demo" class="form-control" value="#0088cc">
                            </div>
                            <div class="form-group">
                                <label for="minicolors-opacity-demo">Opacity</label>
                                <input type="text" id="minicolors-opacity-demo" class="form-control" value="#766fa8" data-opacity=".5">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="minicolors-brightness-demo">Brightness</label>
                                <input type="text" id="minicolors-brightness-demo" class="form-control" value="#00ffff">
                            </div>
                            <div class="form-group">
                                <label for="minicolors-wheel-demo">Wheel</label>
                                <input type="text" id="minicolors-wheel-demo" class="form-control" value="#ff99ee">
                            </div>
                            <div class="form-group">
                                <label for="minicolors-hidden-demo">Hidden Input</label>
                                <input type="hidden" id="minicolors-hidden-demo" class="form-control" value="#db913d">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /6. $JQUERY_MINICOLORS -->

        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">

            <!-- 7. $BOOTSTRAP_DATEPICKER ======================================================================

                            Bootstrap Datepicker
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    var options = {
                        todayBtn: "linked",
                        orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
                    }
                    $('#bs-datepicker-example').datepicker(options);

                    $('#bs-datepicker-component').datepicker();

                    var options2 = {
                        orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
                    }
                    $('#bs-datepicker-range').datepicker(options2);

                    $('#bs-datepicker-inline').datepicker();
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Bootstrap Datepicker</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="https://github.com/eternicode/bootstrap-datepicker" target="_blank">https://github.com/eternicode/bootstrap-datepicker</a></div>

                    <input type="text" class="form-control" id="bs-datepicker-example">

                    <hr class="panel-wide">

                    <!-- As component -->
                    <h6 class="text-muted text-semibold text-xs" style="margin:20px 0 10px 0;">AS COMPONENT</h6>

                    <div class="input-group date" id="bs-datepicker-component">
                        <input type="text" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>

                    <hr class="panel-wide">

                    <!-- Range -->
                    <h6 class="text-muted text-semibold text-xs" style="margin:20px 0 10px 0;">RANGE</h6>

                    <div class="input-daterange input-group" id="bs-datepicker-range">
                        <input type="text" class="input-sm form-control" name="start" placeholder="Start date">
                        <span class="input-group-addon">to</span>
                        <input type="text" class="input-sm form-control" name="end" placeholder="End date">
                    </div>

                    <hr class="panel-wide">

                    <!-- Inline -->
                    <h6 class="text-muted text-semibold text-xs" style="margin:20px 0 10px 0;">INLINE</h6>

                    <div id="bs-datepicker-inline"></div>

                </div>
            </div>
            <!-- /7. $BOOTSTRAP_DATEPICKER -->

        </div>
        <div class="col-sm-6">

            <!-- 8. $BOOTSTRAP_TIMEPICKER ======================================================================

                            Bootstrap Timepicker
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    var options = {
                        minuteStep: 5,
                        orientation: $('body').hasClass('right-to-left') ? { x: 'right', y: 'auto'} : { x: 'auto', y: 'auto'}
                    }
                    $('#bs-timepicker-example').timepicker(options);

                    var options2 = {
                        minuteStep: 1,
                        showSeconds: true,
                        showMeridian: false,
                        showInputs: false,
                        orientation: $('body').hasClass('right-to-left') ? { x: 'right', y: 'auto'} : { x: 'auto', y: 'auto'}
                    }
                    $('#bs-timepicker-component').timepicker(options2);

                    var options3 = {
                        minuteStep: 5,
                        template: 'modal',
                        orientation: $('body').hasClass('right-to-left') ? { x: 'right', y: 'auto'} : { x: 'auto', y: 'auto'}
                    }
                    $('#bs-timepicker-modal').timepicker(options3);

                    var options4 = {
                        template: false,
                        showInputs: false,
                        minuteStep: 5
                    }
                    $('#bs-timepicker-w-template').timepicker(options4);
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Bootstrap Timepicker</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="http://jdewit.github.io/bootstrap-timepicker/" target="_blank">http://jdewit.github.io/bootstrap-timepicker/</a></div>

                    <input type="text" class="form-control" id="bs-timepicker-example">

                    <hr class="panel-wide">

                    <!-- As component -->
                    <h6 class="text-muted text-semibold text-xs" style="margin:20px 0 10px 0;">AS COMPONENT</h6>

                    <div class="input-group date">
                        <input type="text" class="form-control" id="bs-timepicker-component"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>

                    <hr class="panel-wide">

                    <!-- Modal -->
                    <h6 class="text-muted text-semibold text-xs" style="margin:20px 0 10px 0;">MODAL</h6>

                    <div class="input-group date">
                        <input type="text" class="form-control" id="bs-timepicker-modal"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>

                    <hr class="panel-wide">

                    <!-- Without template -->
                    <h6 class="text-muted text-semibold text-xs" style="margin:20px 0 10px 0;">WITHOUT TEMPLATE</h6>

                    <div class="has-feedback date">
                        <input type="text" class="form-control" id="bs-timepicker-w-template">
                        <span class="fa fa-clock-o form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <!-- /8. $BOOTSTRAP_TIMEPICKER -->

        </div>
    </div>
    {{--Form components /Pickers:: Ends--}}

    {{--Form components /Validation--}}
    <div class="page-header">
        <h1><span class="text-light-gray">Form components / </span>Validation</h1>
    </div> <!-- / .page-header -->

    <div class="row">
        <div class="col-sm-12">

            <!-- 5. $JQUERY_VALIDATION =========================================================================

                            jQuery Validation
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $("#jq-validation-phone").mask("(999) 999-9999");
                    $('#jq-validation-select2').select2({ allowClear: true, placeholder: 'Select a country...' }).change(function(){
                        $(this).valid();
                    });
                    $('#jq-validation-select2-multi').select2({ placeholder: 'Select gear...' }).change(function(){
                        $(this).valid();
                    });

                    // Add phone validator
                    $.validator.addMethod(
                            "phone_format",
                            function(value, element) {
                                var check = false;
                                return this.optional(element) || /^\(\d{3}\)[ ]\d{3}\-\d{4}$/.test(value);
                            },
                            "Invalid phone number."
                    );

                    // Setup validation
                    $("#jq-validation-form").validate({
                        ignore: '.ignore, .select2-input',
                        focusInvalid: false,
                        rules: {
                            'jq-validation-email': {
                                required: true,
                                email: true
                            },
                            'jq-validation-password': {
                                required: true,
                                minlength: 6,
                                maxlength: 20
                            },
                            'jq-validation-password-confirmation': {
                                required: true,
                                minlength: 6,
                                equalTo: "#jq-validation-password"
                            },
                            'jq-validation-required': {
                                required: true
                            },
                            'jq-validation-url': {
                                required: true,
                                url: true
                            },
                            'jq-validation-phone': {
                                required: true,
                                phone_format: true
                            },
                            'jq-validation-select': {
                                required: true
                            },
                            'jq-validation-multiselect': {
                                required: true,
                                minlength: 2
                            },
                            'jq-validation-select2': {
                                required: true
                            },
                            'jq-validation-select2-multi': {
                                required: true,
                                minlength: 2
                            },
                            'jq-validation-text': {
                                required: true
                            },
                            'jq-validation-simple-error': {
                                required: true
                            },
                            'jq-validation-dark-error': {
                                required: true
                            },
                            'jq-validation-radios': {
                                required: true
                            },
                            'jq-validation-checkbox1': {
                                require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
                            },
                            'jq-validation-checkbox2': {
                                require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
                            },
                            'jq-validation-policy': {
                                required: true
                            }
                        },
                        messages: {
                            'jq-validation-policy': 'You must check it!'
                        }
                    });
                });
            </script>
            <!-- / Javascript -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">jQuery Validation</span>
                </div>
                <div class="panel-body">
                    <div class="note note-info">More info and examples at <a href="http://bassistance.de/jquery-plugins/jquery-plugin-validation/" target="_blank">http://bassistance.de/jquery-plugins/jquery-plugin-validation/</a></div>

                    <form class="form-horizontal" id="jq-validation-form">
                        <div class="form-group">
                            <label for="jq-validation-email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jq-validation-email" name="jq-validation-email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="jq-validation-password" name="jq-validation-password" placeholder="Password">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-password-confirmation" class="col-sm-3 control-label">Confirm password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="jq-validation-password-confirmation" name="jq-validation-password-confirmation" placeholder="Confirm password">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-required" class="col-sm-3 control-label">Required</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jq-validation-required" name="jq-validation-required" placeholder="Required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-url" class="col-sm-3 control-label">URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jq-validation-url" name="jq-validation-url" placeholder="Url">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-phone" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jq-validation-phone" name="jq-validation-phone" placeholder="Phone: (999) 999-9999">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-select" class="col-sm-3 control-label">Select Box</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="jq-validation-select" name="jq-validation-select">
                                    <option value="">Select gear...</option>
                                    <optgroup label="Climbing">
                                        <option value="pitons">Pitons</option>
                                        <option value="cams">Cams</option>
                                        <option value="nuts">Nuts</option>
                                        <option value="bolts">Bolts</option>
                                        <option value="stoppers">Stoppers</option>
                                        <option value="sling">Sling</option>
                                    </optgroup>
                                    <optgroup label="Skiing">
                                        <option value="skis">Skis</option>
                                        <option value="skins">Skins</option>
                                        <option value="poles">Poles</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-multiselect" class="col-sm-3 control-label">Multiselect</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jq-validation-multiselect" id="jq-validation-multiselect" multiple="multiple">
                                    <optgroup label="Climbing">
                                        <option value="pitons">Pitons</option>
                                        <option value="cams">Cams</option>
                                        <option value="nuts">Nuts</option>
                                        <option value="bolts">Bolts</option>
                                        <option value="stoppers">Stoppers</option>
                                        <option value="sling">Sling</option>
                                    </optgroup>
                                    <optgroup label="Skiing">
                                        <option value="skis">Skis</option>
                                        <option value="skins">Skins</option>
                                        <option value="poles">Poles</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-select2" class="col-sm-3 control-label">Select2</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jq-validation-select2" id="jq-validation-select2">
                                    <option></option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">&Aring;land Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia, Plurinational State of</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">C&ocirc;te d'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran, Islamic Republic of</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia, Federated States of</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territory, Occupied</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">R&eacute;union</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barth&eacute;lemy</option>
                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin (French part)</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="VG">Virgin Islands, British</option>
                                    <option value="VI">Virgin Islands, U.S.</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-select2-multi" class="col-sm-3 control-label">Select2 Multiple</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jq-validation-select2-multi" id="jq-validation-select2-multi" multiple="multiple">
                                    <optgroup label="Climbing">
                                        <option value="pitons">Pitons</option>
                                        <option value="cams">Cams</option>
                                        <option value="nuts">Nuts</option>
                                        <option value="bolts">Bolts</option>
                                        <option value="stoppers">Stoppers</option>
                                        <option value="sling">Sling</option>
                                    </optgroup>
                                    <optgroup label="Skiing">
                                        <option value="skis">Skis</option>
                                        <option value="skins">Skins</option>
                                        <option value="poles">Poles</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jq-validation-text" class="col-sm-3 control-label">Text</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="jq-validation-text" id="jq-validation-text"></textarea>
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>

                        <!-- To use simple error template, just add '.simple' class to the .form-group -->
                        <div class="form-group simple">
                            <label for="jq-validation-simple-error" class="col-sm-3 control-label">Simple error</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jq-validation-simple-error" name="jq-validation-simple-error" placeholder="Required">
                            </div>
                        </div>

                        <!-- To use dark error template, just add '.dark' class to the .form-group -->
                        <div class="form-group dark">
                            <label for="jq-validation-dark-error" class="col-sm-3 control-label">Dark error</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jq-validation-dark-error" name="jq-validation-dark-error" placeholder="Required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Radios</label>
                            <div class="col-sm-9">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jq-validation-radios" value="1" class="px">
                                        <span class="lbl">Option one is this and that—be sure to include why it's great</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jq-validation-radios" value="2" class="px">
                                        <span class="lbl">Option two can be something else and selecting it will deselect option one</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="jq-validation-checkbox1" class="px"> <span class="lbl">Checkbox 1</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="jq-validation-checkbox2" class="px"> <span class="lbl">Checkbox 2</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr class="panel-wide">

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="jq-validation-policy" id="jq-validation-policy" class="px"> <span class="lbl">Confirm policy</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /5. $JQUERY_VALIDATION -->


            <!-- 6. $WIZARD_FORMS_VALIDATION ===================================================================

                            Wizard forms validation
            -->
            <!-- Javascript -->
            <script>
                init.push(function () {
                    $('#wizard-forms').pixelWizard({
                        onFinish: function () {
                            // Disable changing step. To enable changing step just call this.unfreeze()
                            this.freeze();
                        }
                    });
                    $('#wizard-forms .wizard-prev-step-btn').on('click', function () {
                        $('#wizard-forms').pixelWizard('prevStep');
                        return false;
                    });

                    // Account page

                    $("#wizard-account").validate({
                        ignore: '.ignore',
                        focusInvalid: true,
                        rules: {
                            'username': {
                                required: true,
                                minlength: 3,
                                maxlength: 20
                            },
                            'password': {
                                required: true,
                                minlength: 6,
                                maxlength: 20
                            },
                            'repeat-password': {
                                required: true,
                                minlength: 6,
                                equalTo: 'input[name="password"]'
                            },
                            'email': {
                                required: true,
                                email: true
                            },
                        }
                    });
                    $('#wizard-account').on('submit', function () {
                        if ($(this).valid()) {
                            $('#wizard-forms').pixelWizard('nextStep');
                        }
                        return false;
                    });

                    // Profile page

                    $('#country').select2({ allowClear: true, placeholder: 'Select a country...' }).change(function(){
                        $(this).valid();
                    });
                    $("#wizard-profile").validate({
                        ignore: '.ignore, .select2-input',
                        focusInvalid: true,
                        rules: {
                            'full_name': {
                                required: true
                            },
                            'country': {
                                required: true
                            },
                            'subscription': {
                                required: true
                            },
                            'gender1': {
                                require_from_group: [1, 'input[name="gender1"], input[name="gender2"]']
                            },
                            'gender2': {
                                require_from_group: [1, 'input[name="gender1"], input[name="gender2"]']
                            }
                        }
                    });
                    $('#wizard-profile').on('submit', function () {
                        if ($(this).valid()) {
                            $('#wizard-forms').pixelWizard('nextStep');
                        }
                        return false;
                    });

                    // Credit card page

                    var $wcc = $('#wizard-credit-card')
                    $wcc.find('[data-toggle="tooltip"]').tooltip();
                    $wcc.find('input[name="postal_code"]').mask("999999");
                    $wcc.find('input[name="credit_card_number"]').mask("9999 9999 9999 9999");
                    $wcc.find('input[name="csv"]').mask("999");
                    $wcc.validate({
                        ignore: '.ignore, .select2-input',
                        focusInvalid: true,
                        rules: {
                            'postal_code': {
                                required: true,
                                digits: true,
                                rangelength: [6, 6]
                            },
                            'credit_card_number': {
                                required: true,
                                creditcard: true
                            },
                            'csv': {
                                required: true,
                                digits: true,
                                rangelength: [3, 3]
                            }
                        }
                    });
                    $wcc.on('submit', function () {
                        if ($(this).valid()) {
                            $('#wizard-forms').pixelWizard('nextStep');
                        }
                        return false;
                    });

                    // Finish page

                    $('#wizard-finish button').click(function () {
                        $(this).parent().find('.text-lg').text('THANK YOU!');
                        $(this).parent().find('.fa-check').removeClass('fa-check').addClass('fa-check-circle');
                        $(this).remove();
                        $('#wizard-forms').pixelWizard('nextStep');
                        return false;
                    });

                });
            </script>
            <!-- / Javascript -->

            <!-- Styles -->
            <style type="text/css">
                #wizard-credit-card .tooltip {
                    left: auto !important;
                    right: 36px !important;
                    width: 200px !important;
                }
            </style>
            <!-- / Styles -->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Wizard forms validation</span>
                </div>
                <div class="panel-body no-padding">

                    <div class="wizard no-margin" id="wizard-forms">

                        <!-- Steps -->
                        <div class="wizard-wrapper no-border">
                            <ul class="wizard-steps">
                                <li data-target="#wizard-account" >
                                    <span class="wizard-step-number">1</span>
										<span class="wizard-step-caption">
											Account
											<span class="wizard-step-description">Setup your account</span>
										</span>
                                </li>
                                <li data-target="#wizard-profile"> <!-- ! Remove space between elements by dropping close angle -->
                                    <span class="wizard-step-number">2</span>
										<span class="wizard-step-caption">
											Profile
											<span class="wizard-step-description">Configure profile</span>
										</span>
                                </li>
                                <li data-target="#wizard-credit-card"> <!-- ! Remove space between elements by dropping close angle -->
                                    <span class="wizard-step-number">3</span>
										<span class="wizard-step-caption">
											Credit Card
											<span class="wizard-step-description">Credit card info</span>
										</span>
                                </li>
                                <li data-target="#wizard-finish"> <!-- ! Remove space between elements by dropping close angle -->
                                    <span class="wizard-step-number">4</span>
										<span class="wizard-step-caption">
											Finish
										</span>
                                </li>
                            </ul> <!-- / .wizard-steps -->
                        </div> <!-- / .wizard-wrapper -->
                        <!-- / Steps -->

                        <!-- Pages -->
                        <div class="wizard-content panel no-margin no-border-hr no-border-b no-padding-hr">

                            <!-- Account page -->
                            <form class="wizard-pane form-bordered" id="wizard-account">

                                <div class="form-group no-padding-t no-border-t panel-padding-h">
                                    <div class="has-feedback">
                                        <input type="text" name="username" placeholder="Username" class="form-control">
                                        <i class="fa fa-user form-control-feedback"></i>
                                    </div>
                                </div>

                                <div class="border-t">
                                    <div class="row panel-padding-h">
                                        <div class="col-xs-6">
                                            <div class="form-group no-border">
                                                <div class="has-feedback">
                                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                                    <i class="fa fa-asterisk form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group no-border">
                                                <div class="has-feedback">
                                                    <input type="password" name="repeat-password" placeholder="Repeat password" class="form-control">
                                                    <i class="fa fa-asterisk form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group panel-padding-h">
                                    <div class="has-feedback">
                                        <input type="text" name="email" placeholder="Email" class="form-control">
                                        <i class="fa fa-envelope form-control-feedback"></i>
                                    </div>
                                </div>

                                <hr>
                                <div class="panel-padding-h">
                                    <button type="submit" class="btn btn-primary pull-right">Next step</button>
                                </div>
                            </form> <!-- / .wizard-pane -->
                            <!-- / Account page -->

                            <!-- Profile page -->
                            <form class="wizard-pane form-bordered" id="wizard-profile" style="display: none;">
                                <div class="form-group no-padding-t no-border-t panel-padding-h">
                                    <label for="full_name" class="col-md-3 control-label">Full name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="full_name" placeholder="Full name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group panel-padding-h">
                                    <label class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-9">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender1" value="1" class="px"> <span class="lbl">Male</span>
                                            </label>
                                        </div>
                                        <div class="radio no-margin-b">
                                            <label>
                                                <input type="radio" name="gender2" value="2" class="px"> <span class="lbl">Female</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group panel-padding-h">
                                    <label class="col-sm-3">Subscribe to</label>
                                    <div class="col-sm-9">
                                        <div class="checkbox">
                                            <label>
                                                <input name="subscription" value="1" type="checkbox" class="px">
                                                <span class="lbl">Latest news and announcements</span>
                                            </label>
                                        </div>

                                        <div class="checkbox no-margin-b">
                                            <label>
                                                <input name="subscription" value="2" type="checkbox" class="px">
                                                <span class="lbl">Product offers and discounts</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group panel-padding-h">
                                    <label for="country" class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="country" id="country">
                                            <option></option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">&Aring;land Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia, Plurinational State of</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">C&ocirc;te d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">R&eacute;union</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barth&eacute;lemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>

                                <hr>

                                <div class="pull-right panel-padding-h">
                                    <button type="button" class="btn wizard-prev-step-btn">Go back</button>&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-primary ">Next step</button>
                                </div>
                            </form> <!-- / .wizard-pane -->
                            <!-- / Profile page -->

                            <!-- Credit card page -->
                            <form class="wizard-pane panel-padding-h" id="wizard-credit-card" style="display: none;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                <input type="text" name="postal_code" placeholder="Postal code: 999999" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                <input type="text" name="credit_card_number" placeholder="Credit card number: 9999 9999 9999 9999" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="has-feedback">
                                                <input type="text" name="csv" placeholder="CSV: 999" class="form-control">
                                                <i class="fa fa-question-circle form-control-feedback" data-toggle="tooltip" data-placement="left" title="The credit code security code is a three-digit number printed on the back of your card, at the top of the signature field"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="panel-wide">

                                <div class="pull-right">
                                    <button class="btn wizard-prev-step-btn">Prev</button>
                                    <button class="btn btn-primary wizard-next-step-btn">Next</button>
                                </div>
                            </form> <!-- / .wizard-pane -->
                            <!-- / Credit card page -->

                            <!-- Finish page -->
                            <div class="wizard-pane text-center panel-padding" id="wizard-finish" style="display: none;">
                                <i class="fa fa-check text-success text-slg"></i><br><br>
                                <span class="text-lg text-slim text-muted">WE'VE ALMOST DONE!</span>
                                <button class="btn btn-primary" style="margin: 25px auto;display: block;">Finish</button>
                            </div> <!-- / .wizard-pane -->
                            <!-- / Finish page -->

                        </div> <!-- / .wizard-content -->
                        <!-- / Pages -->

                    </div> <!-- / .wizard -->
                </div>
            </div>
            <!-- /6. $WIZARD_FORMS_VALIDATION -->

        </div>
    </div>
    {{--Form components /Validation:: Ends--}}

    {{--Form components /Editors:: --}}

    <div class="page-header">
        <h1><span class="text-light-gray">Form components / </span>Editors</h1>
    </div>

    <script>
        init.push(function () {
            if (! $('html').hasClass('ie8')) {
                $('#summernote-example').summernote({
                    height: 200,
                    tabsize: 2,
                    codemirror: {
                        theme: 'monokai'
                    }
                });
            }
            $('#summernote-boxed').switcher({
                on_state_content: '<span class="fa fa-check" style="font-size:11px;"></span>',
                off_state_content: '<span class="fa fa-times" style="font-size:11px;"></span>'
            });
            $('#summernote-boxed').on($('html').hasClass('ie8') ? "propertychange" : "change", function () {
                var $panel = $(this).parents('.panel');
                if ($(this).is(':checked')) {
                    $panel.find('.panel-body').addClass('no-padding');
                    $panel.find('.panel-body > *').addClass('no-border');
                } else {
                    $panel.find('.panel-body').removeClass('no-padding');
                    $panel.find('.panel-body > *').removeClass('no-border');
                }
            });
        });
    </script>
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"><a href="http://hackerwins.github.io/summernote/" target="_blank">Summernote WYSIWYG-editor <i class="fa fa-link"></i></a></span>
            <div class="panel-heading-controls">
                <span class="panel-heading-text" style="font-size:11px;font-weight:600;">BOXED&nbsp;&nbsp;</span>
                <div class="switcher switcher-sm">
                    <input type="checkbox" data-class="switcher-sm" id="summernote-boxed">
                    {{--<div class="switcher-toggler"></div>--}}
                    <div class="switcher-inner">
                        <div class="switcher-state-on"><span class="fa fa-check" style="font-size:11px;"></span>
                        </div>
                        {{--<div class="switcher-state-off"><span class="fa fa-times" style="font-size:11px;"></span></div>--}}
                    </div>
                </div>
            </div> <!-- / .panel-heading-controls -->
        </div>
        <div class="panel-body">
            <textarea class="form-control" id="summernote-example" rows="10" style="display: none;">&lt;p&gt;Seasons &lt;b&gt;coming up&lt;/b&gt;&lt;/p&gt;</textarea>
            <div class="note-editor">
                <div class="note-dropzone">
                    <div class="note-dropzone-message"></div>
                </div>
                <div class="note-dialog">
                    <div class="note-image-dialog modal" aria-hidden="false">
                        <div class="modal-dialog"><div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true" tabindex="-1">×</button>
                                    <h4>Insert Image</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row-fluid">
                                        <h5>Select from files</h5>
                                        <input class="note-image-input" type="file" name="files" accept="image/*">
                                        <h5>Image URL</h5>
                                        <input class="note-image-url form-control span12" type="text">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button href="#" class="btn btn-primary note-image-btn disabled" disabled="disabled">Insert Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="note-link-dialog modal" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true" tabindex="-1">×</button>
                                    <h4>Insert Link</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row-fluid">
                                        <div class="form-group">
                                            <label>Text to display</label>
                                            <input class="note-link-text form-control span12" disabled="" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>To what URL should this link go?</label>
                                            <input class="note-link-url form-control span12" type="text">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked=""> Open in new window
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button href="#" class="btn btn-primary note-link-btn disabled" disabled="disabled">Insert Link</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="note-video-dialog modal" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true" tabindex="-1">×</button>
                                    <h4>Insert Video</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row-fluid">
                                        <div class="form-group"><label>Video URL?</label>&nbsp;
                                            <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, or DailyMotion)</small>
                                            <input class="note-video-url form-control span12" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button href="#" class="btn btn-primary note-video-btn disabled" disabled="disabled">Insert Video</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="note-help-dialog modal" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <a class="modal-close pull-right" aria-hidden="true" tabindex="-1">Close</a>
                                    <div class="title">Keyboard shortcuts</div>
                                    <p class="text-center"><a href="file://hackerwins.github.io/summernote/" target="_blank">Summernote 0.5.1</a> · <a href="file://github.com/HackerWins/summernote" target="_blank">Project</a> · <a href="file://github.com/HackerWins/summernote/issues" target="_blank">Issues</a></p>
                                    <table class="note-shortcut-layout">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <table class="note-shortcut">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Ctrl + Z</td>
                                                        <td>Undo</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ctrl + Shift + Z</td>
                                                        <td>Redo</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ctrl + ]</td>
                                                        <td>Indent</td></tr>
                                                    <tr>
                                                        <td>Ctrl + [</td>
                                                        <td>Outdent</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ctrl + K</td>
                                                        <td>Insert Link</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ctrl + ENTER</td>
                                                        <td>Insert Horizontal Rule</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table class="note-shortcut">
                                                    <thead>
                                                    <tr><th></th><th>Text formatting</th></tr></thead><tbody><tr><td>Ctrl + B</td><td>Bold</td></tr><tr><td>Ctrl + I</td><td>Italic</td></tr><tr><td>Ctrl + U</td><td>Underline</td></tr><tr><td>Ctrl + Shift + S</td><td>Strike</td></tr><tr><td>Ctrl + \</td><td>Remove Font Style</td></tr></tbody></table></td></tr><tr><td><table class="note-shortcut"><thead><tr><th></th><th>Document Style</th></tr></thead><tbody><tr><td>Ctrl + NUM0</td><td>Normal</td></tr><tr><td>Ctrl + NUM1</td><td>Header 1</td></tr><tr><td>Ctrl + NUM2</td><td>Header 2</td></tr><tr><td>Ctrl + NUM3</td><td>Header 3</td></tr><tr><td>Ctrl + NUM4</td><td>Header 4</td></tr><tr><td>Ctrl + NUM5</td><td>Header 5</td></tr><tr><td>Ctrl + NUM6</td><td>Header 6</td></tr></tbody></table></td><td><table class="note-shortcut"><thead><tr><th></th><th>Paragraph formatting</th></tr></thead><tbody><tr><td>Ctrl + Shift + L</td><td>Align left</td></tr><tr><td>Ctrl + Shift + E</td><td>Align center</td></tr><tr><td>Ctrl + Shift + R</td><td>Align right</td></tr><tr><td>Ctrl + Shift + J</td><td>Justify full</td></tr><tr><td>Ctrl + Shift + NUM7</td><td>Ordered list</td></tr><tr><td>Ctrl + Shift + NUM8</td><td>Unordered list</td></tr></tbody></table></td></tr></tbody></table></div></div></div></div></div><div class="note-handle"><div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><div class="note-popover"><div class="note-link-popover popover bottom in" style="display: none;"><div class="arrow"></div><div class="popover-content note-link-content"><a href="http://www.google.com/" target="_blank">www.google.com</a>&nbsp;&nbsp;<div class="note-insert btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showLinkDialog" tabindex="-1" data-original-title="Edit"><i class="fa fa-edit icon-edit"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="unlink" tabindex="-1" data-original-title="Unlink"><i class="fa fa-unlink icon-unlink"></i></button></div></div></div><div class="note-image-popover popover bottom in" style="display: none;"><div class="arrow"></div><div class="popover-content note-image-content"><div class="btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="1" tabindex="-1" data-original-title="Resize Full"><span class="note-fontsize-10">100%</span> </button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="0.5" tabindex="-1" data-original-title="Resize Half"><span class="note-fontsize-10">50%</span> </button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="0.25" tabindex="-1" data-original-title="Resize Quarter"><span class="note-fontsize-10">25%</span> </button></div><div class="btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="left" tabindex="-1" data-original-title="Float Left"><i class="fa fa-align-left icon-align-left"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="right" tabindex="-1" data-original-title="Float Right"><i class="fa fa-align-right icon-align-right"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="none" tabindex="-1" data-original-title="Float None"><i class="fa fa-align-justify icon-align-justify"></i></button></div><div class="btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="removeMedia" data-value="none" tabindex="-1" data-original-title="Remove Image"><i class="fa fa-trash-o icon-trash"></i></button></div></div></div></div><div class="note-toolbar btn-toolbar"><div class="note-style btn-group"><button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" title="" data-toggle="dropdown" tabindex="-1" data-original-title="Style"><i class="fa fa-magic icon-magic"></i> <span class="caret"></span></button><ul class="dropdown-menu"><li><a data-event="formatBlock" data-value="p">Normal</a></li><li><a data-event="formatBlock" data-value="blockquote"><blockquote>Quote</blockquote></a></li><li><a data-event="formatBlock" data-value="pre">Code</a></li><li><a data-event="formatBlock" data-value="h1"><h1>Header 1</h1></a></li><li><a data-event="formatBlock" data-value="h2"><h2>Header 2</h2></a></li><li><a data-event="formatBlock" data-value="h3"><h3>Header 3</h3></a></li><li><a data-event="formatBlock" data-value="h4"><h4>Header 4</h4></a></li><li><a data-event="formatBlock" data-value="h5"><h5>Header 5</h5></a></li><li><a data-event="formatBlock" data-value="h6"><h6>Header 6</h6></a></li></ul></div><div class="note-font btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+B" data-mac-shortcut="⌘+B" data-event="bold" tabindex="-1" data-original-title="Bold (Ctrl+B)"><i class="fa fa-bold icon-bold"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+I" data-mac-shortcut="⌘+I" data-event="italic" tabindex="-1" data-original-title="Italic (Ctrl+I)"><i class="fa fa-italic icon-italic"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+U" data-mac-shortcut="⌘+U" data-event="underline" tabindex="-1" data-original-title="Underline (Ctrl+U)"><i class="fa fa-underline icon-underline"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+\" data-mac-shortcut="⌘+\" data-event="removeFormat" tabindex="-1" data-original-title="Remove Font Style (Ctrl+\)"><i class="fa fa-eraser icon-eraser"></i></button></div><div class="note-fontname btn-group"><button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Font Family"><span class="note-current-fontname">Arial</span> <b class="caret"></b></button><ul class="dropdown-menu"><li><a data-event="fontName" data-value="Serif"><i class="fa fa-check icon-ok"></i> Serif</a></li><li><a data-event="fontName" data-value="Sans"><i class="fa fa-check icon-ok"></i> Sans</a></li><li><a data-event="fontName" data-value="Arial"><i class="fa fa-check icon-ok"></i> Arial</a></li><li><a data-event="fontName" data-value="Arial Black"><i class="fa fa-check icon-ok"></i> Arial Black</a></li><li><a data-event="fontName" data-value="Courier"><i class="fa fa-check icon-ok"></i> Courier</a></li><li><a data-event="fontName" data-value="Courier New"><i class="fa fa-check icon-ok"></i> Courier New</a></li><li><a data-event="fontName" data-value="Comic Sans MS"><i class="fa fa-check icon-ok"></i> Comic Sans MS</a></li><li><a data-event="fontName" data-value="Helvetica"><i class="fa fa-check icon-ok"></i> Helvetica</a></li><li><a data-event="fontName" data-value="Impact"><i class="fa fa-check icon-ok"></i> Impact</a></li><li><a data-event="fontName" data-value="Lucida Grande"><i class="fa fa-check icon-ok"></i> Lucida Grande</a></li><li><a data-event="fontName" data-value="Lucida Sans"><i class="fa fa-check icon-ok"></i> Lucida Sans</a></li><li><a data-event="fontName" data-value="Tahoma"><i class="fa fa-check icon-ok"></i> Tahoma</a></li><li><a data-event="fontName" data-value="Times"><i class="fa fa-check icon-ok"></i> Times</a></li><li><a data-event="fontName" data-value="Times New Roman"><i class="fa fa-check icon-ok"></i> Times New Roman</a></li><li><a data-event="fontName" data-value="Verdana"><i class="fa fa-check icon-ok"></i> Verdana</a></li></ul></div><div class="note-color btn-group"><button type="button" class="btn btn-default btn-sm btn-small note-recent-color" title="" data-event="color" data-value="{&quot;backColor&quot;:&quot;yellow&quot;}" tabindex="-1" data-original-title="Recent Color"><i class="fa fa-font icon-font" style="color:black;background-color:yellow;"></i></button><button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" title="" data-toggle="dropdown" tabindex="-1" data-original-title="More Color"><span class="caret"></span></button><ul class="dropdown-menu"><li><div class="btn-group"><div class="note-palette-title">BackColor</div><div class="note-color-reset" data-event="backColor" data-value="inherit" title="Transparent">Set transparent</div><div class="note-color-palette" data-target-event="backColor"><div><button type="button" class="note-color-btn" style="background-color:#000000;" data-event="backColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242;" data-event="backColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363;" data-event="backColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="backColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="backColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="backColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="backColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="backColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div><button type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="backColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="backColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="backColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="backColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="backColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="backColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="backColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="backColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div><button type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="backColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="backColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="backColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="backColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="backColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="backColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="backColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="backColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div><button type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="backColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="backColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="backColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="backColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="backColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="backColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="backColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="backColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div><button type="button" class="note-color-btn" style="background-color:#E76363;" data-event="backColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="backColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="backColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="backColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="backColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="backColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="backColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="backColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div><button type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="backColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439;" data-event="backColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="backColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="backColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="backColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="backColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="backColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="backColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div><button type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="backColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308;" data-event="backColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="backColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21;" data-event="backColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="backColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294;" data-event="backColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873;" data-event="backColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842;" data-event="backColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div><button type="button" class="note-color-btn" style="background-color:#630000;" data-event="backColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="backColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300;" data-event="backColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218;" data-event="backColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139;" data-event="backColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163;" data-event="backColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A;" data-event="backColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="backColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div><div class="btn-group"><div class="note-palette-title">FontColor</div><div class="note-color-reset" data-event="foreColor" data-value="inherit" title="Reset">Reset to default</div><div class="note-color-palette" data-target-event="foreColor"><div><button type="button" class="note-color-btn" style="background-color:#000000;" data-event="foreColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242;" data-event="foreColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363;" data-event="foreColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="foreColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="foreColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="foreColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="foreColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="foreColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div><button type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="foreColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="foreColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="foreColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="foreColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="foreColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="foreColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="foreColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="foreColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div><button type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="foreColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="foreColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="foreColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="foreColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="foreColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="foreColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="foreColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="foreColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div><button type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="foreColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="foreColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="foreColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="foreColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="foreColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="foreColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="foreColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="foreColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div><button type="button" class="note-color-btn" style="background-color:#E76363;" data-event="foreColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="foreColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="foreColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="foreColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="foreColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="foreColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="foreColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="foreColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div><button type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="foreColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439;" data-event="foreColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="foreColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="foreColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="foreColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="foreColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="foreColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="foreColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div><button type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="foreColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308;" data-event="foreColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="foreColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21;" data-event="foreColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="foreColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294;" data-event="foreColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873;" data-event="foreColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842;" data-event="foreColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div><button type="button" class="note-color-btn" style="background-color:#630000;" data-event="foreColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="foreColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300;" data-event="foreColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218;" data-event="foreColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139;" data-event="foreColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163;" data-event="foreColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A;" data-event="foreColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="foreColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div></li></ul></div><div class="note-para btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+Shift+8" data-mac-shortcut="⌘+⇧+7" data-event="insertUnorderedList" tabindex="-1" data-original-title="Unordered list (Ctrl+Shift+8)"><i class="fa fa-list-ul icon-list-ul"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+Shift+7" data-mac-shortcut="⌘+⇧+8" data-event="insertOrderedList" tabindex="-1" data-original-title="Ordered list (Ctrl+Shift+7)"><i class="fa fa-list-ol icon-list-ol"></i></button><button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" title="" data-toggle="dropdown" tabindex="-1" data-original-title="Paragraph"><i class="fa fa-align-left icon-align-left"></i>  <span class="caret"></span></button><div class="dropdown-menu"><div class="note-align btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+Shift+L" data-mac-shortcut="⌘+⇧+L" data-event="justifyLeft" tabindex="-1" data-original-title="Align left (Ctrl+Shift+L)"><i class="fa fa-align-left icon-align-left"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+Shift+E" data-mac-shortcut="⌘+⇧+E" data-event="justifyCenter" tabindex="-1" data-original-title="Align center (Ctrl+Shift+E)"><i class="fa fa-align-center icon-align-center"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+Shift+R" data-mac-shortcut="⌘+⇧+R" data-event="justifyRight" tabindex="-1" data-original-title="Align right (Ctrl+Shift+R)"><i class="fa fa-align-right icon-align-right"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+Shift+J" data-mac-shortcut="⌘+⇧+J" data-event="justifyFull" tabindex="-1" data-original-title="Justify full (Ctrl+Shift+J)"><i class="fa fa-align-justify icon-align-justify"></i></button></div><div class="note-list btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+[" data-mac-shortcut="⌘+[" data-event="outdent" tabindex="-1" data-original-title="Outdent (Ctrl+[)"><i class="fa fa-outdent icon-indent-left"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+]" data-mac-shortcut="⌘+]" data-event="indent" tabindex="-1" data-original-title="Indent (Ctrl+])"><i class="fa fa-indent icon-indent-right"></i></button></div></div></div><div class="note-height btn-group"><button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1" data-original-title="Line Height"><i class="fa fa-text-height icon-text-height"></i>&nbsp; <b class="caret"></b></button><ul class="dropdown-menu"><li><a data-event="lineHeight" data-value="1.0"><i class="fa fa-check icon-ok"></i> 1.0</a></li><li><a data-event="lineHeight" data-value="1.2"><i class="fa fa-check icon-ok"></i> 1.2</a></li><li><a data-event="lineHeight" data-value="1.4"><i class="fa fa-check icon-ok"></i> 1.4</a></li><li><a data-event="lineHeight" data-value="1.5"><i class="fa fa-check icon-ok"></i> 1.5</a></li><li><a data-event="lineHeight" data-value="1.6"><i class="fa fa-check icon-ok"></i> 1.6</a></li><li><a data-event="lineHeight" data-value="1.8"><i class="fa fa-check icon-ok"></i> 1.8</a></li><li><a data-event="lineHeight" data-value="2.0"><i class="fa fa-check icon-ok"></i> 2.0</a></li><li><a data-event="lineHeight" data-value="3.0"><i class="fa fa-check icon-ok"></i> 3.0</a></li></ul></div><div class="note-table btn-group"><button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" title="" data-toggle="dropdown" tabindex="-1" data-original-title="Table"><i class="fa fa-table icon-table"></i> <span class="caret"></span></button><ul class="dropdown-menu"><div class="note-dimension-picker"><div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1"></div><div class="note-dimension-picker-highlighted"></div><div class="note-dimension-picker-unhighlighted"></div></div><div class="note-dimension-display"> 1 x 1 </div></ul></div><div class="note-insert btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showLinkDialog" data-shortcut="Ctrl+K" data-mac-shortcut="⌘+K" tabindex="-1" data-original-title="Link (Ctrl+K)"><i class="fa fa-link icon-link"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showImageDialog" tabindex="-1" data-original-title="Picture"><i class="fa fa-picture-o icon-picture"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showVideoDialog" tabindex="-1" data-original-title="Video"><i class="fa fa-youtube-play icon-play"></i></button></div><div class="note-view btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="fullscreen" tabindex="-1" data-original-title="Full Screen"><i class="fa fa-arrows-alt icon-fullscreen"></i></button><button type="button" class="btn btn-default btn-sm btn-small" title="" data-event="codeview" tabindex="-1" data-original-title="Code View"><i class="fa fa-code icon-code"></i></button></div><div class="note-help btn-group"><button type="button" class="btn btn-default btn-sm btn-small" title="" data-shortcut="Ctrl+/" data-mac-shortcut="⌘+/" data-event="showHelpDialog" tabindex="-1" data-original-title="Help (Ctrl+/)"><i class="fa fa-question icon-question"></i></button></div></div><textarea class="note-codable"></textarea><div class="note-editable" contenteditable="true" style="height: 200px;"><p>Seasons <b>coming up</b></p></div><div class="note-statusbar"><div class="note-resizebar"><div class="note-icon-bar"></div><div class="note-icon-bar"></div><div class="note-icon-bar"></div></div></div></div>
        </div>
    </div>

    <!-- Javascript -->
    <script>
        init.push(function () {
            if (! $('html').hasClass('ie8')) {
                $("#bs-markdown-example").markdown({ iconlibrary: 'fa' });
            }

            $('#markdown-boxed').switcher({
                on_state_content: '<span class="fa fa-check" style="font-size:11px;"></span>',
                off_state_content: '<span class="fa fa-times" style="font-size:11px;"></span>'
            });
            $('#markdown-boxed').on($('html').hasClass('ie8') ? "propertychange" : "change", function () {
                var $panel = $(this).parents('.panel');
                if ($(this).is(':checked')) {
                    $panel.find('.panel-body').addClass('no-padding');
                    $panel.find('.panel-body > *').addClass('no-border');
                } else {
                    $panel.find('.panel-body').removeClass('no-padding');
                    $panel.find('.panel-body > *').removeClass('no-border');
                }
            });
        });
    </script>
    <!-- / Javascript -->

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"><a href="http://toopay.github.io/bootstrap-markdown/" target="_blank">Bootstrap Markdown <i class="fa fa-link"></i></a></span>
            <div class="panel-heading-controls">
                <span class="panel-heading-text" style="font-size:11px;font-weight:600;">BOXED&nbsp;&nbsp;</span>
                <div class="switcher switcher-sm">
                    <input type="checkbox" data-class="switcher-sm" id="markdown-boxed">
                    {{--<div class="switcher-toggler"></div>--}}
                    <div class="switcher-inner">
                        <div class="switcher-state-on"><span class="fa fa-check" style="font-size:11px;"></span></div>
                        {{--<div class="switcher-state-off"><span class="fa fa-times" style="font-size:11px;"></span></div>--}}
                    </div>
                </div>
            </div> <!-- / .panel-heading-controls -->
        </div>
        <div class="panel-body">
            <div class="md-editor" id="1453198928151">

                <textarea name="content" id="bs-markdown-example" class="form-control md-input" rows="10" style="resize: none;"></textarea>
            </div>
        </div>
    </div>
    {{--Form components /Editors:: Ends--}}

@stop
