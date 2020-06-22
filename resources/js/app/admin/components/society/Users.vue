<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Society</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-2">
						<div class="input-group mb-3">
							<input v-model="q" type="text" class="form-control">
							<div class="input-group-append">
							<button 
							@click.prevent="search"
							class="btn btn-primary" 
							type="button">Search</button>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Users </h3>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<th>UUID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Action</th>
										</thead>
										<tbody>
											<tr v-for="user in users">
												<td>{{ user.uuid }}</td>
												<td>{{ user.name }}</td>
												<td>{{ user.email }}</td>
												<td>{{ user.phone }}</td>
												<td>
													<a href="#" @click.prevent="deletex(user)">Delete</a> |
													<a href="#" @click.prevent="updateUser(user)">Update</a>
													<div>
														<a href="#" @click.prevent="openModal(user)">Reset Password</a>
													</div>
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
		</div>
		<UserModal @created="created" v-if="isShow" :user="user"/>
		<Update @updated="updated" v-if="isUpdate" :user="user"/>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import UserModal from './partials/UserModal'
	import Update from './partials/Update'

	export default {
		data(){
			return {
				users: [],
				isShow: false,
				isUpdate: false,
				user: null,
				q: 'EMA0000'
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('admin/society')

				this.users = r.data.data
			},

			async deletex(user){
				if(confirm('Are you sure to delete this user?')){
					let r = await axios.delete('admin/society/'+ user.id +'/delete')

					this.users = r.data.data
				}
			},

			async search(){
				let r = await axios.get(`admin/society/filter?q=${this.q}`)

				this.users = r.data.data
			},

			openModal(user){
				this.isShow = true

				this.user = user

				$('#passwordReset').modal('show')
			},

			updateUser(user){
				this.isUpdate = true

				this.user = user

				$('#UpateReset').modal('show')
			},

			created(){
				$('#passwordReset').modal('hide')
			},
			updated(){
				$('#UpateReset').modal('hide')
			}
		},
		components: {
			Update,
			UserModal
		},
		mounted(){
			this.fetch()
		}
	}
</script>
