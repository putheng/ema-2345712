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
					<app-form action="sociaty/account" method="post">
						
						<br/><br/>
						<div class="row">
							<div class="col-md-6">
								<input-binding v-model="user.first" name="first_name" label="First name"/>
							</div>
							<div class="col-md-6">
								<input-binding v-model="user.last" name="last_name" label="Last name"/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<input-binding v-model="user.phone" name="phone" label="Phone Number"/>
							</div>
							<div class="col-md-6">
								<input-binding v-model="user.age" name="age" label="Age" type="number"/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<select-binding
									:options="genders" 
									:selected="user.gender"
									label="Gender" name="gender"/>
							</div>
							<div class="col-md-6">
								<input-binding v-model="user.dob" name="dob" label="Date of birth" type="date"/>
							</div>
						</div>
						<div class="row" v-if="user.id_type">
							<div class="col-md-6">
								<select-binding
									:options="idTypes"
									:selected="user.id_type.id"
									label="ID Type" name="id_type"/>
							</div>
							<div class="col-md-6">
								<input-binding v-model="user.id_code" name="id_number" label="ID Number"/>
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
					{name: 'Male', value: '1'},
					{name: 'Female', value: '2'}	
				],
				idTypes: [
					{name: 'National ID', value: '1'},
					{name: 'Family Book', value: '2'},
					{name: 'Driving Licence', value: '3'},
				],
				user: []
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('sociaty/account')

				this.user = r.data.data
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetch()
		}
	}
</script>
