<template>
	<div class="widget pb-2 mb-4">

		<h3 class="widget-title text-light pb-1">Stay informed</h3>
		<h3 class="widget-title text-danger" v-if="errors['email']">
			{{ errors['email'][0] }}
		</h3>

		<form @submit.prevent="submit">
			<div class="input-group input-group-overlay flex-nowrap">
				<template v-if="!success">
					<div class="input-group-prepend-overlay">
						<span class="input-group-text text-muted font-size-base">
							<i class="czi-mail"></i>
						</span>
					</div>
					<input @keyup="clearValidation" class="form-control prepended-form-control" 
						type="text" placeholder="Your email" v-model="email">

					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" name="subscribe" id="mc-embedded-subscribe">
							<span v-if="loading" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
							Subscribe
						</button>
					</div>
				</template>
				<template v-else>
					<h3 class="widget-title text-light pb-1">Thank You For Subscribing!</h3>
				</template>
			</div>
			<small class="form-text text-light opacity-50" id="mc-helper">
				*Subscribe to our newsletter to receive early discount offers, updates and new products info.
			</small>
			<div class="subscribe-status"></div>
		</form>
	</div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
	data(){
		return {
			loading: false,
			success: false,
			email: ''
		}
	},

	methods:{
		async submit(){
			this.loading = true

			await axios.post(`newsletter`, {
				email: this.email
			})
			.then((response) => {
				this.success = response.data.success
				this.loading = false
			})
			.catch((error) => {
				this.loading = false
			})

		},

		clearValidation(){
			this.$store.dispatch('clearValidateFor', 'email')
		},
	},

	computed: {
		...mapGetters({
			errors: 'getValidationErrors'
		}),
	}
}
</script>