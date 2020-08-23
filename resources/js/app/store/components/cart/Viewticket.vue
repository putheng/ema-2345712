<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">{{ ticket.subject }}</h1>
	</header>
	<div class="row">
		
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>
							<b>Date Submitted</b>
							<div>{{ ticket.created }}</div>
						</td>
						<td>
							<b>Last Updated</b>
							<div>{{ ticket.updated }}</div>
						</td>
						<td>
							<b>Type</b>
							<div>{{ ticket.type }}</div>
						</td>
						<td>
							<b>Priority</b>
							<div>
								<span class="badge badge-warning">{{ ticket.priority }}</span>
							</div>
						</td>
						<td>
							<b>Status</b>
							<div>
								<span class="badge badge-success">{{ ticket.status }}</span>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="page-section">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-fluid">
					<div class="card-body">
						<div>
							<div>
								<a href="#" class="btn-account" role="button" v-if="ticket.user">
									<div class="user-avatar user-avatar-lg">
										<img :src="ticket.user.avatar" alt="">
									</div>
									<div class="account-summary">
										<p class="account-name"> {{ ticket.user.name }} </p>
										<p class="account-description"> {{ ticket.at }} </p>
									</div>
								</a>
							</div>
							<div>
								<p> {{ ticket.describe }} </p>
							</div>
						</div>
						
						<div v-if="ticket.children" v-for="children in ticket.children">
							<hr>
							<div>
								<a href="#" class="btn-account" role="button">
									<div class="user-avatar user-avatar-lg">
										<img :src="children.user.avatar" alt="">
									</div>
									<div class="account-summary">
										<p class="account-name">{{ children.user.name }}</p>
										<p class="account-description">{{ children.created }}</p>
									</div>
								</a>
							</div>
							<div>
								<p>{{ children.body }}</p>
							</div>
						</div>



					</div>
				</div>
				
				<div class="card card-fluid">
					<div class="card-body">
						<form @submit.prevent="submit">
							<h6>Leave a Message</h6>
							<app-text-area v-model="form.message" name="message" placeholder="Write your message here..."></app-text-area>

							<div class="text-right d-flex flex-wrap justify-content-between align-items-center">
								<div class="custom-control custom-checkbox d-block">
									<input v-model="form.close" class="custom-control-input" type="checkbox" id="close-ticket">
									<label class="custom-control-label" for="close-ticket">Submit and close the ticket</label>
								</div>

								<button class="btn btn-primary" type="submit">
									<span v-if="loading" 
										class="spinner-border spinner-border-sm"
										role="status" aria-hidden="true"></span>
									Submit message
								</button>
							</div>
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

	export default {
		data(){
			return {
				ticket: {},
				loading: false,
				form: {
					message: '',
					close: false
				}
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get(`ticket/${this.$route.params.id}`)

				this.ticket = r.data.data
			},

			async submit(){
				this.loading = true
				await axios.put(`ticket/${this.$route.params.id}`, this.form)
					.then((r) => {
						this.ticket = r.data.data
						this.loading = false
						this.form.message = ''
					})
					.catch((error) => {
						this.loading = false
					})
			}
		},
		computed: {
			//
		},
		created(){
			this.fetch()
		}
	}
</script>
