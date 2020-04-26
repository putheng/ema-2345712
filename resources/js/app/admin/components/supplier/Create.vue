<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Supplier</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Create supplier </h3>
								<app-form @created="created" action="admin/supplier">
									<div class="row">
										<div class="col-md-6">
											<app-input name="company" label="Company Name"/>
										</div>
										<div class="col-md-6">
											<app-input name="name" label="Person Name"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<app-input name="email" label="Email"/>
										</div>
										<div class="col-md-6">
											<app-input name="phone" label="Phone"/>
										</div>
									</div>
									<app-input name="address" label="Address"/>
									<app-text-area name="description" label="Description"/>
									<app-input type="password" name="password" label="Password"/>

									<app-button type="submit">Submit</app-button>
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
			created(e){
				this.$router.push({ name:'admin-supplier' })
			}
		},
		computed: {
			//
		},
		mounted(){
			//
		}
	}
</script>
