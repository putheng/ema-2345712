<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">My payment methods</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Primary payment method is used by default </h3>
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<th>Your credit / debit cards</th>
											<th>Name on card</th>
											<th>Expires on</th>
											<th></th>
										</thead>

										<tbody>
											<tr>
												<td>
													<div class="media align-items-center">
														<img class="mr-2" src="/images/card-visa.png" width="39" alt="Visa">
														<div class="media-body">
															<span class="font-weight-medium text-heading mr-1">Visa</span>
															ending in 4999
															<span class="align-middle badge badge-info ml-2">Primary</span>
														</div>
													</div>
												</td>
												<td>SARA PUTHENG</td>
												<td>08 / 2019</td>
												<td>
													<button type="button" class="btn btn-sm btn-outline-dark">
														<span class="menu-icon oi oi-pencil"></span>
													</button>
													<button type="button" class="btn btn-sm btn-outline-danger">
														<span class="menu-icon oi oi-trash"></span>
													</button>
												</td>
											</tr>
											<tr>
												<td>
													<div class="media align-items-center">
														<img class="mr-2" src="/images/card-master.png" width="39" alt="Visa">
														<div class="media-body">
															<span class="font-weight-medium text-heading mr-1">MasterCard</span>
															ending in 0015
														</div>
													</div>
												</td>
												<td>SARA PUTHENG</td>
												<td>08 / 2019</td>
												<td>
													<button type="button" class="btn btn-sm btn-outline-dark">
														<span class="menu-icon oi oi-pencil"></span>
													</button>
													<button type="button" class="btn btn-sm btn-outline-danger">
														<span class="menu-icon oi oi-trash"></span>
													</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="text-right">
									<hr>
									<button 
										type="button" 
										class="btn btn-outline-danger"
										data-toggle="modal" 
										data-target="#AddCardModal"
									>
										Add payment method
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<AddCardModal/>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import AddCardModal from './partials/AddCardModal'

	export default {
		components: {
			AddCardModal
		},
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
