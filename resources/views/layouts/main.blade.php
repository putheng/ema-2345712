<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home | E-Market Asia</title>
		<meta name="description" content="Emarket Asia E-commerce">
		<meta name="keywords" content="Emarket Asia E-commerce shop, e-commerce, market">
		<meta name="author" content="Createx Studio">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="shortcut icon" href="/images/logo-s.png">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
		<link rel="stylesheet" media="screen" href="{{ asset('css/vendor.min.css') }}">
		<link rel="stylesheet" media="screen" id="main-styles" href="{{ asset('css/theme.min.css?v=2') }}">
		@yield('head')
	</head>
	<body class="bg-secondary">
		<div id="app">
			@include('home.partials.sign-model')
			@include('product.partials.header')
			@include('product.partials.aside')
			<main class="sidebar-fixed-enabled" style="padding-top: 5rem;">
				@yield('content')
				@include('product.partials.footer')
			</main>
			<a class="btn-scroll-top" href="#top" data-scroll>
				<span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
				<i class="btn-scroll-top-icon czi-arrow-up">   </i>
			</a>
		</div>

		<script src="{{ asset('js/app.js?v='. time()) }}"></script>
		<script src="{{ asset('js/vendor.min.js?v=3') }}"></script>
		<script src="{{ asset('js/theme.js') }}"></script>
		@yield('script')
	</body>
</html>