<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/jquery-ui.structure.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/jquery-ui.theme.min.css') }}" rel="stylesheet">
		
		<title>@yield('title')</title>

		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyDFvZEsznwExtNhXBuBw7J1tz2O7QNZlYM&libraries=places"></script>
		<script src="{{ asset('/js/locationpicker.jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
	</head>
	<body data-spy="scroll" data-target="#nav" data-offset="50">
		@include('layouts.header')

		@yield('content')

		@include('layouts.footer')

		<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/custom.js') }}"></script>
	</body>
</html>
