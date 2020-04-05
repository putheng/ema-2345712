<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">My wishlist</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> List of items you added to wishlist:</h3>
								<table class="table">
									<tbody>
										<tr>
											<td>
												<img width="100" src="https://demo.createx.studio/cartzilla/img/shop/cart/01.jpg">
											</td>
											<td>
												Women Colorblock Sneakers
												<div>Size: 8.5</div>
												<div>Color: White & Blue</div>
												<h5>$154.00</h5>
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
												Cotton Polo Regular Fit
												<div>Size: 8.5</div>
												<div>Color: White & Blue</div>
												<h5>$154.00</h5>
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
