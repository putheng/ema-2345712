<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- End Required meta tags -->
		<!-- Begin SEO tag -->
		<title> Dashboard </title>

    	<link rel="shortcut icon" href="/images/logo-s.png">
		<!-- End FAVICONS -->
		<link rel="stylesheet" href="{{ asset('css/app.css?v=3') }}">
		    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		<!-- .app -->
		<div id="app" class="app">
			
			<!--[if lt IE 10]>
			<div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
			<![endif]-->
			<store-layout></store-layout>
			<!-- /.app-main -->
		</div>
		<!-- /.app -->
	    <!-- Scripts -->
	    <script src="{{ asset('js/app.js?v='. time()) }}" defer></script>
	    <script src="{{ asset('js/plugin.js') }}" defer></script>
	</body>
</html>