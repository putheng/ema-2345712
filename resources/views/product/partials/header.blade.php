
<header class="bg-light box-shadow-sm fixed-top">
  <div class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand d-none d-sm-block mr-3 mr-xl-4 flex-shrink-0" href="{{ url('/') }}" style="min-width: 7rem;"><img width="142" src="/images/logo-50.png" alt="E-Market"/></a><a class="navbar-brand d-sm-none mr-2" href="{{ url('/home') }}" style="min-width: 4.625rem;"><img width="74" src="/images/logo-50.png" alt="E-Market"/></a>
      <!-- Search-->
      @include('home.partials.global-search')
      <!-- Toolbar-->
      <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center ml-xl-2">
        <a class="navbar-toggler" href="#sideNav" data-toggle="sidebar"><span class="navbar-toggler-icon"></span></a>
        <a class="navbar-tool d-flex d-lg-none" href="#searchBox" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="searchBox">
          <span class="navbar-tool-tooltip">Search</span>
          <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-search"></i></div>
        </a>
        
        @if(auth()->check())
          {{-- <a class="navbar-tool d-lg-flex" href="{{ auth()->user()->dashboard() }}/cart/wishlist">
            <span class="navbar-tool-tooltip">Wishlist</span>
            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-heart"></i></div>
          </a> --}}
          <a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="{{ auth()->user()->dashboard() }}">
            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-user"></i></div>
            <div class="navbar-tool-text ml-n3"><small>Hello, {{ auth()->user()->name }}</small>My Account</div>
          </a>
          <card-list-header/>
        @else
          <a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="#signin-modal" data-toggle="modal">
              <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-user"></i></div>
            <div class="navbar-tool-text ml-n3"><small>Hello, Sign in</small>My Account</div>
          </a>
        @endif
        
      </div>
    </div>
  </div>
  <!-- Search collapse-->
  <div class="collapse" id="searchBox">
    <div class="card pt-2 pb-4 border-0 rounded-0">
      <div class="container">
        <div class="input-group-overlay">
          <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
          <input class="form-control prepended-form-control" type="text" placeholder="Search for products">
        </div>
      </div>
    </div>
  </div>
</header>