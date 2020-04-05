<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

    	<title>{{ config('app.name', 'Laravel') }}</title>
		<link rel="stylesheet" href="{{ asset('css/auth.css?v=2') }}">
		<link rel="shortcut icon" href="/images/favicon.ico">
	</head>

	<body class="default-skin">
		<div id="app" class="main-flex">
			<router-view />
		</div>


	<script src="{{ asset('js/app.js?v='. time()) }}"></script>
	</body>
</html>
