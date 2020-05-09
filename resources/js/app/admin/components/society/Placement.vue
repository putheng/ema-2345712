<template>
<div class="page-inner">
	<div class="page-section">
		<div class="row">
			<div class="col-md-12">
				
				<div id="nestable03" class="dd">
					<ol class="dd-list">
						<li class="dd-item" data-id="1">
							<div class="dd-handle">
								<div>{{ agents.level }}. {{ agents.name }}</div>
								<div class="dd-nodrag btn-group ml-auto">
						        	<span>{{ agents.uuid }}</span>
						        </div>
							</div>
							<ol class="dd-list" v-if="agents.children">
								<Agent :agent="agent" v-for="(agent, i) in agents.children" :key="i"/>
							</ol>
						</li>
					</ol>
				</div>

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
