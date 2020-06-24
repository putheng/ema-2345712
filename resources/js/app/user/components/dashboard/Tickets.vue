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
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<th>Ticket Subject</th>
									<th>Date Submitted | Updated</th>
									<th>Type</th>
									<th>Priority</th>
									<th>Status</th>
								</thead>

								<tbody>
									<tr v-for="(ticket, index) in tickets">
										<td>
											<router-link :to="{name: 'user-dashboard-viewticket', params:{id:ticket.id}}">
												{{ ticket.subject }}
											</router-link>
										</td>
										<td>{{ ticket.created }} | {{ ticket.updated }}</td>
										<td>{{ ticket.type }}</td>
										<td>
											<span class="badge badge-warning">{{ ticket.priority }}</span>
										</td>
										<td>
											<span class="badge badge-success">{{ ticket.status }}</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						
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
	<TicketModal @created="created"/>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import TicketModal from './partials/TicketModal'

	export default {
		data(){
			return {
				tickets: []
			}
		},
		methods: {
			created(e){
				$('#TicketModal').modal('hide')

				this.tickets = e.data.data
			},

			async fetch(){
				let response = await axios.get('ticket')

				this.tickets = response.data.data
			}
		},
		components:{
			TicketModal
		},
		computed: {
			//
		},
		mounted(){
			this.fetch()
		}
	}
</script>
