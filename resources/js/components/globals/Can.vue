<template>
	<span>
		</slo>
	</span>
</template>

<script>
	import { mapGetters } from 'vuex'

	export default {
		props: [
			'I', 'a'
		],

		computed: {
			...mapGetters({
				user: 'userData'
			})
		},

		mounted(){
			console.log(this.I)
		}
	}
</script>