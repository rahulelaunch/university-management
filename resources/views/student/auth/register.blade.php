<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div class="loading-element">
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>
    </div>
    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                       
                            <div class="card">
                                <div class="card-body">

                                    <h3 class="text-center mt-0 m-b-15">
                                        <a href="index.html" class="logo logo-admin">

                                        </a>
                                    </h3>

                                    <h4 class="text-muted text-center font-20">Student Register</h4>

                                    <div class="p-2">
                                        <form class="form-horizontal m-t-20"  action="{{ route('student.register') }}" method="POST">
                                            @csrf

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="text" required="" placeholder="Name" name="name" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="email" required="" placeholder="Email" name="email" value="{{ old('email') }}">
                                                </div>
                                            </div>

                                        
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input type="password" class="form-control " placeholder="Password" name="password" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="number" required="" placeholder="Phone No." name="contact_no" value="{{ old('contact_no') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="date" required="" placeholder="BOD" name="bod" value="{{ old('dob') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="number" required="" placeholder="Adhaar card no" name="adhaar_card_no" value="{{ old('adhaar_card_no') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                <textarea  name="address" class="form-control" rows="3" placeholder="Enter your address"></textarea>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Sig Up</button>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="form-footer-link text-center mt-btn">
                                            <p class="font-open fw-500">Already have an account? <a href="{{route('student.login')}}" class="fw-600">Login</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $("#college_login").validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                email: {
                    required: "The email field is required.",
                },
                password: {
                    required: "The password field is required.",
                },
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
            }
        });
    </script>

</body>

</html>