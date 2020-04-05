<template>
	<div class="dropdown">
		<button class="btn-account d-none d-md-flex" type="button" 
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="user-avatar user-avatar-md">
				<img src="/images/empty-profile-picture.png" alt="">
			</span>
			<span class="account-summary pr-lg-4 d-none d-lg-block">
				<span class="account-name">Account</span>
			</span>
		</button>
		<div class="dropdown-arrow dropdown-arrow-left"></div>
		<!-- .dropdown-menu -->
		<div class="dropdown-menu">
			<h6 class="dropdown-header d-none d-md-block d-lg-none"> Account </h6>
			<router-link class="dropdown-item" :to="{ name:'auth-login' }">
				<span class="dropdown-icon oi oi-person"></span>
				Login
			</router-link>
			<router-link class="dropdown-item" :to="{ name:'auth-register' }">
				<span class="dropdown-icon oi oi-person"></span>
				Register
			</router-link>
		</div>
		<!-- /.dropdown-menu -->
	</div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
	computed: {
		//
	}
}
</script>A