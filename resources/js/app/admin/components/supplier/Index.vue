<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Suppliers</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Suppliers List </h3>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<th>#</th>
											<th>Name</th>
											<th>Contact Person</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Address</th>
											<th>Status</th>
											<th>Action</th>
										</thead>
										<tbody>
											<tr v-if="suppliers" v-for="(supplier, key) in suppliers">
												<td>{{ supplier.id }}</td>
												<td>{{ supplier.supplier.name }}</td>
												<td>{{ supplier.name }}</td>
												<td>{{ supplier.supplier.phone }}</td>
												<td>{{ supplier.email }}</td>
												<td>{{ supplier.supplier.address }}</td>
												<td>{{ supplier.supplier.status }}</td>
												
												<td>
													<template v-if="supplier.supplier.status != 'active'">
														<a href="#" @click.prevent="activate(supplier.supplier.id, 'active')">	
															Activate
														</a>
													</template>
													<template v-else>
														<a href="#" @click.prevent="activate(supplier.supplier.id, 'deactivate')">
															Deactivate
														</a>	
													</template>
													
												</td>
											</tr>
											<tr v-else>
												<td colspan="4">
													<p>There is no supliers.</p>
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
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		data(){
			return {
				suppliers: []
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('admin/supplier')

				this.suppliers = r.data.data
			},

			async activate(id, action){
				let r = await axios.put(`admin/supplier/${id}`, {status: action})

				this.suppliers = r.data.data
			}
		},
		computed: {
			
		},
		mounted(){
			this.fetch()
		}
	}
</script>
