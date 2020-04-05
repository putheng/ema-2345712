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
							<h6 class="card-header"> 
								<input id="checkall" type="checkbox" v-model="selectAll">
								<label for="checkall">Permissions</label> 
							</h6>
							<div class="card-body">
								<form @submit.prevent="saveChanges">
									<div v-if="data.permissions" v-for="permission in data.permissions"
										class="custom-control custom-checkbox">
										<input 
											class="custom-control-input" 
											type="checkbox" 
											:id="'id_'+ permission.id" 
											:value="permission.id"
											v-model="selectedPermission"
											>
										<label class="custom-control-label" :for="'id_'+ permission.id">{{ permission.name }}</label>
									</div>
									<hr>
									<div class="form-actions">
										<button disabled v-if="loading"
											class="btn btn-primary ml-auto">
											Updating...
										</button>

										<button v-else
											type="submit" class="btn btn-primary ml-auto">
											Update
										</button>
									</div>
								</form>
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
				data: [],
				loading: false
			}
		},
		methods: {
			...mapActions({
				fetchRoles: 'admin/fetchRoles'
			}),

			submit(){

			},

			fetchPermissions(){
				axios.get(`admin/roles/${this.$route.params.id}/permission`)
					.then((response) => {
						this.data = response.data.data
					}).catch((error) => {

					})
			},

			saveChanges(){
				this.loading = true
				axios.post(`admin/roles/${this.$route.params.id}/permission`, {
					permissions: this.selectedPermission
				}).then((response) => {
					this.loading = false
				})
			}
		},
		watch: {
			'$route' (to, from){
				this.fetchPermissions()
			}
		},
		computed: {
			...mapGetters({
				roles: 'admin/getRoles'
			}),
			selectedPermission:{
				get(){
					return this.data.permission
				},
				set(value){
					return this.data.permission = value
				}
			},
			selectAll:{
				get(){
					return this.data.permissions ? this.selectedPermission.length == this.data.permissions.length : false
				},
				set(value){
					let selected = [];

	                if (value && this.data) {
	                    this.data.permissions.forEach(function (permission) {
	                        selected.push(permission.id);
	                    });
	                }

	                this.selectedPermission = selected;
				}
			}
		},
		mounted(){
			this.fetchRoles()

			this.fetchPermissions()
		}
	}
</script>
