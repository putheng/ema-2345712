<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Users</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Users </h3>
								<table class="table">
									<thead>
										<th>#</th>
										<th>Name</th>
										<th>Email</th>
										<th>UUID</th>
										<th>Action</th>
									</thead>
									<tbody>
										<tr v-for="user in users">
											<td>{{ user.id }}</td>
											<td>{{ user.name }}</td>
											<td>{{ user.email }}</td>
											<td>{{ user.uuid }}</td>
											<td>
												<a href="#" @click.prevent="deletex(user)">Delete</a>
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
		<UserModal @created="created" v-if="isShow" :user="user"/>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import UserModal from './partials/UserModal'

	export default {
		data(){
			return {
				users: [],
				isShow: false,
				user: null
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('admin/users')

				this.users = r.data.data
			},

			async deletex(user){
				if(confirm('Are you sure to delete this user?')){
					let r = await axios.delete('admin/users/'+ user.id)

					this.users = r.data.data
				}
			},

			openModal(user){
				this.isShow = true

				this.user = user

				$('#passwordReset').modal('show')
			},

			created(){
				$('#passwordReset').modal('hide')
			}
		},
		components: {
			UserModal
		},
		mounted(){
			this.fetch()
		}
	}
</script>
