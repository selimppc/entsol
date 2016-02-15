@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')

        <!-- 6. $WIZARD_FORMS_VALIDATION ===================================================================

                            Wizard forms validation

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
        $("#wizard-user_info").validate({
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
        $('#wizard-user_info').on('submit', function () {
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
        <span class="panel-title">Form validation</span>
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

@stop