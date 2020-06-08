<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Store</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Create store </h3>
								<app-form action="store/store" redirect="/admin/store">
									
									<div class="row">
										<div class="col-md-6">
											<app-input @keyup="fetch" name="sponsor" label="Sponsor ID"/>		
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Sposor Name</label>
												<input v-model="sponsorName" type="text" class="form-control" disabled>
											</div>
										</div>
									</div>
									<app-input name="store" label="Store Name"/>
									<app-input name="name" label="Person Name"/>
									<app-input name="email" label="Email"/>
									<app-input name="phone" label="Phone"/>
									<app-input type="password" name="password" label="Password"/>
									<app-input type="password" name="password_confirmation" label="Password Confirm"/>

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
		data(){
			return {
				sponsorName: ''
			}
		},
		methods: {
			fetch(e){
				let spid = e.target.value.toUpperCase()

				this.sponsorName = 'Loading...'
				axios.get(`sociaty/filter?id=${spid}`).then((response) => {
					
					if(response.data.count > 0){
						return this.sponsorName = response.data.data.name
					}

					return this.sponsorName = 'Not found'
				}).catch(() => {
					return this.sponsorName = 'Not found'
				})
			}
		},
		computed: {
			//
		},
		mounted(){
			//
		}
	}
</script>
