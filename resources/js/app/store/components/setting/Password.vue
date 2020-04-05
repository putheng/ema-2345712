<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Password</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-10">
				<div class="card card-fluid">
					<div class="card-body">
						<h4 class="card-title">
							Change account password
						</h4>
						<div class="card-text col-md-10">
							<app-form action="account/password" method="post">
								<app-input type="password" name="current_password" label="Current password:"/>
								<app-input type="password" name="password" label="New password:"/>
								<app-input type="password" name="password_confirmation" label="Confirm the new password:"/>
								
								<br>
								<app-button type="submit">Update</app-button>
								<br>
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
