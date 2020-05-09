<template>
<li class="dd-item" data-id="2">
	<div class="dd-handle">
		<div>{{ agent.level }}. {{ agent.name }}</div>
		<div class="dd-nodrag btn-group ml-auto">
        	<span>{{ agent.uuid }}</span>
        </div>
	</div>
	<ol class="dd-list" v-if="agent.children">
		<Agent :agent="a" v-for="(a, i) in agent.children" :key="i"/>
	</ol>
</li>
</template>

<script>
	export default {
		name: 'Agent',
		props: ['agent']
	}
</script>