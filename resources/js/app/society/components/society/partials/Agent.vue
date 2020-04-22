<template>
<li>
	<span>{{ agent.name }}</span>

	<ul v-if="agent.children">
		<Agent :agent="agent" v-for="(agent, i) in agent.children" :key="i"/>
	</ul>
</li>
</template>

<script>
	export default {
		name: 'Agent',
		props: ['agent']
	}
</script>