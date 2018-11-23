<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Portal DCN</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('dcn_icon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('AdminBSB/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('AdminBSB/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('AdminBSB/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('AdminBSB/css/style.css')}}" rel="stylesheet">
    
    <style>
        html{
            background-image: url('{{URL::to("images/authentication/bg-login.jpg")}}');
        }
    </style>
</head>

<body class="login-page bg-pink">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Portal<b>DCN</b></a>
            <small>Network Data Center BCA</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <!--div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div-->
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" id="btnSubmit">SIGN IN</button>
                            <!-- <a class="btn btn-block bg-pink waves-effect" type="submit" href="{{URL::to('')}}">SIGN IN</a> -->
                        </div>
                    </div>
                    <!--div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div-->
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('AdminBSB/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('AdminBSB/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/jquery-validation/jquery.validate.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('AdminBSB/js/admin.js')}}"></script>
    <script src="{{ asset('AdminBSB/js/pages/examples/sign-in.js')}}"></script>

    <script>
        $(document).ready(function(){
            // $("#btnSubmit").click(function(e){
            //     e.preventDefault();
            //     if($("#username").val() == "admin"){
            //         if($("#password").val() == "admin"){
            //             window.location = "http://10.20.214.26";
            //         }else{
            //             alert("Invalid Password.");
            //         }
            //     }else if($("#username").val() == "user"){
            //         if($("#password").val() == "user"){
            //             window.location = "http://10.20.214.26";
            //         }else{
            //             alert("Invalid Password.");
            //         }
            //     }else{
            //         alert("Invalid User.");
            //     }
            // });
        });
    </script>
</body>

</html>