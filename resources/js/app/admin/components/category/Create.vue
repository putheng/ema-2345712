<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Category</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-10">
				<div class="card card-fluid">
					<!-- <div class="card-header border-bottom-0"> JSON Generation </div> -->
					<div id="nestable03" class="dd">
						<ol class="dd-list">
							<li class="dd-item" data-id="4" v-if="categories" v-for="category in categories">
								<div class="dd-handle">
									<div>{{ category.id }}. {{ category.name }}</div>
									<div class="dd-nodrag btn-group ml-auto">
										<button class="btn btn-sm btn-secondary" 
											@click.prevent="edit(category)">Edit</button>

										<button class="btn btn-sm btn-secondary">Add</button>
										<button class="btn btn-sm btn-secondary">
											<i class="far fa-trash-alt"></i>
										</button>
									</div>
								</div>
								<ol class="dd-list" v-if="category.children" >
									<li class="dd-item" data-id="5" v-for="child in category.children">
										<div class="dd-handle">
											
											<div>
												{{ child.id }}.
												{{ child.name }}
											</div>
											<div class="dd-nodrag btn-group ml-auto">
												<button class="btn btn-sm btn-secondary" 
													@click.prevent="edit(category)">Edit</button>
													
												<button class="btn btn-sm btn-secondary">
													<i class="far fa-trash-alt"></i>
												</button>
											</div>
										</div>
									</li>
								</ol>
							</li>
						</ol>
					</div>
					<div class="card-footer">
						<a @click.prevent="create" href="#" class="card-footer-item justify-content-start">
							<span><i class="fa fa-plus-circle mr-1"></i> Add a category</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<CreateCategory @created="created"/>
	<EditCategory @created="updated" v-if="isEdit" :category="category"/>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import EditCategory from './partials/EditCategory'
	import CreateCategory from './partials/CreateCategory'

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

			create(){
				$('#CategoryCreate').modal('show')
			},

			created(e){
				this.categories = e.data.data
				$('#CategoryCreate').modal('hide')
			},

			updated(e){
				this.categories = e.data.data
				$('#CategoryEdit').modal('hide')
			},

			edit(category){
				this.isEdit = true
				this.category = category
				$('#CategoryEdit').modal('show')
			}
		},
		components: {
			EditCategory,
			CreateCategory
		},
		mounted(){
			this.fetchCategory()
		}
	}
</script>
