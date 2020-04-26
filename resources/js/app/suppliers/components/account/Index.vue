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
					<app-form action="supplier/account" method="post" v-if="user.supplier">
						
						<br/><br/>
						<div class="row">
							<div class="col-md-6">
								<input-binding v-model="user.name" name="name" label="Name"/>
							</div>
							<div class="col-md-6">
								<input-binding v-model="user.supplier.name" name="username" label="Company name"/>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<input-binding v-model="user.supplier.phone" name="phone" label="Phone Number"/>
							</div>
							<div class="col-md-6">
								<input-binding v-model="user.email" name="email" label="Email" disabled/>
							</div>
						</div>
						<input-binding v-model="user.supplier.address" name="address" label="Address"/>

						<text-area-binding v-model="user.supplier.description" name="description" label="Description" />
						
						<br>
						<app-button type="submit">Update</app-button>
						<br>
						<br>
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
				user: []
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('supplier/account')

				this.user = r.data.data
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetch()
		}
	}
</script>
