<template>
<div class="page-inner">
	<div class="section-block">
		<div class="card card-fluid">
			<div class="card-body">
				<h4 class="card-title">
					Update your profile
				</h4>
				<div class="card-text col-md-10">
					<user-avatar sendAs="image" endpoint="account/avatar"/>
					
					<app-form @created="created" action="store/account" v-if="store">
						<div class="row">
							<div class="col-md-6">
								<input-binding name="name" label="name" v-model="store.username"/>
							</div>
							<div class="col-md-6">
								<input-binding disabled name="store" label="Store name" v-model="store.store"/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<input-binding name="phone" label="Phone" v-model="store.phone"/>
							</div>
							<div class="col-md-6">
								<input-binding name="email" label="Email" v-model="store.email"/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<text-area-binding name="address" label="Address" v-model="store.address"/>
							</div>
							<div class="col-md-3">
								<input-binding name="latitude" label="Latitude" v-model="store.latitude"/>
								<a href="#" @click.prevent="locatorButtonPressed">Get my location</a>
							</div>
							<div class="col-md-3">
								<input-binding name="longitude" label="Longitude" v-model="store.longitude"/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<p>Upload your business licences</p>
							</div>
							<div class="col-md-3">
								<image-picker name="photo"/>
							</div>
						</div>
						<br>

						<app-button type="submit">Save</app-button>
					</app-form>
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
				store: null
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('store/account')

				this.store = r.data.data
			},

			locatorButtonPressed() {
			   navigator.geolocation.getCurrentPosition(
			      position => {
			      	this.store.latitude = position.coords.latitude
			      	this.store.longitude = position.coords.longitude

			      },
			      error => {
			         console.log(error.message);
			      },
			   )
			},

			created(e){
				// this.store = e.data.data

			}
		},
		computed: {
			...mapGetters({
        		user: 'userData'
        	})
		},
		mounted(){
			this.fetch()
		}
	}
</script>
