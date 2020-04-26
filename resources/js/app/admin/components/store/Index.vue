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
										<th>Address</th>
										<th>Status</th>
									</thead>
									<tbody>
										<tr v-if="stores" v-for="(store, key) in stores">
											<td>{{ store.store }}</td>
											<td>{{ store.store }}</td>
											<td>{{ store.username }}</td>
											<td>{{ store.phone }}</td>
											<td>{{ store.status }}</td>
											<td>
												<template v-if="store.status != 'active'">
													<a href="#" @click.prevent="activate(store.id, 'active')">	
														Activate
													</a>
												</template>
												<template v-else>
													<a href="#" @click.prevent="activate(store.id, 'deactivate')">
														Deactivate
													</a>	
												</template>
												|
												<a href="#" @click.prevent="topup(store)">Top Up</a>
												|
												<a href="#">Impersonate</a>
											</td>
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
		<StoreTopup :store="store" v-if="isOpen"/>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import StoreTopup from './partials/StoreTopup'

	export default {
		data(){
			return {
				stores: [],
				isOpen: false,
				store: []
			}
		},
		methods: {
			async activate(id, action){
				let r = await axios.put(`store/store/${id}`, {status: action})

				this.stores = r.data.data
			},
			async fetch(){
				let r = await axios.get('store/store')

				this.stores = r.data.data
			},
			topup(store){
				this.isOpen = true
				this.store = store

				$('#StoreTopup').modal('show')
			}
		},
		components: {
			StoreTopup
		},
		mounted(){
			this.fetch()
		}
	}
</script>
	