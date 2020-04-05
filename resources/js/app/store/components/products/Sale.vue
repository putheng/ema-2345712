<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Your sales / earnings</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
					
						<div class="metric-row">
							<div class="col">
								<div class="metric metric-bordered">
									<h2 class="metric-label text-center"> Earnings (before taxes) </h2>
									<p class="metric-value h1 text-center">
										<sup>$</sup> <span class="value">1,690.50</span>
									</p>
									<h2 class="metric-label text-center"> Sales 8/1/2019 - 8/15/2019 </h2>
								</div>
							</div>
							<div class="col">
								<div class="metric metric-bordered">
									<h2 class="metric-label text-center"> Your balance </h2>
									<p class="metric-value h1 text-center">
										<sup>$</sup> <span class="value">1,375.00</span>
									</p>
									<h2 class="metric-label text-center"> To be paid on 8/15/2019 </h2>
								</div>
							</div>
							<div class="col">
								<div class="metric metric-bordered">
									<h2 class="metric-label text-center"> Lifetime earnings </h2>
									<p class="metric-value h1 text-center">
										<sup>$</sup> <span class="value">9,156.74</span>
									</p>
									<h2 class="metric-label text-center"> Based on list price </h2>
								</div>
							</div>
						</div>

						<div class="card card-fluid">
							<div class="card-body">
								<apexchart type=line height=350 :options="chartOptions" :series="series" />
							</div>
						</div>

						<div class="card card-fluid">
							<div class="card-body">
								<apexchart type=line height=350 :options="chartOptionsb" :series="seriesb" />
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

	export default {
		methods: {
			//
		},
		data(){
			return {
				series: [{
					name: "Sales",
        			data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        		}],
        		seriesb: [{
					name: "Orders",
        			data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        		}],
        		chartOptions: {
        			chart: {
        				height: 350,
        				zoom: {
        					enable: false
        				}
        			},
        			dataLabels: {
        				enable: false
        			},
        			stroke: {
        				curve: 'straight'
        			},
        			title: {
        				text: 'Sales value, USD (Past 2 weeks)',
        				align: 'left'
        			},
        			grid: {
        				row: {
        					colors: ['#f3f3f3', 'transparent'],
        					opacity: 0.5
        				}
        			},
        			xaxis: {
        				categories: this.category,
        			}
        		},
        		chartOptionsb: {
        			chart: {
        				height: 350,
        				zoom: {
        					enable: false
        				}
        			},
        			dataLabels: {
        				enable: false
        			},
        			stroke: {
        				curve: 'straight'
        			},
        			title: {
        				text: 'Order count (Past 2 weeks)',
        				align: 'left'
        			},
        			grid: {
        				row: {
        					colors: ['#f3f3f3', 'transparent'],
        					opacity: 0.5
        				}
        			},
        			xaxis: {
        				categories: this.category,
        			}
        		}
			}
		},

		computed: {
			category(){
				let categories = []

				for(let i=0; i<30; i++){
					categories.push(i)
				}

				return categories
			}
		},
		mounted(){
			//
		}
	}
</script>
