<template>
<li>
	<div class="wrapper">
		<table>
			<tbody>
				<tr>
					<td class="hidden">
					</td>
					<td>
						<div class="pl-2">
							<div class="leading-tight">
								{{ children.name }}
							</div>
							<div class="text-sm text-bold leading-tight">
								<span class="text-bold">ID:</span> 
								{{ children.uuid }}
							</div>
							<div class="text-sm text-bold leading-tight">
								<span class="text-bold">Downline</span>
								<a href="#" @click.prevent="loadMember(children.user_id)">
									{{ children.child }}
								</a>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<template v-if="data">
		<AgentChildren :children="data"/>
	</template>
</li>
</template>

<script>

	export default {
		name: 'AgentChild',

		data(){
			return {
				data: []
			}
		},

		props: ['children'],

		methods: {
			loadMember(id){
				
				axios.get(`sociaty/show/${id}/members`).then((response) => {
					this.data = response.data.data.children
				})
			}
		}
	}
</script>