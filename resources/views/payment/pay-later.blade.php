@extends('product.layout')

@section('content')
<br>
<section class="px-lg-3 pt-4 container">
	<div class="px-3 pt-2">
		<!-- Page title + breadcrumb-->
		<nav class="mb-4" aria-label="breadcrumb">
			<ol class="breadcrumb flex-lg-nowrap">
				<li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('index') }}"><i class="czi-home"></i>Home</a></li>
				<li class="breadcrumb-item text-nowrap active" aria-current="page">Pay later</li>
			</ol>
		</nav>

		<div class="row no-gutters pb-5 mb-xl-3">
			<div class="col-xl-6 mb-3">
				<h2 class="h5 mb-1">Tran. ID: {{ $data->bill_code }}</h2>
				<p>Please note this tran. ID for pay later with payment partner bellow:</p>

				<ul>
					@foreach($data->app_or_agency_payment_methods as $item)
					<li>
						<span>{{ $item->name }}</span> <code>{{ $item->biller_code }}</code>
					</li>
					@endforeach
				</ul>

				<div value="1">
					<div class="d-flex flex-wrap justify-content-between align-items-center rounded-lg border py-2 px-3 mb-4">
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
				<div>
					<h2 class="h5 pb-3">Your order</h2>

					@foreach($products as $product)
						<div class="media align-items-center py-2 border-bottom">
							<div class="media-body">
								<h6 class="widget-product-title">
									{{ $product->name }}
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
			</div>
		</div>
		
	</div>
</section>
@endsection