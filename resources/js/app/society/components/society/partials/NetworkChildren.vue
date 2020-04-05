<template>
<ul>
	<NetworkChild 
		v-for="child in parent.children" 
		:key="child.uuid" 
		v-if="parent.children"
		:child="child"
		@addMoreChild="appendMoreChild"
	/>
	<li>
		<a href="#" data-toggle="modal" 
			data-target="#NewMemberModal">++</a>
			<NewMemberModal 
				@completed="onClickChild" 
				name="NewMemberModal" 
				:parent="parent" 
			/>
	</li>
</ul>
</template>

<script>
import NetworkChild from './NetworkChild'

export default {
	name: 'NetworkChildren',

	components: {
		NetworkChild
	},

	methods: {
		onClickChild (value) {
	    	this.parent.children.push(value.data.data)
	    	console.log('ok')
	    },
	    appendMoreChild(value){
			this.parent.children.push(value)
	    }
	},
	
	props: ['parent'],
}
</script>

<style lang="scss" scoped>
* {margin: 0; padding: 0;}
@import '@sass/_tree.scss';

.pop-wrapper{
	position: relative;
}

.pop-inner {
	position: absolute;
	top: -30px;
	left: -30px;
	background: #fff;
	z-index: 1;
}

span.user-avatar.user-avatar-lg {
    margin-right: 0;
}

.user-summary{
	
}
.user-name{
	color: #000;
    font-weight: 800;
}

.user-description{
	font-size: 11px;
}
</style>