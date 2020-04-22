<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Placement Tree</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-12">
				
				<ul>
					<li>
						<span>{{ agents.name }}</span>
						<ul v-if="agents.children">
							<Agent :agent="agent" v-for="(agent, i) in agents.children" :key="i"/>
						</ul>
					</li>
				</ul>

			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import Agent from './partials/Agent'

	export default {
		data(){
			return {
				agents: []
			}
		},
		components:{
			Agent
		},
		methods: {
			async fetch(){
				let r = await axios.get('sociaty/placement')

				this.agents = r.data.data
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
