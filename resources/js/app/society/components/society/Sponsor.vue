<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Sponsor</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					
					<div class="card card-fluid">
						<div class="list-group list-group-flush list-group-divider">

							<a href="#" class="list-group-item list-group-item-action" v-for="sponsor in sponsors">
								<div class="list-group-item-figure">
									<div class="user-avatar user-avatar-lg">
										<img :src="sponsor.avatar" alt="">
									</div>
								</div>
								<div class="list-group-item-body">
									<h4 class="list-group-item-title"> {{ sponsor.name }} </h4>
									<h5 class="list-group-item-subtitle"> {{ sponsor.uuid }} </h5>
									<div><i class="fa fa-users"></i> Placement Tree {{ sponsor.child }}</div>
								</div>
							</a>

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
