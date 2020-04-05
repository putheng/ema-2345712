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
								<app-form action="/">
									<div class="row">
										<div class="col-md-6">
											<app-input name="first_name" label="First Name"/>		
										</div>
										<div class="col-md-6">
											<app-input name="last_name" label="Last Name"/>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<app-input name="phone" label="Phone number"/>	
										</div>
										<div class="col-md-6">
											<app-select label="Gender" name="gender" :options="genders"></app-select>
										</div>
									</div>
									
									
									<app-input name="email" label="Email" disabled/>

									<app-text-area name="address" label="Address"></app-text-area>

									<app-input name="password" type="password" label="Password"/>
									
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
				]
			}
		},
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
