<template>
	<p>file</p>
</template>

<script>
export default {
	props: {
		name: {
			required: true,
			type: String
		},
		image: {
			required: false,
			type: Object
		}
	},
	data(){
		return {
			inputValue: '',
		}
	},
}
</script>