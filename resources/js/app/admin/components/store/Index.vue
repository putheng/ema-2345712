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
										<th>Approval</th>
										<th>Sponsor ID</th>
									</thead>
									<tbody>
										<tr v-if="stores" v-for="(store, key) in stores">
											<td>{{ store.uuid }}</td>
											<td>{{ store.store }}</td>
											<td>{{ store.username }}</td>
											<td>{{ store.phone }}</td>
											<td>{{ store.address }}</td>
											<td>{{ store.status }}</td>
											<td>{{ store.approval }}</td>
											<td>{{ store.sponsor }}</td>
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
												<div>
													<a href="#" @click.prevent="commission(store)">Update Commission</a>
													|
													<template v-if="store.approval != 'approve'">
													<a href="#" @click.prevent="approve(store.id, 'approve')">	
														Approve
													</a>
												</template>
												<template v-else>
													<a href="#" @click.prevent="approve(store.id, 'deactivate')">
														Deactivate
													</a>	
												</template>
												</div>
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
		<StoreTopup @created="created" :store="store" v-if="isOpen"/>
		<UpdateCommission @updated="updated" v-if="isCommission" :store="store"/>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import StoreTopup from './partials/StoreTopup'
	import UpdateCommission from './partials/UpdateCommission'

	export default {
		data(){
			return {
				stores: [],
				isOpen: false,
				isCommission: false,
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
			async approve(id, action){
				let r = await axios.post(`admin/store/${id}/approve`, {status: action})

				this.stores = r.data.data
			},
			updated(e){
				this.stores = e.data.data
				$('#updateCommission').modal('hide')
			},
			topup(store){
				this.isOpen = true
				this.store = store

				$('#StoreTopup').modal('show')
			},
			commission(store){
				this.isCommission = true
				this.store = store
				$('#updateCommission').modal('show')
			},
			created(){
				$('#StoreTopup').modal('hide')
			}
		},
		components: {
			StoreTopup,
			UpdateCommission
		},
		mounted(){
			this.fetch()
		}
	}
</script>
	