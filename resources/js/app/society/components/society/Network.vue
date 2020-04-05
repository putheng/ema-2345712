<template>
<div class="page-inner">
	<header class="page-title-bar">
		<div class="page-title">
			<span>Networks</span>
			<router-link 
				:to="{name: 'society-society-create'}"
				class="btn btn-primary float-right">
				Create
			</router-link>
		</div>

	</header>
	<div class="page-section">
		<div class="tree">
			<ul style="margin: auto;">
				<li v-if="networks">
					<a href="#">{{ networks.name }}</a>
					<template>
						<NetworkChildren :parent="networks"/>
					</template>
				</li>

			</ul>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import NetworkChildren from './partials/NetworkChildren'

	export default {
		components: {
			NetworkChildren
		},
		methods: {
			...mapActions({
				fetchNetworks: 'society/fetchNetworks'
			})
		},
		computed: {
			...mapGetters({
				networks: 'society/getNetworks'
			})
		},
		mounted(){
			this.fetchNetworks()
		}
	}
</script>

<style lang="scss" scoped>
	// * {margin: 0; padding: 0;}
	@import '@sass/_tree.scss';
</style>