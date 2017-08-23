<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <meta charset="UTF-8">
    <meta name="description" content="Siyaleader Durban University of Technology">
    <meta name="keywords" content="Siyaleader,Durban University of Technology, HIV/AIDS">
    <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ asset('/img/favicon.ico?v1') }}">


    <title>Siyaleader Ports</title>


    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/generics.css') }}" rel="stylesheet">


<style>
    body {
        margin: 0;
        padding: 0;
        /*  Background fallback in case of IE8 & down, or in case video doens't load, such as with slower connections  */
        background: #333;
        background-attachment: fixed;
        background-size: cover;
    }

    /* The only rule that matters */
    #video-background {
        /*  making the video fullscreen  */
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -100;
    }

    /* These just style the content */
    article {
        /*  just a fancy border  */
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border: 10px solid rgba(255, 255, 255, 0.5);
        margin: 10px;
    }

    h1 {
        position: absolute;
        top: 60%;
        width: 100%;
        font-size: 36px;
        letter-spacing: 3px;
        color: #fff;
        font-family: Oswald, sans-serif;
        text-align: center;
    }

    h1 span {
        font-family: sans-serif;
        letter-spacing: 0;
        font-weight: 300;
        font-size: 16px;
        line-height: 24px;
    }

    h1 span a {
        color: #fff;
    }
    </style>
</head>


<!--  Content  -->


<!--  Video is muted & autoplays, placed after major DOM elements for performance & has an image fallback  -->
<video autoplay loop id="video-background" muted plays-inline>
    <source src="{{ asset('media/backtech.mp4') }}" type="video/mp4">
</video>
<body>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('status'))
    <div class="alert alert-info">{{ Session::get('status') }}</div>
@endif
<section id="login">
    <header>
        <h1></h1>
        <p></p>
    </header>

    <div class="row">
        <div class="col-md-6">

            <form class="box tile animated active" id="box-login" role="form" method="POST" action="{{ url('/auth/login') }}">
                <h2 class="m-t-0 m-b-15">Login</h2>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="login-control m-b-10" placeholder="Cellphone number" name="cellphone">
                <input type="password" class="login-control" placeholder="Password" name="password">
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox" name="remember" id="rememberMeCheck">
                        Remember Me
                    </label>
                </div>
                <button class="btn btn-default btn-sm m-r-5" type="submit">Sign In</button>

                <small>

                    <a class="box-switcher" data-switch="box-reset" href="">Forgot/Change Password?</a>
                </small>
            </form>

            <form class="box animated tile" id="box-reset" method="POST" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}
                <h2 class="m-t-0 m-b-15">Reset Password</h2>
                <p></p>
                <input type="email" class="login-control m-b-20" name="email" placeholder="Email Address">

                <button class="btn btn-default btn-sm m-r-5" type="submit">Send Password Reset Link</button>

                <small><a class="box-switcher" data-switch="box-login" href="">Already have an Account?</a></small>
            </form>
        </div>


        <div class="col-md-6"  >
            <img class="" src="{{ asset('/img/ubulewembo.png') }}" width="75%" alt="">
        </div>
    </div>


    </div>

    <div class="clearfix"></div>

    <!-- Login -->

</section>

<!-- Javascript Libraries -->
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script> <!-- jQuery Library -->

<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!--  Form Related -->
{{--<script src="{{ asset('js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->--}}

<!-- All JS functions -->
<script src="{{ asset('js/functions.js') }}"></script>
</body>
</html>
