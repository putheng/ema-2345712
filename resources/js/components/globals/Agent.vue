<template>
<ul>
	<AgentChild 
		v-for="(children, key) in agents.children"
		:children="children"
		:key="key"
	/>
</ul>
</template>

<script>

	export default {
		name: 'Agent',

		data(){
			return {
				data: []
			}
		},

		props: {
			agents: {
				required: true,
			}
		}
	}
</script>