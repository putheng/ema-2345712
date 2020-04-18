@extends('layouts.main')
@section('content')
<main class="container-fluid px-0">
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
  </div>
</section>
<br>
  <!-- Row: Shop online-->
  <section class="row no-gutters">
    <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" 
    style="min-height: 15rem; background-image: url(/images/store/01.jpg);"><span class="split-section-arrow arrow-left"></span></div>
    <div class="col-md-6 px-3 px-md-5 py-5">
      <div class="mx-auto py-lg-5" style="max-width: 35rem;">
        <h2 class="h3 pb-3">Search, Select, Buy online</h2>
        <p class="font-size-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p>
        <a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">View products</a>
      </div>
    </div>
  </section>
  <!-- Row: Delivery-->
  <section class="row no-gutters">
    <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url(/images/store/02.jpg);"><span class="split-section-arrow arrow-right"></span></div>
    <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
      <div class="mx-auto py-lg-5" style="max-width: 35rem;">
        <h2 class="h3 pb-3">Fast delivery worldwide</h2>
        <p class="font-size-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p>
        <a class="btn btn-accent btn-shadow" href="#">Shipping details</a>
      </div>
    </div>
  </section>
  <!-- Row: Mobile app-->
  <section class="row no-gutters">
    <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" 
    style="min-height: 15rem; background-image: url(/images/store/03.jpg);"><span class="split-section-arrow arrow-left"></span></div>
    <div class="col-md-6 px-3 px-md-5 py-5">
      <div class="mx-auto py-lg-5" style="max-width: 35rem;">
        <h2 class="h3 pb-3">Great mobile app. Shop on the go</h2>
        <p class="font-size-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod. Duis erat lectus, ultrices euismod sagittis at dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p>
        <a class="btn-market btn-apple mr-3 mb-3" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">App Store</span></a><a class="btn-market btn-google mb-3" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">Google Play</span></a>
      </div>
    </div>
  </section>
  <!-- Section: Shopping outlets-->
  <section class="row no-gutters">
    <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url(/images/store/04.jpg);"><span class="split-section-arrow arrow-right"></span></div>
    <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
      <div class="mx-auto py-lg-5" style="max-width: 35rem;">
        <h2 class="h3 pb-3">Shop offline. Cozy outlet stores</h2>
        <p class="font-size-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p>
        <a class="btn btn-warning btn-shadow" href="contacts.html">See outlet stores</a>
      </div>
    </div>
  </section>
  <hr>
  <!-- Section: Team-->
  <!-- Section: We are hiring-->
  <hr>
</main>
@endsection