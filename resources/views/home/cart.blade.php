@extends('layouts.main')

@section('head')
  <script type="text/javascript" src="https://js.stripe.com/v3"></script>
@endsection

@section('content')
<main class="container pt-4">
  <section class="px-lg-3 pt-4">
    <div class="pt-2">
      <!-- Page title + breadcrumb-->
      <nav class="mb-4" aria-label="breadcrumb">
        <ol class="breadcrumb flex-lg-nowrap">
          <li class="breadcrumb-item">
            <a class="text-nowrap" href="{{ url('/') }}">
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