<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Shipping Place</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-8">
				<div class="card card-fluid">
					<div class="card-body">
						<h3 class="card-title">Add Shipping Place </h3>
						<app-form @created="created" action="admin/city">
							<div class="row">
								<div class="col-md-6">
									<app-input name="name" label="Name" />		
								</div>
								<div class="col-md-6">
									<app-select name="country_id" :options="countries" label="Country"/>
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
						<h3 class="card-title">Places</h3>

						<div class="responsive-table">
							<table class="table">
								<thead>
									<th>#</th>
									<th>Name</th>
									<th>Action</th>
								</thead>
								<tbody>
									<tr v-for="city in cities">
										<td>{{ city.id }}</td>
										<td>{{ city.name }}</td>
										<td>
											<a href="#">Edit</a> |
											<a @click.prevent="deleteCity(city.id)" href="#">Delete</a>
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
		data(){
			return {
				countries: [],
				cities: []
			}
		},
		methods: {
			async fetchCountry(){
				let r = await axios.get('countries')
				let c = await axios.get('admin/city')

				this.countries = r.data.data
				this.cities = c.data.data
			},
			created(r){
				this.cities = r.data.data
			},
			async deleteCity(id){
				if(confirm('Are sure to delete this city?')){
					let r = await axios.delete(`admin/city/${id}`)
					this.cities = r.data.data
				}
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetchCountry()
		}
	}
</script>
