<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Change account password
			</h4>
			<div class="card-text col-md-6">
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
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		computed: {
			//
		}
	}
</script>