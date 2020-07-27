@extends('layouts.main')

@section('content')
<main class="container">
  <section class="px-lg-3">
    <div class="pt-2">
      <!-- Page title + breadcrumb-->
      <nav class="mb-4" aria-label="breadcrumb">
        <ol class="breadcrumb flex-lg-nowrap">
          <li class="breadcrumb-item">
            <a class="text-nowrap d-none d-sm-block" href="{{ url('/') }}">
              <i class="czi-home"></i>
              Home
            </a>
            <a class="text-nowrap d-sm-none" href="{{ url('/home') }}">
              <i class="czi-home"></i>
              Home
            </a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
        </ol>
      </nav>
      <!-- Content-->
      <!-- Checkout form-->
      <cart-checkout-form/>
    </div>
  </section>
  <!-- Footer-->
  
</main>
@endsection