<!doctype html>
<html lang="en">

<head>
    <title>Login/Register Modal by Creative Tim</title>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


    <style>
        body {
            padding-top: 60px;
        }

    </style>

    @livewireStyles
    @livewireScripts

    <link href="{{ URL::to('backend/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('backend/css/login-register.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="{{ URL::to('backend/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ URL::to('backend/js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ URL::to('backend/js/login-register.js') }}" type="text/javascript"></script>

</head>

<body>
    <h1 class="p-3 text-center  alert bg-success"> 🎈 Chào mừng bạn đến với trang quảnv trị WEBBANVE 🎈</h1>
    <span class="text-center">Hãy là một cộng tác viên uy tín</span>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <a class="m-auto btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log
                    in</a>
                {{-- <a class="btn big-register" data-toggle="modal" href="javascript:void(0)"
                    onclick="openRegisterModal();">Register</a> --}}
            </div>
            <div class="col-sm-5"></div>
        </div>

        {{--  --}}
        @livewire('backend.login.login')
        {{--  --}}

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            openLoginModal();
        });
    </script>


</body>

</html>
