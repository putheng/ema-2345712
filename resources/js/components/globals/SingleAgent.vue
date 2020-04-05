<template>
<li>
	<div class="wrapper">
<table @mouseover="show" @mouseout="hide">
	<tbody>
		<tr>
			<td>
			</td>
			<td>
				<div class="pl-2">
					<div class="leading-tight">
						{{ child.name }}
					</div>
					<template v-show="isShow" >
						<div class="text-sm text-bold leading-tight">
							<span class="text-bold">ID:</span> 
							{{ child.uuid }}
						</div>
						<div class="text-sm text-bold leading-tight">
							<span class="text-bold">Sponsor</span>
							<a href="#" @click.prevent="loadMember(child.user_id)">
								{{ child.child }}
							</a>
						</div>
						<div class="text-sm text-bold leading-tight">
							<span class="text-bold">Downline</span>
							<a href="#" @click.prevent="loadMember(child.user_id)">
								{{ child.child }}
							</a>
						</div>
					</template>
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
		data(){
			return {
				isShow: false,
				data: []
			}
		},
		props: ['child'],

		methods: {
			show(){
				this.isShow = true
			},
			hide(){
				this.isShow = false
			},
			loadMember(id){
				
				axios.get(`sociaty/show/${id}/members`).then((response) => {
					this.data = response.data.data.children
				})
			}
		}
	}
</script>