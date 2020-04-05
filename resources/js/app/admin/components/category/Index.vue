<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Category</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Categories </h3>
								<table class="table">
									<thead>
										<th>#</th>
										<th>Title</th>
										<th>Product</th>
										<th>Action</th>
									</thead>
									<tbody>
										<tr v-if="categories" v-for="category in categories">
											<td>{{ category.id }}</td>
											<td>{{ category.name }}</td>
											<td>{{ category.products }}</td>
											<td>
												<a href="#">
													Edit
												</a>
												|
												<a href="#">
													Delete
												</a>
												|
												<a href="#">
													Deactivate
												</a>
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
				categories: []
			}
		},

		methods: {
			fetchCategory(){
				axios.get('admin/category').then((response) => {
					this.categories = response.data.data
				}).catch(() => {

				})
			},
			deactivate(slug){
				axios.post(`admin/category/${slug}`).then((response) => {
					this.categories = response.data.data
				}).catch(() => {
					
				})
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetchCategory()
		}
	}
</script>
