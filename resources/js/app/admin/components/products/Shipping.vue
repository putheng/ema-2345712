<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Shipping</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Add Shipping Method</h3>
								<app-form @created="created" action="admin/shipping">
									<div class="row">
										<div class="col-md-4">
											<app-input name="name" label="Name" />		
										</div>
										<div class="col-md-4">
											<app-input name="price" label="Price ($)" />	
										</div>
										<div class="col-md-4">
											<app-select name="city_id" :options="cities" label="Place"/>
										</div>
									</div>

									<app-button type="submit">Create</app-button>
									<br>
								</app-form>
							</div>
						</div>
						<br>

						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title">Shipping Method</h3>

								<div class="responsive-table">
									<table class="table">
										<thead>
											<th>#</th>
											<th>Name</th>
											<th>Price</th>
											<th>Place</th>
											<th>Action</th>
										</thead>
										<tbody>
											<tr v-for="shipping in shippings">
												<td>{{ shipping.id }}</td>
												<td>{{ shipping.name }}</td>
												<td>{{ shipping.price }}</td>
												<td>{{ shipping.place }}</td>
												<td>
													<a href="#">Edit</a> |
													<a @click.prevent="deleteShipping(shipping.id)" href="#">Delete</a>
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
				cities: [],
				shippings: []
			}
		},
		methods: {
			async fetchCity(){
				let c = await axios.get('admin/city')
				this.cities = c.data.data

				let s = await axios.get('admin/shipping')
				this.shippings = s.data.data
			},
			created(r){
				this.shippings = r.data.data
			},
			async deleteShipping(id){
				if(confirm('Are sure to delete this Shipping?')){
					let r = await axios.delete(`admin/shipping/${id}`)
					this.shippings = r.data.data
				}
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetchCity()
		}
	}
</script>
