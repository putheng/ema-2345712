@extends('layouts.main')

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
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Privacy</li>
        </ol>
      </nav>
      <!-- Content-->
      <!-- Checkout form-->
      <p>Privacy Policy</p>
    </div>
  </section>
  <!-- Footer-->
  
</main>
@endsection