<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Support tickets</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-fluid">
					<div class="card-body">
						<h3 class="card-title"> My tickets </h3>
						<table class="table table-hover">
							<thead>
								<th>Ticket Subject</th>
								<th>Date Submitted | Updated</th>
								<th>Type</th>
								<th>Priority</th>
								<th>Status</th>
							</thead>

							<tbody>
								<tr>
									<td>
										<router-link :to="{name: 'user-dashboard-viewticket'}">
											My old ticket
										</router-link>
									</td>
									<td>06/19/2020 | 06/20/2020</td>
									<td>Info inquiry</td>
									<td>
										<span class="badge badge-warning">High</span>
									</td>
									<td>
										<span class="badge badge-success">Open</span>
									</td>
								</tr>
								<tr>
									<td>
										<router-link :to="{name: 'user-dashboard-viewticket'}">
											My New ticket
										</router-link>
									</td>
									<td>06/19/2020 | 06/20/2020</td>
									<td>Info inquiry</td>
									<td>
										<span class="badge badge-danger">Urgent</span>
									</td>
									<td>
										<span class="badge badge-secondary">Closed</span>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#">
											My New ticket
										</a>
									</td>
									<td>06/19/2020 | 06/20/2020</td>
									<td>Info inquiry</td>
									<td>
										<span class="badge badge-info">Medium</span>
									</td>
									<td>
										<span class="badge badge-secondary">Closed</span>
									</td>
								</tr>
							</tbody>
						</table>
						
						<div class="text-right">
							<button 
								class="btn btn-info"
								data-toggle="modal" 
								data-target="#TicketModal"
								>
								Submit new ticket
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<TicketModal/>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import TicketModal from './partials/TicketModal'

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
