<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Transfer</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Transfer to any account</h3>
								<app-form action="/">
									<app-input name="id" label="Send to user ID"/>

									<app-input name="amount" label="Amount"/>

									<app-text-area name="mark" label="Mark*"/>
									<br/>
									<app-button>Send</app-button>
								</app-form>
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
		computed: {
			//
		},
		mounted(){
			//
		}
	}
</script>
