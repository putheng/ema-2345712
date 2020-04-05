<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Role</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<roles></roles>
					<div class="col-lg-8">
						<div class="card card-fluid">
							<h6 class="card-header"> Create a Role </h6>
							<div class="card-body">
								<app-form action="admin/roles" redirect="admin/role">
									<app-input name="name" label="Role name"/>
									<hr>
									<div class="form-actions">
										<app-button type="submit">Create</app-button>
									</div>
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
			...mapActions({
				fetchRoles: 'admin/fetchRoles'
			})
		},
		computed: {
			...mapGetters({
				roles: 'admin/getRoles'
			})
		},
		mounted(){
			this.fetchRoles()
		}
	}
</script>
