<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Sponsor</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> Placement </h3>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<th># ID</th>
										<th>Username</th>
										<th>Phone</th>
										<th>Status</th>
										<th>Downline</th>
									</thead>
									<tbody>
										<tr v-if="sponsors" v-for="sponsor in sponsors">
											<td>
												{{ sponsor.uuid }}
											</td>
											<td>
												{{ sponsor.name }}
											</td>
											<td>{{ sponsor.phone }}</td>
											<td>{{ sponsor.status }}</td>
											<td>{{ sponsor.child }} &nbsp;<i class="fa fa-users"></i></td>
										</tr>
										<tr v-else>
											<td colspan="5">There is no any sponser yet</td>
										</tr>
									</tbody>
								</table>
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

	import Sponsor from './partials/Sponsor'

	export default {
		data(){
			return {
				sponsors: []
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('sociaty/sponsors')

				this.sponsors = r.data.data
			}
		},
		components: {
			Sponsor
		},
		computed: {
			//
		},
		mounted(){
			this.fetch()
		}
	}
</script>
