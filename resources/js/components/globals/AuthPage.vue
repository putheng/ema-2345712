<template>
<div>
	<app-alert></app-alert>
<header class="app-header app-header-dark">
	<div class="top-bar">
		<div class="top-bar-brand">
			<a href="/" target="_blank">
				<img src="/images/logo-s.png" alt="" style="height: 32px;width: auto;">
			</a>
		</div>
		<div class="top-bar-list">
			<div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
				<button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
			</div>
			<div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
				<ul class="header-nav nav">
				</ul>
				<auth-dropdown></auth-dropdown>

			</div>
		</div>
	</div>
</header>
	<app-main></app-main>
</div>
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		
	}
</script>