@extends('product.layout')

@section('content')
<br>
<section class="px-lg-3 pt-4 container">
	<div class="px-3 pt-2">
		<!-- Page title + breadcrumb-->
		<nav class="mb-4" aria-label="breadcrumb">
			<ol class="breadcrumb flex-lg-nowrap">
				<li class="breadcrumb-item">
					<a class="text-nowrap d-none d-sm-block" href="{{ route('index') }}"><i class="czi-home"></i>Home</a>
					<a class="text-nowrap d-sm-none" href="{{ route('index') }}/home"><i class="czi-home"></i>Home</a>
				</li>
				<li class="breadcrumb-item text-nowrap active" aria-current="page">Complete</li>
			</ol>
		</nav>
		<!-- Content-->
		<!-- Sorting-->
		<section class="d-md-flex justify-content-between align-items-center mb-4 pb-2">
			<h1 class="h2 mb-2 mb-md-0 mr-3">ការទូទាត់បានជោគជ័យ</h1>
		</section>
		<!-- Product grid-->

		<div class="row no-gutters pb-5 mb-xl-3">
			<div class="col-xl-6 mb-3">
				<h2 class="h5 mb-1 d-flex justify-content-between">
					<span>លេខវិក្កយបត្រ:</span> 
					<span class="text-danger">{{ $data->reference_id }}</span>
				</h2>
				<p class="d-flex mb-0 justify-content-between">
					<span>ចំនួនទឹកប្រាក់</span>
					<span>{{ $data->currency }} 
						<strong>{{ number_format($order->total()->amount(), 2) }}</strong>
					</span>
				</p>
				<p class="d-flex mt-0 justify-content-between">
					<span>កាលបរិច្ឆេទ</span>
					<span>{{ $date }}</span>
				</p>

				<div class="rounded-lg border py-2 px-3 mb-1 mt-2">
					<h2 class="font-size-md mb-0">ទំនិញដែលអ្នកបានបញ្ជារទិញ</h2>

					@foreach($products as $product)
						<div class="media align-items-center py-2">
							<div class="media-body">
								<h6 class="widget-product-title">
									{{ $product->product->name }} - {{ $product->name }}
								</h6>
								<div class="widget-product-meta">
									<div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
										<div><span class="text-accent mr-2">{{ $product->tax_price->formatted() }}</span> <span class="text-muted">x 
											{{ $product->pivot->quantity }}</span></div>
										<div></div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>

				<div>
					<div class="rounded-lg border py-2 px-3 mb-4">
						<div class="media media-ie-fix align-items-center mr-3 py-2">
							<div class="media-body">
								<div class="font-size-ms text-muted">Shipping to:</div>
								<div class="font-size-md font-weight-medium text-heading">
									{{ $order->address->name }} - {{ $order->address->phone }}<br>
									{{ $order->address->address }},
									{{ $order->address->country->name }}
								</div>
							</div>
						</div>
					</div>
					<!---->
				</div>
			</div>
		</div>
		
	</div>
</section>
@endsection