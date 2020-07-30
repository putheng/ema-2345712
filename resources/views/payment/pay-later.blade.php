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
				<li class="breadcrumb-item text-nowrap active" aria-current="page">ទូទាត់នៅពេលក្រោយ</li>
			</ol>
		</nav>

		<div class="row no-gutters pb-5 mb-xl-3">
			<div class="col-xl-6 mb-3">
				<h2 class="h5 mb-1 d-flex justify-content-between">
					<span>លេខសំរាប់បង់ប្រាក់:</span> 
					<span class="text-danger">{{ $data->bill_code }}</span>
				</h2>
				<p class="d-flex mb-0 justify-content-between">
					<span>ចំនួនទឹកប្រាក់</span>
					<span>{{ $data->currency }} 
						<strong>{{ number_format($data->amount, 2) }}</strong>
					</span>
				</p>
				<p class="d-flex mt-0 justify-content-between">
					<span>កាលបរិច្ឆេទ</span>
					<span>{{ $date }}</span>
				</p>
				<p class="text-center">
					<strong>ទូទាត់​​ តាមភ្នាក់ងារ​ ឬកម្មវិធីហិរញ្ញវត្ថុ</strong>
				</p>

				<div class="d-flex justify-content-center">
					<ul class="list-group list-group-horizontal">
						@foreach($data->app_or_agency_payment_methods as $item)
						<li class="list-group-item text-center">
							<div class="mb-2 font-size-sm" style="color: {{$item->primary_color}};">{{ $item->name }}</div>
							<img src="{{ $item->logo }}" style="width: 80px;">
							<div class="mt-2" style="color: {{$item->primary_color}};">{{ $item->biller_code }}</div>
						</li>
						@endforeach
					</ul>
				</div>

				<div class="mt-2">
					<div class="d-flex flex-wrap justify-content-between align-items-center rounded-lg border py-2 px-3 mb-4">
						<div class="media media-ie-fix align-items-center mr-3 py-2">
							<div class="media-body">
								<div>
									<p class="font-size-sm">
										<span class="text-danger">កំណត់សម្គាល់:</span>
										សូមធ្វើការថតស្គ្រុីននេះ​ ឬកត់លេខសំរាប់បង់ប្រាក់ដែលមានពណ៍ក្រហម​ព្រមទាំងលេខសម្គាល់ភ្នាក់ងារទូទាត់ប្រាក់ខាងលើ​ ទៅជួបនឹងភ្នាក់ងារបង់ប្រាក់ណាមួយដើម្បីទូទាត់ប្រាក់ជាការស្រេច។
									</p>
									<div class="font-size-sm">
										<span class="text-danger">របៀបបង់ប្រាក់ជាមួយភ្នាក់ងារវីង ឬកម្មវិធីវីង:</span>
										<div class="font-size-sm mt-0">
											- ចូលទៅកាន់ Bill24 Co., Ltd ({{ $data->currency }}) ឬវាយលេខកូដ​ 9125
										</div>
										<div>
											- លេខទូរស័ព្ទប្រើ App របស់អ្នក
										</div>
										<div>
											- លេខសំរាប់បង់ប្រាក់ <strong>{{ $data->bill_code }}</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!---->
				</div>

				<div class="rounded-lg border py-2 px-3 mb-4">
					<h2 class="h5 mb-0">ទំនិញដែលអ្នកបានបញ្ជារទិញ</h2>

					@foreach($products as $product)
						<div class="media align-items-center py-2">
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

				<div class="mt-2">
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