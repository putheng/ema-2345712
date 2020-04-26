<template>
<li>
	<span>{{ parent.name }}</span>

	<ul v-if="parent.parent">
		<Sponsor :parent="parent"/>
	</ul>
</li>
</template>

<script>
	import NextSponsor from './NextSponsor'

	export default {
		props: ['parent'],

		name: 'sponsor',

		components: {
			'NextSponsor': NextSponsor
		}
	}
</script>