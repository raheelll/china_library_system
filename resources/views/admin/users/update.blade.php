@extends('admin_template')

@section('external')
        <!-- Date picker css -->
<link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
<!-- Date picker JS -->
<script src="{{ asset("/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
@endsection

@section('content')
    <div class='row'>
        @include('admin.sections.flash-message')
        <form id="update_user_form" role="form" method="post" action="{{ url('/admin/doUpdateUser/'. $user['uid']) }}">
            <!-- form start -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Basic Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">First Name<sup class="error">*</sup></label>
                            <input type="text" class="form-control alphaOnly" name="first_name" id="first_name"
                                   placeholder="First Name"
                                   value="{{ old('first_name', $user['first_name']) }}"/>

                            <div></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name<sup class="error">*</sup></label>
                            <input type="text" class="form-control alphaOnly" name="last_name" id="last_name"
                                   placeholder="Last Name"
                                   value="{{ old('last_name', $user['last_name']) }}"/>
                            <div></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gender<sup class="error">*</sup></label>

                            <div class="radio" style="margin-top:0px;">
                                <label>
                                    <input type="radio" name="gender" id="gender"
                                           value="male" {{ (Input::old('gender') == 'male' || $user['gender'] == 'male') ? 'checked' : '' }} />
                                    Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="gender"
                                           value="female" {{ (Input::old('gender') == 'female' || $user['gender'] == 'female') ? 'checked' : '' }} />
                                    Female
                                </label>
                            </div>
                            <div id="gender-error" style="display: inline;"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date of birth<sup class="error">*</sup></label>
                            <input type="text" class="form-control pull-right" name="dob" id="dob"
                                   placeholder="Date of bith"
                                   value="{{ old('dob', $user['dob']) }}" style="background-color:#fff;" />
                            <div></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Account Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <div> {{ $user['email'] }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="text" class="form-control" name="password" id="password"
                                   placeholder="Password"
                                   value="{{ old('password') }}"/>
                            <div></div>
                        </div>
                        @if(!$user['is_activated'])
                            <div class="form-group">
                                <label for="exampleInputPassword1">Activation<sup class="error">*</sup></label>

                                <div class="radio" style="margin-top:0px;">
                                    <label>
                                        <input type="radio" name="activation" id="activation"
                                               value="1" {{ (Input::old('activation') == '1') ? 'checked' : '' }} />
                                        Send activation email to this user to activate his account
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="activation" id="activation"
                                               value="2" {{ (Input::old('activation') == '2') ? 'checked' : '' }} />
                                        Activate account now and send notification email
                                    </label>
                                </div>
                                <div id="status-error" style="display: inline;"></div>
                            </div>
                        @endif
                    </div>
                </div>

                @include('admin.common.submit_delete_button', [
                'box_style' => true,
                'submit_button_label' => 'Submit',
                'delete_button_label' => 'Delete',
                'delete_action_url'   =>  url('admin/users/delete/'. $user['uid'])
                ])
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {

            var validator = $("#update_user_form").validate({
                rules: {
                    first_name: {
                        required: true,
                        minlength: 3
                    },
                    last_name: {
                        required: true,
                        minlength: 3
                    },
                    gender: {
                        required: true
                    },
                    dob: {
                        required: true
                    },
                    password: {
                        required: false,
                        minlength: 6
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter first name",
                        minlength: jQuery.validator.format("Enter at least {0} characters")
                    },
                    last_name: {
                        required: "Please enter last name",
                        minlength: jQuery.validator.format("Enter at least {0} characters")
                    },
                    gender: {
                        required: "Please select gender"
                    },
                    dob: {
                        required: "Please select date of birth"
                    },
                    password: {
                        required: "Please enter password",
                        minlength: jQuery.validator.format("Enter at least {0} characters")
                    },
                    status: {
                        required: "Please select status"
                    }
                },
                errorClass: 'text-red',
                // the errorPlacement has to take the table layout into account
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "status") {
                        $("#status-error").html(error);
                    } else if (element.attr("name") == "gender") {
                        $("#gender-error").html(error);
                    } else {
                        error.appendTo(element.next());
                    }
                },
                submitHandler: function (form) {
                    var l = Ladda.create(document.querySelector('#submitBtn'));
                    l.start();

                    $('#submitBtn').attr('disabled', 'disabled');
                    form.submit();
                }

            });

            //Date picker
            $('#dob').datepicker({
                autoclose: true
            });

        });
    </script>
@endsection