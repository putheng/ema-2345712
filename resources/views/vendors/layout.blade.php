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
  <!-- Body-->
  <body class="toolbar-enabled">
    <!-- Sign in / sign up modal-->
    
    <!-- Navbar Marketplace-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    @include('vendors.partials.header')
    @yield('content')
    <!-- Page Content-->
    <!-- Header-->
    
    <!-- Footer-->
    @include('vendors.partials.footer')
    <!-- Toolbar for handheld devices-->
    <div class="cz-handheld-toolbar">
      <div class="d-table table-fixed w-100">
        <a class="d-table-cell cz-handheld-toolbar-item" href="account-wishlist.html">
          <span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i></span>
          <span class="cz-handheld-toolbar-label">Wishlist</span>
        </a>
        <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)">
          <span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span>
          <span class="cz-handheld-toolbar-label">Menu</span>
        </a>
        <a class="d-table-cell cz-handheld-toolbar-item" href="shop-cart.html">
          <span class="cz-handheld-toolbar-icon">
            <i class="czi-cart"></i>
            <span class="badge badge-primary badge-pill ml-1">4</span>
          </span>
          <span class="cz-handheld-toolbar-label">$265.00</span>
        </a>
      </div>
    </div>
    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
      <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
      <i class="btn-scroll-top-icon czi-arrow-up">   </i>
    </a>
    <!-- JavaScript libraries, plugins and custom scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/theme.min.js') }}"></script>
  </body>
</html>