<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Create Sociaty Member
			</h4>
			<div class="card-text col-md-6">
				<form @submit.prevent="submit">
					
					<div class="form-group">
						<label for="name" class="col-form-label">Name</label>
						<input 
							v-model="form.name" 
							:class="{'is-invalid': validation['name']}"
							name="name" id="name" type="text" class="form-control">
						<div class="invalid-feedback" v-if="validation['name']">
				            <i class="fa fa-exclamation-circle fa-fw"></i>
				            {{ validation['name'][0] }}
				        </div>
					</div>

					<div class="form-group">
						<label for="email" class="col-form-label">Email</label>
						<input :class="{'is-invalid': validation['email']}"
							v-model="form.email" name="email" id="email" type="text" class="form-control">
							<div class="invalid-feedback" v-if="validation['email']">
					            <i class="fa fa-exclamation-circle fa-fw"></i>
					            {{ validation['email'][0] }}
					        </div>
					</div>

					<div class="form-group">
						<label for="phone" class="col-form-label">Phone number</label>
						<input :class="{'is-invalid': validation['phone']}"
							v-model="form.phone" name="phone" id="Phone" type="text" class="form-control">
							<div class="invalid-feedback" v-if="validation['phone']">
					            <i class="fa fa-exclamation-circle fa-fw"></i>
					            {{ validation['phone'][0] }}
					        </div>
					</div>

					<div class="form-group">
						<label for="password" class="col-form-label">Password</label>
						<input :class="{'is-invalid': validation['password']}"
							v-model="form.password" name="password" id="password" type="password" class="form-control">
							<div class="invalid-feedback" v-if="validation['password']">
					            <i class="fa fa-exclamation-circle fa-fw"></i>
					            {{ validation['password'][0] }}
					        </div>
					</div>

					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label for="placement" class="col-form-label">Placement Tree</label>
								<input @keyup="filterPlacement" :class="{'is-invalid': validation['placement']}"
									v-model="form.placement" name="placement" id="placeNamec" type="text" class="form-control">
								<div class="invalid-feedback" v-if="validation['placement']">
						            <i class="fa fa-exclamation-circle fa-fw"></i>
						            {{ validation['placement'][0] }}
						        </div>
							</div>
							
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="sponsor" class="col-form-label">Placement Name</label>
								<input v-model="placeName" name="sponsor" id="placeName" type="texta" disabled="" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label for="sponsor" class="col-form-label">Sponsor ID</label>
								<input :class="{'is-invalid': validation['sponsor']}" 
									@keyup="filter" v-model="auth.uuid" name="sponsor" id="sponsor" type="text" class="form-control">
									<div class="invalid-feedback" v-if="validation['sponsor']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ validation['sponsor'][0] }}
							        </div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="sponsor" class="col-form-label">Sponsor Name</label>
								<input v-model="sponsorName" name="sponsor" id="sponsorid" type="texta" disabled="" class="form-control">
							</div>
						</div>
					</div>

					<br>
					
					<button 
						class="btn btn-primary" 
						
						:disabled="loading"
					>
						<span v-if="loading" 
							class="spinner-border spinner-border-sm"
							role="status" aria-hidden="true"></span>
						Create
					</button>
					<br>
				</form>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		data(){
			return {
				form: {
					name: '',
					email: '',
					password: '',
					phone: '',
					placement: ''
				},
				loading: false,
				placeName: ''
			}
		},
		methods: {
			filter(){
				this.sponsorName = 'Loading...'
				axios.get(`sociaty/filter?id=${this.auth.uuid}`).then((response) => {
					
					if(response.data.count > 0){
						return this.sponsorName = response.data.data.name
					}

					return this.sponsorName = 'Not found'
				}).catch(() => {
					return this.sponsorName = 'Not found'
				})
			},
			filterPlacement(e){
				let pid = e.target.value.toUpperCase()
				this.placeName = 'Loading...'

				axios.get(`sociaty/filter?id=${pid}`).then((response) => {
					
					if(response.data.count > 0){
						return this.placeName = response.data.data.name
					}

					return this.sponsorName = 'Not found'
				}).catch(() => {
					return this.sponsorName = 'Not found'
				})
			},
			submit(){
				this.loading = true
				axios.post(`sociaty/create`, {
					name: this.form.name,
					email: this.form.email,
					phone: this.form.phone,
					password: this.form.password,
					placement: this.form.placement,
					sponsor: this.auth.uuid,

				}).then((response) => {
					this.loading = false
				}).catch(() => {
					this.loading = false
				})
			}
		},

		computed: {
			...mapGetters({
				auth: 'userData',
				validation: 'getValidationErrors',
			}),

			sponsorID: {
				set(value){
					return value
				},
				get(){
					return this.auth.uuid
				}
			},

			sponsorName:{
				set(value){
					return this.auth.name = value
				},
				get(){
					return this.auth.name
				}
			}
		}
	}
</script>