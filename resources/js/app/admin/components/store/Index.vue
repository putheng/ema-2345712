<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Stores</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Store List </h3>
								
								<table class="table">
									<thead>
										<th>#</th>
										<th>Name</th>
										<th>Contact Person</th>
										<th>Phone</th>
									</thead>
									<tbody>
										<tr v-if="stores.data" v-for="(store, key) in stores.data">
											<td>{{ store.store }}</td>
											<td>{{ store.store }}</td>
											<td>{{ store.username }}</td>
											<td>{{ store.phone }}</td>
											<!-- <td>120</td>
											<td>
												<a href="#">Deactivate</a> |
												<a href="#">View</a> |
												<a href="#">Impersonate</a>
											</td> -->
										</tr>
										<tr v-else>
											<td colspan="4">
												<p>There is no store.</p>
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
			...mapActions({
				fetch: 'admin/fetchStores'
			})
		},
		computed: {
			...mapGetters({
				stores: 'admin/getStores'
			})
		},
		mounted(){
			this.fetch()
		}
	}
</script>
