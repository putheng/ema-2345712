<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

    	<title>{{ config('app.name', 'Laravel') }}</title>
		<link href="{{ asset('css/home.css') }}" rel="stylesheet">
		<link rel="shortcut icon" href="/images/favicon.ico">
	</head>

	<body>
		<div id="app" class="w-full">
			<home-page/>
		</div>
	{{-- <script src="{{ asset('js/app.js?v='. time()) }}"></script> --}}
	<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
