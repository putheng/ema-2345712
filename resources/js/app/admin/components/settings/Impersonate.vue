<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Impersonate</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Impersonate </h3>
								<app-form action="/account/transfer">
									<app-input name="id" label="User ID"/>

									<app-button type="submit">Submit</app-button>
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
