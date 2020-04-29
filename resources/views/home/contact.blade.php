@extends('layouts.main')
@section('content')
<br>
<section class="px-lg-3 pt-4 container">
  <div class="px-3 pt-2">
    <nav class="mb-4" aria-label="breadcrumb">
      <ol class="breadcrumb flex-lg-nowrap">
        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/') }}">
          <i class="czi-home"></i>Home</a>
        </li>
        <li class="breadcrumb-item text-nowrap active" aria-current="page">
          Contacts
        </li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-grid-gutter">
        <a class="card" target="_blank" href="https://maps.google.com/maps?ll=11.624919,104.859517&z=12&t=m&hl=en&gl=KH&mapclient=embed&daddr=%E5%90%B4%E5%B3%A5%E5%AE%87i07%2F09%20Phnom%20Penh%20Unnamed%20Road@11.624919,104.859517" data-scroll="">
          <div class="card-body text-center">
            <i class="czi-location h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-2">Main store address</h3>
            <p class="font-size-sm text-muted">#I07/10 St.598, Sangkat Khmuonh, Khan Sen Sok,Phnom Penh</p>
            <div class="font-size-sm text-primary">Click to see map<i class="czi-arrow-right align-middle ml-1"></i></div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-md-6 mb-grid-gutter">
        <div class="card">
          <div class="card-body text-center">
            <i class="czi-time h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-3">Working hours</h3>
            <ul class="list-unstyled font-size-sm text-muted mb-0">
              <li>Mon-Sun </li>
              <li class="mb-0">8AM-5PM</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-grid-gutter">
        <div class="card">
          <div class="card-body text-center">
            <i class="czi-phone h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-3">Phone numbers</h3>
            <ul class="list-unstyled font-size-sm mb-0">
              <li><span class="text-muted mr-1">For customers:</span>
                <a class="nav-link-style" href="tel:+855085598188">+855 085 598 188</a>
              </li>
              <li class="mb-0"><span class="text-muted mr-1">Tech support:</span>
                <a class="nav-link-style" href="tel:+855087598188">+855 087 598 188</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-grid-gutter">
        <div class="card">
          <div class="card-body text-center">
            <i class="czi-mail h3 mt-2 mb-4 text-primary"></i>
            <h3 class="h6 mb-3">Email addresses</h3>
            <ul class="list-unstyled font-size-sm mb-0">
              <li><span class="text-muted mr-1"></span>
                <a class="nav-link-style" href="mailto:info@emarketasia.com">info@emarketasia.com</a>
              </li>
              <li class="mb-0"><span class="text-muted mr-1"></span>
                <a class="nav-link-style" href="mailto:suport@emarketasia.com">suport@emarketasia.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid px-0" id="map">
      <div class="row no-gutters">
        <div class="col-lg-6 iframe-full-height-wrap">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62540.884199636734!2d104.84459385249183!3d11.565813747864286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095371932c84bd%3A0x4f4e2e72563a5361!2z5ZC05bOl5a6HaTA3LzA5!5e0!3m2!1sen!2skh!4v1587202498389!5m2!1sen!2skh" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-lg-6 px-4 px-xl-5 py-2 border-top">
          <h2 class="h4 mb-4">Drop us a line</h2>
          <form class="needs-validation mb-3" novalidate>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-name">Your name:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" id="cf-name" placeholder="Your name" required>
                  <div class="invalid-feedback">Please fill in you name!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-email">Email address:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="email" id="cf-email" placeholder="your@email.com" required>
                  <div class="invalid-feedback">Please provide valid email address!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-phone">Your phone:&nbsp;<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" id="cf-phone" placeholder="+855 00 000 000" required>
                  <div class="invalid-feedback">Please provide valid phone number!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cf-subject">Subject:</label>
                  <input class="form-control" type="text" id="cf-subject" placeholder="Provide short title of your request">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="cf-message">Message:&nbsp;<span class="text-danger">*</span></label>
              <textarea class="form-control" id="cf-message" rows="3" placeholder="Please describe in detail your request" required></textarea>
              <div class="invalid-feedback">Please write a message!</div>
            </div>
            <button class="btn btn-primary" type="submit">Send message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection