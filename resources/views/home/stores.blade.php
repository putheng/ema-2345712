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
          Partner outlet stores
        </li>
      </ol>
    </nav>
    <section class="container pt-4 mt-md-4 mb-5">
      <h2 class="h3 text-center mb-3">Partner outlet stores</h2>
      <div class="row pt-4">

        @foreach($stores as $store)
          <div class="col-lg-4 col-sm-6 mb-grid-gutter">
            <div class="card border-0 box-shadow">
              {{-- <img class="card-img-top" src="/images/store/emarket.jpg" alt="Orlando"/> --}}
              <div class="card-body">
                <a href="{{ route('vendors.show', $store) }}"><h6>{{ $store->name }} </h6></a>
                <ul class="list-unstyled mb-0">
                  <li class="media pb-3 border-bottom">
                    <i class="czi-location font-size-lg mt-2 mb-0 text-primary"></i>
                    <div class="media-body pl-3"><span class="font-size-ms text-muted">Address</span><a class="d-block text-heading font-size-sm" href="">{{ $store->address }}</a></div>
                  </li>
                  <li class="media pt-2 pb-3 border-bottom">
                    <i class="czi-phone font-size-lg mt-2 mb-0 text-primary"></i>
                    <div class="media-body pl-3"><span class="font-size-ms text-muted">Call us</span><a class="d-block text-heading font-size-sm" href="#">{{ $store->phone }}</a></div>
                  </li>
                  <li class="media pt-2">
                    <i class="czi-mail font-size-lg mt-2 mb-0 text-primary"></i>
                    <div class="media-body pl-3"><span class="font-size-ms text-muted">Write us</span><a class="d-block text-heading font-size-sm" href="#">{{ $store->user->email }}</a></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </section>

  </div>
</section>
@endsection