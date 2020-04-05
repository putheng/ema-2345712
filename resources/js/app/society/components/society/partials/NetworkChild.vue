<template>
<li>
	<a @click.prevent="click" class="pop-wrapper" href="#" @mouseover="show" @mouseout="hide">
		{{ child.name }}
		<div class="pop-inner" v-show="isShow">
			<div class="responsive-table">
				<a href="#" class="btn-account" role="button">
					<span class="user-avatar user-avatar-lg">
						<img :src="child.avatar" alt="">
					</span>
					<div class="user-summary">
						<div class="user-name">{{ child.name }}</div>
						<div class="user-detail">
							<div class="user-description">{{ child.uuid }}</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</a>
	<ul>
		<NetworkChild 
			v-for="chil in child.children" 
			:key="child.uuid" 
			v-if="chil.children"
			:child="chil"
		/>
		<li>
			<a href="#" data-toggle="modal" 
				data-target="#NewMemberModalx"> {{ child.name }}</a>
				<NewMemberModal 
					@completed="onClickChild"
					name="NewMemberModalx"
					:parent="child"

				/>
		</li>
	</ul>
</li>
</template>

<script>
	import NetworkChildren from './NetworkChildren'

	export default {
		name: 'NetworkChild',

		props: ['child'],

		components: {
			NetworkChildren
		},

		data(){
			return {
				isShow: false,
				showModal: false
			}
		},

		methods: {
			show(){
				this.isShow = true
			},
			hide(){
				this.isShow = false
			},
			click(){
				return
			},
			onClickChild (value) {
				// this.$emit('addMoreChild', value.data.data)

		    	this.child.children.push(value.data.data)
		    }
		}
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