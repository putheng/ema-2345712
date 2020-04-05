<template>
	<div class="page-message" role="alert" v-if="showMessage">
		<span class="mr-5">{{ message }}</span>
		<a href="#" class="btn btn-sm btn-icon btn-warning" 
			aria-label="Close" @click.prevent="hideAlert">
			<span aria-hidden="true">
				<i class="fa fa-times"></i>
			</span>
		</a>
	</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
	methods: {
		...mapActions({
			'hideAlert': 'clearMessage'
		})
	},
	computed: {
		...mapGetters({
			message: 'getMessage',
			showMessage: 'showMessage',
		})
	}
}
</script>