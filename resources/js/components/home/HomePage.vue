<template>
	<div class="w-full">
		<HeaderMenu/>
		
		

		<HomeFooter/>
	</div>
</template>

<script>
	import HeaderMenu from './partials/HeaderMenu'
	import HomeFooter from './partials/HomeFooter'

	export default {
		components: {
			HeaderMenu,
			HomeFooter
		},
	}
</script>