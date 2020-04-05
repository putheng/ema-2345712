<template>
	<auth-layout>
		<main class="auth auth-floated">
			<form class="auth-form" @submit.prevent="submit">
				<div class="mb-4">
					<div class="mb-3">
						<img class="rounded" src="/images/logo-s.png" alt="" height="72">
					</div>
					<h1 class="h3">Sign Up</h1>
				</div>
				<p class="text-left mb-4">
					Already have an account? please
					<router-link :to="{name:'auth-login'}">Sign In</router-link>
				</p>
				<div class="form-group mb-4">
					<label class="d-block text-left" for="inputUsername">Username</label>
					<input 
						v-model="form.username" type="text" id="inputUsername"
						class="form-control form-control-lg" 
						:class="{'is-invalid': validation['username']}"
						@keyup="clearValidation('username')"
					autofocus>
					<div class="invalid-feedback text-left" v-if="validation['username']">
			            <i class="fa fa-exclamation-circle fa-fw"></i>
			            {{ validation['username'] +'' }}
			        </div>
				</div>
				<div class="form-group mb-4">
					<label class="d-block text-left" for="inputEmail">Email</label>
					<input 
						v-model="form.email" type="text" id="inputEmail"
						class="form-control form-control-lg" 
						:class="{'is-invalid': validation['email']}"
						@keyup="clearValidation('email')"
					autofocus>
					<div class="invalid-feedback text-left" v-if="validation['email']">
			            <i class="fa fa-exclamation-circle fa-fw"></i>
			            {{ validation['email'] +'' }}
			        </div>
				</div>

				<div class="form-group mb-4">
					<label class="d-block text-left" for="inputPassword">Password</label>
					<input 
						v-model="form.password" type="password" id="inputPassword"
						class="form-control form-control-lg" 
						:class="{'is-invalid': validation['password']}"
						@keyup="clearValidation('password')"
					autofocus>
					<div class="invalid-feedback text-left" v-if="validation['password']">
			            <i class="fa fa-exclamation-circle fa-fw"></i>
			            {{ validation['password'] +'' }}
			        </div>
				</div>

				<div class="form-group mb-4">
					<button class="btn btn-lg btn-primary btn-block" :disabled="loading" type="submit">
						<span v-if="loading"
						class="spinner-border spinner-border-sm"
						role="status" aria-hidden="true"></span>
						Register
					</button>
				</div>
				<div class="form-group text-center">
					<div class="custom-control custom-control-inline custom-checkbox">
						<input 
							v-model="form.newsletter"
							type="checkbox"
							class="custom-control-input"
							id="newsletter">
						<label class="custom-control-label" for="newsletter">Sign me up for the newsletter</label>
					</div>
				</div>
				<p class="text-center text-muted mb-0">
					By creating an account you agree to the <br><a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
				</p>
				<br><!-- 
				<p class="mb-0 px-3 text-muted text-center">
					&copy; 2018 All Rights Reserved. LaravelSpace Ltd.
				</p> -->
			</form>
			<div id="announcements" class="auth-announcement" style="background-image: url(/images/img-1.png);">
				<div class="announcement-body">
					<h2 class="announcement-title">How to Prepare for an Automated Future</h2>
					<a href="#" class="btn btn-warning"><i class="fa fa-fw fa-angle-right"></i> Check Out Now</a>
				</div>
			</div>
		</main>
	</auth-layout>
</template>

<script>

	import { mapGetters, mapActions } from 'vuex'

	export default {
		metaInfo:{
			title: 'Register'
		},

		data(){
			return {
				loading: false,
				form: {
					username: '',
					email: '',
					password: '',
					newsletter: false,
					token: ''
				}
			}
		},
		methods: {
			submit(){
				this.loading = true;

				axios.post('', this.form).then((response) => {
					if(response.data.success){
						window.location = response.data.redirect
					}
					this.loading = false
				}, (error) => {
					
					this.loading = false
					return Promise.resolve(error)
				}).catch()
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
		mounted(){
			particlesJS.load('announcements', '/js/particles.json')

			this.form.token = this.$route.query.token
		}
	}
</script>
