@extends('user_template')

@section('content')
    <div class="pageHeader">
        <div class="container">
            <section class="title-section">
                <h1 class="title-header">Login</h1>
            </section>
        </div>
    </div>
    @include('user.sections.flash-message')
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">LogIn</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ url('forgot') }}">Forgot password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form autocomplete="off" id="login_form" class="form-horizontal" role="form" method="post" action="{{ url('/doLogin') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
                        </div>
                        <div style="margin-bottom: 25px"></div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div style="margin-bottom: 25px"></div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button class="ladda-button" type="submit" id="submitBtn" data-style="expand-right" data-size="xs">
                                    <span class="ladda-label">Submit</span>
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function(){

            // validate login form on key-up and submit
            var validator = $("#login_form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Enter a email",
                        email: "Enter a valid email address."
                    },
                    password: {
                        required: "Enter a password",
                        minlength: "Enter a valid password"
                    }
                },
                errorClass: 'text-red',
                // the errorPlacement has to take the table layout into account
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent().next());
                },
                submitHandler: function(form) {
                    var l = Ladda.create( document.querySelector( '#submitBtn' ) );
                    l.start();

                    $('#submitBtn').attr('disabled','disabled');
                    form.submit();
                }

            });
        });
    </script>
@endsection