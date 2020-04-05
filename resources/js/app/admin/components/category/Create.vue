<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Categories</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Create a category</h3>
								<app-form action="admin/category" redirect="/admin/category">
									<app-input name="name" label="Name"/>
									<app-button type="submit">Create</app-button>
								</app-form>
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
