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
    <link rel="stylesheet" media="screen" id="main-styles" href="{{ asset('css/theme.min.css?v=3') }}">
    @yield('head')
  </head>
  <!-- Body-->
  <body class="bg-secondary">
    <div id="app" >
    <!-- Sign in / sign up modal-->
    @include('home.partials.sign-model')
    <!-- Navbar-->
    @include('product.partials.header')
    <!-- Sidebar menu-->
    @include('product.partials.aside')
    <!-- Page-->
    <main class="sidebar-fixed-enabled" style="padding-top: 5rem;">
      
      @yield('content')
      <!-- Footer-->
      @include('product.partials.footer')
    </main>
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i class="btn-scroll-top-icon czi-arrow-up">   </i></a>
    </div>
    <!-- JavaScript libraries, plugins and custom scripts-->
    <script src="{{ asset('js/app.js?v='. time()) }}"></script>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/theme.min.js') }}"></script>
    @yield('script')
  </body>
</html>