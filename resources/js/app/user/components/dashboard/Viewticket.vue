<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">My New ticket</h1>
			</header>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<tr>
							<td>
								<b>Date Submitted</b>
								<div>09/27/2020</div>
							</td>
							<td>
								<b>Last Updated</b>
								<div>09/27/2020</div>
							</td>
							<td>
								<b>Type</b>
								<div>Delivery Problem</div>
							</td>
							<td>
								<b>Priority</b>
								<div>
									<span class="badge badge-warning">High</span>
								</div>
							</td>
							<td>
								<b>Status</b>
								<div>
									<span class="badge badge-success">Open</span>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<div>
									<div>
										<a href="#" class="btn-account" role="button">
											<div class="user-avatar user-avatar-lg">
												<img src="https://demo.createx.studio/cartzilla/img/testimonials/03.jpg" alt="">
											</div>
											<div class="account-summary">
												<p class="account-name"> Beni arisandi </p>
												<p class="account-description"> Sep 28, 2019 at 10:00AM </p>
											</div>
										</a>
									</div>
									<div>
										<p>Egestas sed sed risus pretium quam vulputate dignissim.
										 A diam sollicitudin tempor id eu nisl. Ut porttitor leo a diam. Bibendum at varius vel pharetra vel turpis nunc.</p>
									</div>
								</div>
								<hr>
								<div>
									<div>
										<a href="#" class="btn-account" role="button">
											<div class="user-avatar user-avatar-lg">
												<img src="https://demo.createx.studio/cartzilla/img/testimonials/04.jpg" alt="">
											</div>
											<div class="account-summary">
												<p class="account-name"> Beni arisandi </p>
												<p class="account-description"> Sep 28, 2019 at 10:00AM </p>
											</div>
										</a>
									</div>
									<div>
										<p>Egestas sed sed risus pretium quam vulputate dignissim.
										 A diam sollicitudin tempor id eu nisl. Ut porttitor leo a diam. Bibendum at varius vel pharetra vel turpis nunc.</p>
									</div>
								</div>
							</div>
						</div>

						<div class="card card-fluid">
							<div class="card-body">
								<app-form action="/">
									<h6>Leave a Message</h6>
									<app-text-area name="message" placeholder="Write your message here..."></app-text-area>

									<div class="text-right">
										<app-button type="submit">Submit message</app-button>
									</div>
								</app-form>
							</div>
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
		methods: {
			//
		},
		computed: {
			//
		},
		mounted(){
			//
		}
	}
</script>
