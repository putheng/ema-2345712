<template>
<li>
	<span>{{ parent.name }}</span>

	<ul v-if="parent.parent">
		<sponsor :parent="parent"/>
	</ul>
</li>
</template>

<script>
	import Sponsor from './Sponsor'
	
	export default {
		props: ['parent'],
		name: 'NextSponsor',

		components: {
			'sponsor': Sponsor
		}
	}
</script>