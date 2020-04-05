<template>
<transition name="fade">
	<div class="modal modal-alert fade" :id="name" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form @submit.prevent="submit">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Create Sociaty Member
						</h5>
					</div>
						<div class="modal-body text-left">
					
							<div class="form-group">
								<label class="col-form-label">Name</label>
								<input 
									v-model="form.name" 
									:class="{'is-invalid': validation['name']}"
									@keyup="clearValidateFor('name')"
									name="name" type="text" class="form-control">
								<div class="invalid-feedback" v-if="validation['name']">
						            <i class="fa fa-exclamation-circle fa-fw"></i>
						            {{ validation['name'][0] }}
						        </div>
							</div>

							<div class="form-group">
								<label class="col-form-label">Email</label>
								<input :class="{'is-invalid': validation['email']}"
									@keyup="clearValidateFor('email')"
									v-model="form.email" name="email" type="text" class="form-control">
									<div class="invalid-feedback" v-if="validation['email']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ validation['email'][0] }}
							        </div>
							</div>

							<div class="form-group">
								<label class="col-form-label">Password</label>
								<input :class="{'is-invalid': validation['password']}"
									@keyup="clearValidateFor('password')"
									v-model="form.password" name="password" type="password" class="form-control">
									<div class="invalid-feedback" v-if="validation['password']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ validation['password'][0] }}
							        </div>
							</div>

							<div class="form-group">
								<label class="col-form-label">Placement Tree</label>
								<input v-model="form.placement" name="placement" type="text" class="form-control">
							</div>

							<div class="row">
								<div class="col-md-7">
									<div class="form-group">
										<label class="col-form-label">Sponsor ID</label>
										<input :class="{'is-invalid': validation['sponsor']}" 
											@keyup="filter" v-model="parent.uuid" name="sponsor" type="text" class="form-control">
											<div class="invalid-feedback" v-if="validation['sponsor']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ validation['sponsor'][0] }}
									        </div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="col-form-label">Sponsor Name</label>
										<input v-model="sponsorName" name="sponsor" type="texta" disabled="" class="form-control">
									</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">

						<button
							type="button"
							@click="resetLoading"
							class="btn btn-warning"
							data-dismiss="modal"
						>
							Cancel
						</button>

						<button 
							class="btn btn-primary" 
							
							:disabled="loading"
						>
							<span v-if="loading" 
								class="spinner-border spinner-border-sm"
								role="status" aria-hidden="true"></span>
							Create
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</transition>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		props: ['parent', 'name'],
		data(){
			return {
				types:[
					{name: 'Order problem', value: '1'},
					{name: 'Partner request', value: '1'},
					{name: 'Complaint', value: '1'},
					{name: 'Info inquiry', value: '1'},
					{name: 'Delivery problem', value: '1'}
				],
				options: [
					{name: 'Urgent', value: '1'},
					{name: 'High', value: '1'},
					{name: 'Medium', value: '1'},
					{name: 'Low', value: '1'},
				],
				form: {
					name: '',
					email: '',
					password: '',
					placement: ''
				},
				loading: false
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors'
			}),
			sponsorID: {
				set(value){
					this.parent.uuid = value
				},
				get(){
					return this.parent.uuid
				}
			},

			sponsorName:{
				set(value){
					return this.parent.name = value
				},
				get(){
					return this.parent.name
				}
			}
		},
		methods: {
			...mapActions({
				clearValidationErrors: 'clearValidationErrors',
				clearMessage: 'clearMessage',
				clearErrors: 'clearErrors',
				clearValidateFor: 'clearValidateFor'
			}),
			resetLoading(){
				this.clearValidationErrors()
				this.clearMessage()
				this.clearErrors()
			},
			onClickButton (event) {
		    	this.$emit('completed', event)
		    },
			filter(){
				this.sponsorName = 'Loading...'
				axios.get(`sociaty/filter?id=${this.parent.uuid}`).then((response) => {
					
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
					password: this.form.password,
					placement: this.form.placement,
					sponsor: this.parent.uuid,

				}).then((response) => {
					this.onClickButton(response)
					$('#'+ this.name).modal('hide');
					this.loading = false
				}).catch(() => {
					this.loading = false
					
				})
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