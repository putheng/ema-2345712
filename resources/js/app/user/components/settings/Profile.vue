<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Profile info</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Update you profile details below: </h3>
								<user-avatar sendAs="image" endpoint="account/avatar"/>
								<app-form action="customer/profile" v-if="user">
									<div class="row">
										<div class="col-md-6">
											<input-binding v-model="user.first_name" name="first_name" label="First Name"/>		
										</div>
										<div class="col-md-6">
											<input-binding v-model="user.last_name" name="last_name" label="Last Name"/>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<input-binding v-model="user.phone" name="phone" label="Phone number"/>	
										</div>
										<div class="col-md-6">
											<app-select  v-model="user.gender" label="Gender" name="gender" :options="genders" />
										</div>
									</div>
									
									<input-binding disabled v-model="user.email" name="email" label="Email" />

									<text-area-binding v-model="user.address" name="address" label="Address" />
									
									<br/>
									<div class="text-right">
										<app-button type="submit">Update profile</app-button>
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
		data(){
			return {
				genders: [
					{name: 'Male', value: '1'},
					{name: 'Femal', value: '2'},
				],
				user: null
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get(`customer/profile`)

				this.user = r.data.data
			}
		},
		computed: {
			//
		},
		created(){
			this.fetch()
		}
	}
</script>
