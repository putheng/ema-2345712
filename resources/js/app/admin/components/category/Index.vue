<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Category</h1>
				<a href="/icons" target="_blank">Icon class</a>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Create a category</h3>
								<app-form @created="created" action="admin/category" method="PATCH">
									<div class="row">
										<div class="col-md-5">
											<app-input name="name" label="Name"/>
										</div>
										<div class="col-md-5">
											<app-input name="icon" label="Icon"/>
										</div>
										<div class="col-md-2">
											<app-input name="area" label="Area" value="1"/>
										</div>
									</div>
									<app-button type="submit">Create</app-button>
								</app-form>
							</div>
						</div>

						<br>
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
												<a href="#" @click.prevent="edit(category)">
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
		<EditCategory @created="updated" v-if="isEdit" :category="category"/>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import EditCategory from './partials/EditCategory'

	export default {
		data(){
			return {
				categories: [],
				category: null,
				isEdit: false
			}
		},

		methods: {
			async fetchCategory(){
				let response = await axios.get('admin/category')

				this.categories = response.data.data
			},
			deactivate(slug){
				axios.post(`admin/category/${slug}`).then((response) => {
					this.categories = response.data.data
				}).catch(() => {
					
				})
			},

			created(e){
				this.categories = e.data.data
			},

			updated(e){
				$('#CategoryEdit').modal('hide')
			},

			edit(category){
				this.isEdit = true
				this.category = category
				$('#CategoryEdit').modal('show')
			}
		},
		components: {
			EditCategory
		},
		mounted(){
			this.fetchCategory()
		}
	}
</script>
