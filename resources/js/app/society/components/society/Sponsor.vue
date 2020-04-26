<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Sponsor</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					<ul>
					<li>
						<span>{{ sponsor.name }}</span>
						<ul v-if="sponsor.parent">
							<Sponsor :parent="sponsor.parent"/>
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

	import Sponsor from './partials/Sponsor'

	export default {
		data(){
			return {
				sponsor: []
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('sociaty/sponsors')

				this.sponsor = r.data.data
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
