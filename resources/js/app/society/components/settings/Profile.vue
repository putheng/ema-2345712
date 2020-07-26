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
									v-model="user.gender"
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
									v-model="user.id_type.id"
									label="ID Type" name="id_type"/>
							</div>
							<div class="col-md-6">
								<input-binding v-model="user.id_code" name="id_number" label="ID Number"/>
							</div>
							<div class="col-md-12">
									<label>My referral url</label>
								<div class="input-group">
									<input type="text" class="form-control" :value="user.referal" disabled="">
									<div class="input-group-append">
										<button 
											v-clipboard:copy="user.referal"
											v-clipboard:success="onCopy"
											class="btn btn-primary" type="button">Copy</button>
									</div>
								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-md-12">
								<p>Upload your ID Photo</p>
							</div>
							<div class="col-md-3">
								<id-image-picker :image="user.id_image" name="photo"/>
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
					{name: 'Male', value: 'Male'},
					{name: 'Female', value: 'Female'}	
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
			},
			onCopy(e) {
		    	alert('You just copied: ' + e.text)
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
