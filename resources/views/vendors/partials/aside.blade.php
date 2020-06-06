<aside class="col-lg-4">
  <div class="cz-sidebar-static h-100 border-right">
    <h6>Contacts</h6>
    <ul class="list-unstyled font-size-sm">
      <li><a class="nav-link-style d-flex align-items-center" href="mailto:{{ $user->email }}"><i class="czi-mail opacity-60 mr-2"></i>{{ $user->email }}</a></li>
      <li>
        <a class="nav-link-style d-flex align-items-center" href="#">
          <i class="czi-phone opacity-60 mr-2"></i>
          {{ $store->phone }}
        </a>
      </li>
      <li>
        <a class="nav-link-style d-flex align-items-center" href="#">
          <i class="czi-add-location opacity-60 mr-2"></i>
          {{ $store->address }}
        </a>
      </li>
    </ul><a class="social-btn sb-facebook sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-facebook"></i></a><a class="social-btn sb-twitter sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-twitter"></i></a><a class="social-btn sb-dribbble sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-dribbble"></i></a><a class="social-btn sb-behance sb-outline sb-sm mr-2 mb-2" href="#"><i class="czi-behance"></i></a>
    <hr class="my-4">
    <h6 class="pb-1">Send message</h6>
    <form class="needs-validation pb-2" method="post" novalidate>
      <div class="form-group">
        <textarea class="form-control" rows="6" placeholder="Your message" required></textarea>
        <div class="invalid-feedback">Please wirte your message!</div>
      </div>
      <button class="btn btn-primary btn-sm btn-block" type="submit">Send</button>
    </form>
  </div>
</aside>