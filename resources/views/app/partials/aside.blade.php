<aside class="cz-sidebar cz-sidebar-fixed" id="sideNav" style="padding-top: 5rem;">
  <button class="close" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle">Close sidebar</span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
  <div class="cz-sidebar-inner">
    <div class="cz-sidebar-body pt-3 pb-0" data-simplebar>
      <div class="tab-content">
        <!-- Categories-->
        <div class="sidebar-nav tab-pane fade show active" id="categories" role="tabpanel">
          <div class="widget widget-categories">
            <div class="accordion" id="shop-categories">

              <!-- Bakery-->
              @foreach($categories as $category)
                <div class="card border-bottom">
                  <div class="card-header">
                    <h3 class="accordion-heading font-size-base px-grid-gutter">
                      <a class="collapsed py-3" href="#{{ $category->slug }}" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="fish">
                        <span class="d-flex align-items-center">
                          @if($category->image != null)
                            <img src="/app/category/{{ $category->image }}" style="width: 45px; height: 44px;" class="mr-1">
                          @elseif($category->icon != null)
                            <i class="{{ $category->icon }} font-size-lg opacity-60 mr-2"></i>
                          @endif
                        {{ $category->name }}</span>
                        <span class="accordion-indicator"></span>
                      </a>
                    </h3>
                  </div>
                  <div class="collapse" id="{{ $category->slug }}" data-parent="#shop-categories">
                    <div class="card-body px-grid-gutter pb-4">
                      <div class="widget widget-links">
                        <ul class="widget-list">
                          <li class="widget-list-item">
                            <a class="widget-list-link" href="{{ route('app.category', $category) }}">View all</a>
                          </li>
                          @if($category->children->count())
                            @foreach($category->children as $children)
                              <li class="widget-list-item">
                                <a class="widget-list-link" href="{{ route('app.category', $children) }}">{{ $children->name }}</a>
                              </li>
                            @endforeach
                          @endif
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
        </div>
        <!-- Menu-->
      </div>
    </div>
    <div class="px-grid-gutter pt-1 pb-1">
      <div class="d-flex mb-3">
        <i class="czi-support h4 mb-0 font-weight-normal text-primary mt-1 mr-1"></i>
        <div class="pl-2">
          <div class="text-muted font-size-sm">Support</div>
          <a class="nav-link-style font-size-md" href="tel:+100331697720">+855 85 598 188</a>
        </div>
      </div>
      <div class="d-flex mb-3">
        <i class="czi-mail h5 mb-0 font-weight-normal text-primary mt-1 mr-1"></i>
        <div class="pl-2">
          <div class="text-muted font-size-sm">Email</div>
          <a class="nav-link-style font-size-md" href="mailto:support@emarketasia.com">support@emarketasia.com</a>
        </div>
      </div>
      <h6 class="pt-2 pb-1">Follow us</h6>
      <a class="social-btn sb-outline sb-twitter mr-2 mb-2" href="#"><i class="czi-twitter"></i></a><a class="social-btn sb-outline sb-facebook mr-2 mb-2" href="#"><i class="czi-facebook"></i></a><a class="social-btn sb-outline sb-instagram mr-2 mb-2" href="#"><i class="czi-instagram"></i></a><a class="social-btn sb-outline sb-youtube mr-2 mb-2" href="#"><i class="czi-youtube"></i></a>
    </div>
  </div>
</aside>
