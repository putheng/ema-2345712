<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">
					Your products 
				</h1>
			</header>
			
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> 
									All Product 
									<small class="badge badge-subtle badge-info">5</small>
								</h3>
								<table class="table">
									<tbody>
										<tr>
											<td>
												<img width="100" src="https://demo.createx.studio/cartzilla/img/shop/cart/01.jpg">
											</td>
											<td>
												<h5>
													<a href="#">Women Colorblock Sneakers</a>
												</h5>
												<div>Sales: <strong>26</strong></div>
												<div>Earnings: <strong>$327.60</strong></div>
												<h5 class="text-info">$154.<small>00</small></h5>
											</td>
											<td>
												<button class="btn btn-sm btn-outline-danger">
													<span class="oi oi-trash mr-1"></span> Remove
												</button>
											</td>
										</tr>
										<tr>
											<td>
												<img width="100" src="https://demo.createx.studio/cartzilla/img/shop/cart/04.jpg">
											</td>
											<td>
												<h5>
													<a href="#">Cotton Polo Regular Fit</a>
												</h5>
												<div>Sales: <strong>26</strong></div>
												<div>Earnings: <strong>$327.60</strong></div>
												<h5 class="text-info">$154.<small>00</small></h5>
											</td>
											<td>
												<button class="btn btn-sm btn-outline-danger">
													<span class="oi oi-trash mr-1"></span> Remove
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			//
		},
		computed: {
			//
		},
		mounted(){
			//
		}
	}
</script>
