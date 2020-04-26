<template>
	<auth-layout>
		<main class="auth auth-floated">
			<form class="auth-form" @submit.prevent="submit">
				<div class="mb-4">
					<div class="mb-3">
						<img class="rounded" src="/images/logo-s.png" alt="" height="72">
					</div>
					<h1 class="h3">Sign In</h1>
				</div>
				<p class="text-left mb-4">
					Don't have a account?
					<router-link :to="{name:'auth-register'}">Create an Account</router-link>
				</p>
				<div class="form-group mb-4">
					<label class="d-block text-left" for="inputEmail">ID</label>
					<input 
						v-model="form.id" type="text" id="inputEmail"
						class="form-control form-control-lg" 
						:class="{'is-invalid': validation['id']}"
						@keyup="clearValidation('id')"
					autofocus>
					<div class="invalid-feedback text-left" v-if="validation['id']">
			            <i class="fa fa-exclamation-circle fa-fw"></i>
			            {{ validation['id'][0] }}
			        </div>
				</div>
				<div class="form-group mb-4">
					<label class="d-block text-left" for="inputPassword">Password</label>
					<input v-model="form.password" type="password" id="inputPassword" 
						class="form-control form-control-lg"
						:class="{'is-invalid': validation['password']}"
						@keyup="clearValidation('password')"
					>

					<div class="invalid-feedback text-left" v-if="validation['password']">
			            <i class="fa fa-exclamation-circle fa-fw"></i>
			            {{ validation['password'][0] }}
			        </div>
				</div>
				<div class="form-group text-center">
					<div class="custom-control custom-control-inline custom-checkbox">
						<input v-model="form.remember" type="checkbox" class="custom-control-input" id="remember-me">
						<label class="custom-control-label" for="remember-me">Keep me sign in</label>
					</div>
				</div>
				<div class="form-group mb-4">
					<button class="btn btn-lg btn-primary btn-block" :disabled="loading" type="submit">
						<span v-if="loading"
						class="spinner-border spinner-border-sm"
						role="status" aria-hidden="true"></span>
						Sign In
					</button>
				</div>

				<p class="py-2">
					<a href="" class="link">Forgot Email?</a>
					<span class="mx-2">&middot;</span>
					<a href="" class="link">Forgot Password?</a>
				</p>
				<p class="mb-0 px-3 text-muted text-center">&copy; 
					2018 All Rights Reserved. LaravelSpace Ltd.
					<a href="#">Privacy</a> and <a href="#">Terms</a>
				</p>
			</form>
			<div id="announcement" class="auth-announcement" style="background-image: url(/images/img-1.png);">
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
			title: 'Login'
		},

		data(){
			return {
				loading: false,
				form: {
					id: '',
					remember: false,
					password: ''
				}
			}
		},
		methods: {
			submit(){
				this.loading = true;

				axios.post('auth/society', this.form).then((response) => {
					this.loading = false
					// console.log(response.data)
					if(response.data.success){
						window.location = response.data.data.dashboard
					}
					
				}, (error) => {
					this.loading = false

					return Promise.resolve(response)
				}).catch((error) => {
					this.loading = false
				})
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
			particlesJS.load('announcement', '/js/particles.json')
		}
	}
</script>
