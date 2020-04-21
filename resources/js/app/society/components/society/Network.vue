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
		
		<section class="management-hierarchy">
		<div class="hv-container">
			<div class="hv-wrapper">
				<!-- Key component -->
				<div class="hv-item">
					<div class="hv-item-parent">
						<div class="person">
							<img :src="agents.avatar" alt="">
							<p class="name">
								{{ agents.name }} <b>/ {{ agents.uuid }}</b>
							</p>
						</div>
					</div>
					<div class="hv-item-children" v-if="agents.children">
						<div class="hv-item-child" v-for="(child, k) in agents.children">
							<!-- Key component -->
							<div class="hv-item">
								<div class="hv-item-parent">
									<div class="person">
										<img :src="child.avatar" alt="">
										<p class="name" @click.prevent="loadMember(child.user_id)">
											{{ child.name }} <b>/ {{ child.uuid }}</b>
										</p>
									</div>
								</div>
								<div class="person">
									<img :src="child.avatar" alt="">
									<p class="name" @click.prevent="loadMember(child.user_id)">
										{{ child.name }} <b>/ {{ child.uuid }}</b>
									</p>
								</div>
								<div class="hv-item-children" v-if="child.children">
									<div class="hv-item-child" v-for="ch in child.children">
										<div class="hv-item">
											<div class="person">
												<img :src="ch.avatar" alt="">
												<p class="name" @click.prevent="loadMember(ch.user_id)">
													{{ ch.name }} <b>/ {{ ch.uuid }}</b>
												</p>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import NetworkChildren from './partials/NetworkChildren'

	export default {
		data(){
			return {
				agents:[]
			}
		},
		components: {
			NetworkChildren
		},
		methods: {
			...mapActions({
				fetchNetworks: 'society/fetchNetworks'
			}),
			async fetch(){
				let r = await axios.get(`sociaty/show`)

				this.agents = r.data.data
			},
			async loadMember(id){
				let r = await axios.get(`sociaty/show/${id}/members`)
				
				this.agents = r.data.data

			}
		},
		computed: {
			...mapGetters({
				networks: 'society/getNetworks'
			})
		},
		created(){
			this.fetch()
		}
	}
</script>

<style lang="scss" scoped>
@import '@sass/_hierarchy-view.scss';
@import url('https://fonts.googleapis.com/css?family=Poppins');
$bottom-margin: 50px;
$line-width: 2px;
$line-color: rgba(#FFF, 0.7);
$bg-color: #EFE6E2;
html,
body {
	height: 100%;
	font-family: 'Poppins', sans-serif;
	padding: 0;
	margin: 0;
}

section {
	min-height: 100%;
	display: flex;
	justify-content: center;
	flex-direction: column;
	padding: 50px 0;
	position: relative;
	.github-badge {
		position: absolute;
		top: 0;
		left: 0;
	}
	h1 {
		text-align: center;
		margin-bottom: 70px;
	}
	.hv-container {
		// display: flex;
		flex-grow: 1;
		overflow: auto;
		// align-items: center;
		justify-content: center;
	}
}

// BASIC STYLE
.basic-style {
	// background-color: #EFE6E2;
	&>h1 {
		color: #DE5454;
	}
}

p.simple-card {
	margin: 0;
	background-color: #fff;
	color: #DE5454;
	padding: 30px;
	border-radius: 7px;
	min-width: 100px;
	text-align: center;
	box-shadow: 0 3px 6px rgba(#CC8367, 0.22);
}

.hv-item-parent {
	p {
		font-weight: bold;
		color: #DE5454;
	}
}

// MANAGEMENT HIERARCHY
.management-hierarchy {
	&>h1 {
		color: #FFF;
	}
	.person {
		text-align: center;
		&>img {
			height: 70px;
			border: 2px solid #bbb;
			border-radius: 50%;
			overflow: hidden;
			background-color: #fff;
		}
		&>p.name {
			background-color: #cacaca;
			padding: 5px 10px;
			border-radius: 5px;
			font-size: 12px;
			font-weight: normal;
			color: #232322;
			margin: 0;
			position: relative;
			white-space: nowrap;
			cursor: pointer;
			b {
				color: #ff6500;
			}
			&:before {
				content: '';
				position: absolute;
				width: 2px;
				height: 8px;
				background-color: #fff;
				left: 50%;
				top: 0;
				transform: translateY(-100%);
			}
		}
	}
}
</style>