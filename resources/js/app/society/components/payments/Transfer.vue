<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Transfer</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-10">
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> Transfer to any account</h3>
							<form @submit.prevent="confirms" v-if="confirm.show">

								<div class="form-group">
									<label class="control-label">Receiver ID</label>
									<input class="form-control" type="text" disabled="" :value="confirm.uuid">
								</div>

								<div class="form-group">
									<label class="control-label">Receiver Name</label>
									<input class="form-control" type="text" disabled="" :value="confirm.username">
								</div>

								<div class="form-group">
									<label class="control-label">Transfer amount</label>
									<input class="form-control" type="text" disabled="" :value="confirm.amount">
								</div>

								<div class="form-group">
									<label class="control-label">Transfer fee</label>
									<input class="form-control" type="text" disabled="" :value="confirm.fee">
								</div>
								
								<div class="form-group">
									<label for="receiver" class="col-form-label">
										Please enter your current password to confirm:
									</label>
									<input 
										v-model="confirm.current_password" 
										@keyup="clearValidateFor('current_password')"
										:class="{'is-invalid': validation['current_password']}"
										name="current_password" id="current_password" type="password" class="form-control">
									<div class="invalid-feedback" v-if="validation['current_password']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ validation['current_password'][0] }}
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
									Confirm
								</button>
							</form>
							<form @submit.prevent="submit" v-else>

								<div class="form-group">
									<label for="receiver" class="col-form-label">
										Receiver ID<span class="text-danger">*</span>
									</label>
									<input 
										v-model="form.receiver" 
										@keyup="clearValidateFor('receiver')"
										:class="{'is-invalid': validation['receiver']}"
										name="receiver" id="receiver" type="text" class="form-control">
									<div class="invalid-feedback" v-if="validation['receiver']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ validation['receiver'][0] }}
							        </div>
								</div>

								<div class="form-group">
									<label for="amount" class="col-form-label">
										Amount<span class="text-danger">*</span>
									</label>
									<input 
										v-model="form.amount" 
										@keyup="clearValidateFor('amount')"
										:class="{'is-invalid': validation['amount']}"
										name="amount" id="amount" type="text" class="form-control">
									<div class="invalid-feedback" v-if="validation['amount']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ validation['amount'][0] }}
							        </div>
								</div>

								<div class="form-group">
									<label for="mark" class="col-form-label">
										Mark
									</label>
									<input 
										v-model="form.mark" 
										@keyup="clearValidateFor('mark')"
										:class="{'is-invalid': validation['mark']}"
										name="mark" id="mark" type="text" class="form-control">
									<div class="invalid-feedback" v-if="validation['mark']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ validation['mark'][0] }}
							        </div>
								</div>

								<br/>
								<button 
									class="btn btn-primary" 
									
									:disabled="loading"
								>
									<span v-if="loading" 
										class="spinner-border spinner-border-sm"
										role="status" aria-hidden="true"></span>
									Submit
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import TransferModal from './partials/TransferModal'

	export default {
		components: {
			TransferModal
		},
		data(){
			return {
				form: {
					receiver: '',
					amount: '',
					mark: ''
				},
				confirm: {
					show: false,
					current_password: '',
					data: []
				},
				loading: false
			}
		},
		methods: {
			...mapActions({
				clearValidateFor: 'clearValidateFor'
			}),
			submit(){
				this.loading = true
				axios.post(`payment/transfer`, this.form).then((response) => {
					this.loading = false

					if(response.data.status == 'confirm'){
						
						this.confirm = response.data.data
						this.confirm.show = true
					}

				}).catch(() => {
					this.loading = false
				})
			},
			confirms(){

				this.loading = true
				axios.post(`payment/transfer/confirm`, this.confirm).then((response) => {
					this.loading = false

					if(response.data.success){
						this.confirm.show = true
						this.confirm.data = response.data.data
						this.$router.push({
							name: 'society-payments-transactions'
						})
					}

				

				}).catch(() => {
					this.loading = false
				})
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors',
			}),
		},
		mounted(){
			//
		}
	}
</script>
