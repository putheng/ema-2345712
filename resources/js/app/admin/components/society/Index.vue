<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Society Member
				
				<router-link 
					:to="{ name:'admin-society-create' }" 
					class="btn btn-primary float-right">
					Create
				</router-link>
			</h4>
			
			<div class="card-text col-md-12">
				<div class="tree" style="display: flex;">
				<ul style="margin: auto;">
					<li v-if="agents">
						<div class="wrapper">
							<table>
								<tbody>
									<tr>
										<td >
										</td>
										<td>
											<div class="pl-2">
												<div class="leading-tight">
													{{ agents.name }}
												</div>
												<div class="text-sm text-bold hidden leading-tight">
													<span class="text-bold">ID:</span> 
													{{ agents.uuid }}
												</div>
												<div class="text-sm text-bold hidden leading-tight">
													<span class="text-bold">Memers:</span> 
													{{ agents.child }}
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<template v-if="agents.children">
							<Agent :agents="agents"/>
						</template>
					</li>
				</ul>
			</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		data(){
			return {
				agents: []
			}
		},
		computed: {
			...mapGetters({
				auth: 'userData'
			})
		},

		methods: {
			fetchAgent(){
				axios.get('sociaty/show').then((response) => {
					this.agents = response.data.data
				})
			}
		},

		mounted(){
			this.fetchAgent()
		}
	}
</script>