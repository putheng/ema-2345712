<template>
<div class="col-lg-4">
	<div class="card card-fluid">
		<h6 class="card-header"> Roles </h6>
		<nav class="nav nav-tabs flex-column border-0">
			<router-link class="nav-link" :to="{name: 'admin-settings-role'}">
				Create a Role
			</router-link>

			<template v-if="roles" v-for="role in roles">
				
				<router-link 
					class="nav-link" 
					:to="{ name: 'admin-settings-role-permission', params: { id: role.id }}">
					{{ role.name }}
				</router-link>
			</template>
			
		</nav>
	</div>
</div>
</template>

<script>

	export default {
		data(){
			return {
				roles: []
			}
		},
		methods: {
			fetchRoles(){
				axios.get('admin/roles').then((response) => {
					this.roles = response.data.data
				}).catch((error) => {

				})
			}
		},
		mounted(){
			this.fetchRoles()
		}
	}
</script>