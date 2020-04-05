<template>
<footer class="aside-footer border-top p-3 text-center">
	<span>Copyright © {{ date }} E-Market Asia Co.,Ltd</span>
</footer>
</template>

<script>
	export default {
		computed: {
			date(){
				return new Date().getFullYear()
			}
		}
	}
</script>