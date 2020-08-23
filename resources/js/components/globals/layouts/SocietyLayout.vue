<template>
<div>
	<app-alert></app-alert>
	<header class="app-header app-header-dark">
		<div class="top-bar">
			<div class="top-bar-brand">
				<a href="/" target="_blank" style="margin: auto;">
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
					<society-setting></society-setting>

				</div>
			</div>
		</div>
	</header>
	<aside class="app-aside app-aside-expand-md app-aside-light" id="appMenu">
		<div class="aside-content">
			<div class="aside-menu overflow-hidden">
				<left-society-setting></left-society-setting>
			</div>
			<main-footer></main-footer>
		</div>
	</aside>
	<app-main></app-main>
</div>
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		methods: {
			...mapActions({
				fetchUser: 'fetchUser'
			})
		},

		watch: {
          '$route' () {
                const element = document.querySelector("#appMenu")
                let isShown = element.classList.contains("show")

                if(isShown){
                    $('#appMenu').removeClass('show')
                    $('.aside-backdrop').removeClass('show')
                    $('.hamburger.hamburger-squeeze').removeClass('active')
                }

                
            }
        },

		created(){
			this.fetchUser()
		}
	}
</script>