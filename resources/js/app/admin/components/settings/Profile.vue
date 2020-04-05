<template>
<div class="section-block">
	<div class="card card-fluid">
		<div class="card-body">
			<h4 class="card-title">
				Update your profile
			</h4>
			<div class="card-text col-md-6">
				<user-avatar sendAs="image" endpoint="account/avatar"/>
				<app-form action="account/me" method="post">
					<template v-for="(item, key, index) in user">
						<app-input :value="item" name="name" label="Name" v-if="key == 'name'"/>
						<app-input :value="item" name="email" label="Email" v-if="key == 'email'"/>
					</template>
					
					<br>
					<app-button type="submit">Update</app-button>
					<br>
					<br>
				</app-form>
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
			...mapGetters({
        		user: 'userData'
        	})
		},
		mounted(){
			//
		}
	}
</script>
