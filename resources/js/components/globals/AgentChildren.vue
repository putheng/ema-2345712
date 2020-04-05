<template>
<ul>
	<SingleAgent :key="key" v-for="(child, key) in children" :child="child"/>
</ul>
</template>

<script>

	export default {
		name: 'AgentChildren',

		props: ['children'],

		data(){
			return {
				data: []
			}
		},

		methods: {
			loadMember(id){
				
				axios.get(`sociaty/show/${id}/members`).then((response) => {
					this.data = response.data.data.children
				})
			}
		}

	}
</script>