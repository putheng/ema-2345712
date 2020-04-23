<template>
<div class="page-inner">
	<div class="section-block">
		<div class="card card-fluid">
			<div class="card-body">
				<h4 class="card-title">
					Update your profile
				</h4>
				<div class="card-text col-md-8">
					<user-avatar sendAs="image" endpoint="account/avatar"/>
					<app-form action="account/me" method="post">
						
						<br/><br/>
						<div class="row">
							<div class="col-md-6">
								<app-input name="first_name" label="First name"/>
							</div>
							<div class="col-md-6">
								<app-input name="last_name" label="Last name"/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<AppSelect 
									:options="genders" 
									label="Gender" name="gener"/>
							</div>
							<div class="col-md-6">
								<app-input name="dob" label="Date of birth" type="date"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<AppSelect 
									:options="idTypes" 
									label="ID Type" name="id_type"/>
							</div>
							<div class="col-md-6">
								<app-input name="id_number" label="ID Number" type="number"/>
							</div>
						</div>
						
						<br>
						<app-button type="submit">Update</app-button>
						<br>
						<br>
					</app-form>
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
					{name: 'Male', value: 'male'},
					{name: 'Femal', value: 'femal'}	
				],
				idTypes: [
					{name: 'National ID', value: '1'},
					{name: 'Family Book', value: '2'},
					{name: 'Driving Licence', value: '3'},
				]
			}
		},
		methods: {
			//
		},
		computed: {
			...mapGetters({
        		user: 'userData'
        	})
		},
		mounted(){
			//
		}
	}
</script>
