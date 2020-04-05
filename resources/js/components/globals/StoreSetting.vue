<template>
	<div class="dropdown" v-if="user">
		<button class="btn-account d-none d-md-flex" type="button" 
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="user-avatar user-avatar-md" v-if="user.avatar">
				<img :src="user.avatar" alt="name">
			</span>
			<span class="account-summary pr-lg-4 d-none d-lg-block">
				<span class="account-name">{{ user.name }}</span>
				<span class="account-description">{{ user.role }}</span>
			</span>
		</button>
		<div class="dropdown-arrow dropdown-arrow-left"></div>
		<!-- .dropdown-menu -->
		<div class="dropdown-menu">
			<h6 class="dropdown-header d-none d-md-block d-lg-none"> {{ user.name }} </h6>
			<router-link class="dropdown-item" :to="{ name:'store-setting-profile' }">
				<span class="dropdown-icon oi oi-person"></span>
				Profile
			</router-link>
			<router-link :to="{name: 'store-payments-balance'}" class="dropdown-item">
				<span class="dropdown-icon fa fa-hand-holding-usd"></span>
				{{ user.balance }}
			</router-link>
			<app-logout></app-logout>
		</div>
		<!-- /.dropdown-menu -->
	</div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
	computed: {
		...mapGetters({
			user: 'userData'
		})
	}
}
</script>