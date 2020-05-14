<template>
<transition name="fade">
	<div class="modal modal-alert fade" 
		id="createAgentModal" data-backdrop="static" 
		tabindex="-1" role="dialog"aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog" role="document">
			<form @submit.prevent="submit">
			<div class="modal-content" v-if="agent">
				<div class="modal-header">
					<h5 class="modal-title">
						{{ agent.name }}
					</h5>
				</div>
				<div class="modal-body">
					
						<div class="form-group">
							<label for="name" class="col-form-label">Name</label>
							<input 
								v-model="form.name" 
								@keyup="clearValidation('name')"
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
								@keyup="clearValidation('email')"
								v-model="form.email" name="email" id="email" type="text" class="form-control">
								<div class="invalid-feedback" v-if="validation['email']">
						            <i class="fa fa-exclamation-circle fa-fw"></i>
						            {{ validation['email'][0] }}
						        </div>
						</div>

						<div class="form-group">
							<label for="phone" class="col-form-label">Phone</label>
							<input :class="{'is-invalid': validation['phone']}"
								@keyup="clearValidation('phone')"
								v-model="form.phone" name="phone" id="phone" type="text" class="form-control">
								<div class="invalid-feedback" v-if="validation['phone']">
						            <i class="fa fa-exclamation-circle fa-fw"></i>
						            {{ validation['phone'][0] }}
						        </div>
						</div>

						<div class="form-group">
							<label for="password" class="col-form-label">Password</label>
							<input :class="{'is-invalid': validation['password']}"
								@keyup="clearValidation('password')"
								v-model="form.password" name="password" id="password" type="password" class="form-control">
								<div class="invalid-feedback" v-if="validation['password']">
						            <i class="fa fa-exclamation-circle fa-fw"></i>
						            {{ validation['password'][0] }}
						        </div>
						</div>

						<div class="form-group">
							<label for="placement" class="col-form-label">Placement Tree</label>
							<input v-model="form.placement" name="placement" id="placement" type="text" class="form-control">
						</div>

						<div class="row">
							<div class="col-md-7">
								<div class="form-group">
									<label for="sponsor" class="col-form-label">Sponsor ID</label>
									<input :class="{'is-invalid': validation['sponsor']}" 
										
										@keyup="filter" v-model="agent.uuid" name="sponsor" id="sponsor" type="text" class="form-control">
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
					
				</div>
				<div class="modal-footer">
					<button 
						class="btn btn-primary" 
						
						:disabled="loading"
					>
						<span v-if="loading" 
							class="spinner-border spinner-border-sm"
							role="status" aria-hidden="true"></span>
						Create
					</button>
					<button
						type="button"
						class="btn btn-warning"
						data-dismiss="modal"
					>
						Close
					</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</transition>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		props: ['agent'],
		data(){
			return {
				form: {
					name: '',
					email: '',
					password: '',
					phone: '',
					placement: ''
				},
				loading: false
			}
		},
		methods: {
			filter(){
				this.sponsorName = 'Loading...'
				axios.get(`sociaty/filter?id=${this.agent.uuid}`).then((response) => {
					
					if(response.data.count > 0){
						return this.sponsorName = response.data.data.name
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
					sponsor: this.agent.uuid,

				}).then((response) => {
					this.$emit('completed', response)
					this.loading = false
				}).catch(() => {
					this.loading = false
				})
			},
			clearValidation(input){
				this.$store.dispatch('clearValidateFor', input)
			},
		},

		computed: {
			...mapGetters({
				validation: 'getValidationErrors',
			}),

			sponsorID: {
				set(value){
					return value
				},
				get(){
					return this.agent.uuid
				}
			},

			sponsorName:{
				set(value){
					return this.agent.name = value
				},
				get(){
					return this.agent.name
				}
			}
		}
	}
</script>

<style scoped>

.slide-leave-active,
.slide-enter-active {
	transition: all 200ms;
}
.slide-enter {
	transform: translate(100%, 0);
}
.slide-leave-to {
	transform: translate(100%, 0);
}
</style>