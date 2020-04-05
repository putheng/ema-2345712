<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Create Sociaty Member
			</h4>
			<div class="card-text col-md-6">
				<app-form action="sociaty/create" method="post">
					<app-input type="text" name="name" label="Name"/>
					<app-input type="text" name="email" label="Email"/>
					<app-input type="password" name="password" label="Password"/>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6">
								<app-input-sponsor type="text" name="sponsor" label="Sponsor ID"/>
							</div>
							<div class="col-md-6">
								
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-md-6">
								<app-input type="text" name="placement" label="Placement Tree ID"/>
							</div>
							<div class="col-md-6">
								
							</div>
						</div>
					</div>
					<br>
					<app-button type="submit">Create</app-button>
					<br>
				</app-form>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		computed: {
			...mapGetters({
				auth: 'userData'
			})
		}
	}
</script>