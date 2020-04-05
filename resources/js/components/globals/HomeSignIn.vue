<template>
<div class="modal-content">
	<div class="modal-header">
		<ul class="nav nav-tabs card-header-tabs" role="tablist">
			<li class="nav-item"><a class="nav-link active" href="#signin-tab" data-toggle="tab" role="tab" aria-selected="true"><i class="czi-unlocked mr-2 mt-n1"></i>Sign in</a></li>
			<li class="nav-item"><a class="nav-link" href="#signup-tab" data-toggle="tab" role="tab" aria-selected="false"><i class="czi-user mr-2 mt-n1"></i>Sign up</a></li>
		</ul>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body tab-content py-4">
		<form @submit.prevent="submit" class="tab-pane fade show active" autocomplete="off" novalidate id="signin-tab">
			<div class="form-group">
				<label for="si-email">Email address</label>
				<input @keyup="clearValidation('email')" v-model="form.email" class="form-control" type="email" id="si-email" placeholder="you@example.com" :class="{'is-invalid': validation['email']}">
				
				<div class="invalid-feedback" v-if="validation['email']">{{ validation['email'][0] }}</div>
			</div>
			<div class="form-group">
				<label for="si-password">Password</label>
				<div class="password-toggle">
					<input @keyup="clearValidation('password')" v-model="form.password" class="form-control" type="password" id="si-password" :class="{'is-invalid': validation['password']}">
					<label class="password-toggle-btn">
						<input class="custom-control-input" type="checkbox">
						<i class="czi-eye password-toggle-indicator"></i>
						<span class="sr-only">Show password</span>
					</label>
					<div class="invalid-feedback" v-if="validation['password']">{{ validation['password'][0] }}</div>
				</div>
			</div>
			<div class="form-group d-flex flex-wrap justify-content-between">
				<div class="custom-control custom-checkbox mb-2">
					<input v-model="form.remember" class="custom-control-input" type="checkbox" id="si-remember">
					<label class="custom-control-label" for="si-remember">Remember me</label>
				</div>
				<a class="font-size-sm" href="#">Forgot password?</a>
			</div>
			<button 
				class="btn btn-primary btn-block btn-shadow"
				:disabled="loading"
				type="submit">
				<span v-if="loading"
					class="spinner-border spinner-border-sm"
					role="status" aria-hidden="true"></span>
					Sign in
			</button>
		</form>	
		<form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
			<div class="form-group">
				<label for="su-name">Full name</label>
				<input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
				<div class="invalid-feedback">Please fill in your name.</div>
			</div>
			<div class="form-group">
				<label for="su-email">Email address</label>
				<input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com" required>
				<div class="invalid-feedback">Please provide a valid email address.</div>
			</div>
			<div class="form-group">
				<label for="su-password">Password</label>
				<div class="password-toggle">
					<input class="form-control" type="password" id="su-password" required>
					<label class="password-toggle-btn">
					<input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="su-password-confirm">Confirm password</label>
				<div class="password-toggle">
					<input class="form-control" type="password" id="su-password-confirm" required>
					<label class="password-toggle-btn">
					<input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
					</label>
				</div>
			</div>
			<button class="btn btn-primary btn-block btn-shadow" type="submit">Sign up</button>
		</form>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		data(){
			return {
				loading: false,
				form: {
					email: '',
					remember: false,
					password: ''
				}
			}
		},
		methods: {
			submit(){
				this.loading = true;

				this.clearValidation('email')
				this.clearValidation('password')

				axios.post('auth/login', this.form).then((response) => {
					if(response.data.success){
						window.location = response.data.redirect
					}
					
				}, (error) => {
					this.loading = false

					return Promise.resolve(response)
				}).catch(() => {})
			},
			clearValidation(data){
				this.$store.dispatch('clearValidateFor', data)
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors'
			})
		},
	}
</script>