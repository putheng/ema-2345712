<template>
<div class="card card-fluid">
	<h6 class="card-header"> Permissions </h6>
	<div class="card-body">
		<form method="post">
			<div class="form-group">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="same-address">
					<label class="custom-control-label" for="same-address">
						permission
					</label>
				</div>
			</div>
			<hr>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary ml-auto">
					Update
				</button>
			</div>
		</form>
	</div>
</div>
</template>

<script>
	export default {
		data(){
			return {
				permissions: []
			}
		},
		methods: {
			fetchPermissions(){
				axios.get('admin/permissions').then((response) => {
					this.permissions = response.data.data
				}).catch((error) => {

				})
			}
		},
		mounted(){
			this.fetchRoles()
		}
	}
</script>