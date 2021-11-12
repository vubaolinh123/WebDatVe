
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ URL::to('assetLogin/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('assetLogin/css/main.css') }}">
<!--===============================================================================================-->
    @livewireStyles
    @livewireScripts
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                @livewire('frontend.login.login')

				<div class="login100-more" style="background-image: url('{{ URL::to('assetLogin/images/bg-01.jpg') }}');">
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="{{ URL::to('assetLogin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('assetLogin/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('assetLogin/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ URL::to('assetLogin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('assetLogin/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('assetLogin/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ URL::to('assetLogin/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('assetLogin/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->


</body>
</html>
