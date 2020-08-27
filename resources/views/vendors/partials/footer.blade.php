<footer class="bg-dark pt-5">
  <div class="container pt-2 pb-3">
    <div class="row">
      <div class="col-md-6 text-center text-md-left mb-4">
        <div class="text-nowrap mb-3"><a class="d-inline-block align-middle mt-n2 mr-2" href="#"><img class="d-block" width="117" src="/images/logo-50.png" alt="Cartzilla"/></a><span class="d-inline-block align-middle h5 font-weight-light text-white mb-0">Marketplace</span></div>
        <p class="font-size-sm text-white opacity-70 pb-1">High quality products created by our global community.</p>
        <h6 class="d-inline-block pr-3 mr-3 border-right border-light"><span class="text-primary">65,478 </span><span class="font-weight-normal text-white">Products</span></h6>
        <h6 class="d-inline-block pr-3 mr-3 border-right border-light"><span class="text-primary">2,521 </span><span class="font-weight-normal text-white">Members</span></h6>
        <h6 class="d-inline-block mr-3"><span class="text-primary">897 </span><span class="font-weight-normal text-white">Vendors</span></h6>
        <div class="widget mt-4 text-md-nowrap text-center text-md-left"><a class="social-btn sb-light sb-twitter mr-2 mb-2" href="#"><i class="czi-twitter"></i></a><a class="social-btn sb-light sb-facebook mr-2 mb-2" href="#"><i class="czi-facebook"></i></a><a class="social-btn sb-light sb-dribbble mr-2 mb-2" href="#"><i class="czi-dribbble"></i></a><a class="social-btn sb-light sb-behance mr-2 mb-2" href="#"><i class="czi-behance"></i></a><a class="social-btn sb-light sb-pinterest mr-2 mb-2" href="#"><i class="czi-pinterest"></i></a></div>
      </div>
      <!-- Mobile dropdown menu (visible on screens below md)-->
      <div class="col-12 d-md-none text-center mb-4 pb-2">
        <div class="btn-group dropdown d-block mx-auto mb-3">
          <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown">Categories</button>
          <ul class="dropdown-menu">
            @foreach($categories as $category)
              <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="btn-group dropdown d-block mx-auto">
          <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-toggle="dropdown">
          Company</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">About us</a>
            <li><a class="dropdown-item" href="{{ route('stores') }}">Store locator</a>
            <li><a class="dropdown-item" href="{{ route('contact') }}">Contacts</a>
            <li><a class="dropdown-item" href="{{ url('/auth/login') }}">Become a society</a>
          </ul>
        </div>
      </div>
      <!-- Desktop menu (visible on screens above md)-->
      <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
        <div class="widget widget-links widget-light pb-2">
          <h3 class="widget-title text-light">Categories</h3>
          <ul class="widget-list">
            @foreach($categories as $category)
              <li class="widget-list-item"><a class="widget-list-link" href="#">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
        <div class="widget widget-links widget-light pb-2">
          <h3 class="widget-title text-light">Company</h3>
          <ul class="widget-list">
              <li class="widget-list-item">
                <a class="widget-list-link" href="#">About us</a>
              </li>
              <li class="widget-list-item">
                <a class="widget-list-link" href="{{ route('stores') }}">Store locator</a>
              </li>

              <li class="widget-list-item">
                <a class="widget-list-link" href="{{ route('contact') }}">Contacts</a>
              </li>
              <li class="widget-list-item">
                <a class="widget-list-link" href="{{ url('/auth/login') }}">Become a society</a>
              </li>
              @if(auth()->check())
                <li class="widget-list-item">
                  <a class="widget-list-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logoutform').submit();">
                      Logout
                  </a>

                  <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
              @endif
            </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Second row-->
  <div class="pt-5 bg-darker">
    <div class="container">
      <div class="widget w-100 mb-4 pb-3 text-center mx-auto" style="max-width: 28rem;">
        <h3 class="widget-title text-light pb-1">Subscribe to newsletter</h3>
        <form class="validate" action="" method="get" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form">
          <div class="input-group input-group-overlay flex-nowrap">
            <div class="input-group-prepend-overlay"><span class="input-group-text text-muted font-size-base"><i class="czi-mail"></i></span></div>
            <input class="form-control prepended-form-control" type="email" name="EMAIL" id="mce-EMAIL" value="" placeholder="Your email" required>
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" name="subscribe" id="mc-embedded-subscribe">Subscribe*</button>
            </div>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true">
            <input type="text" name="b_c7103e2c981361a6639545bd5_29ca296126" tabindex="-1">
          </div><small class="form-text text-light opacity-50" id="mc-helper">*Receive early discount offers, updates and new products info.</small>
          <div class="subscribe-status"></div>
        </form>
      </div>
      <hr class="hr-light pb-4 mb-3">
      <div class="d-md-flex justify-content-between">
        <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">© All rights reserved. <a class="text-light" href="{{ route('index') }}" target="_blank" rel="noopener">E-Market Asia co., Ltd</a></div>
        <div class="widget widget-links widget-light pb-4">
          <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
            <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="#">Help Center</a></li>
            <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="#">Affiliates</a></li>
            <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="#">Support</a></li>
            <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="#">Terms &amp; Conditions</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>