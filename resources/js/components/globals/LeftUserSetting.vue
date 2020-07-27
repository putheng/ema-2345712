<template>
	<nav id="stacked-menu" class="stacked-menu">
		<ul class="menu">
			<li class="menu-item">
				<a href="/" class="menu-link d-none d-sm-block">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">{{ $t('general.home') }}</span>
				</a>
				<a href="/home" class="menu-link d-sm-none">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">{{ $t('general.home') }}</span>
				</a>

				<router-link :to="{ name: 'user-dashboard-order' }" class="menu-link">
					<span class="menu-icon oi oi-cart"></span>
					<span class="menu-text">Order</span>
				</router-link>

				<router-link :to="{ name: 'user-dashboard-wishlist' }" class="menu-link">
					<span class="menu-icon oi oi-heart"></span>
					<span class="menu-text">Wishlist</span>
				</router-link>
				<router-link :to="{ name: 'user-dashboard-tickets' }" class="menu-link">
					<span class="menu-icon oi oi-info"></span>
					<span class="menu-text">Support tickets</span>
				</router-link>
			</li>

			<li class="menu-header">Payments</li>
			<li class="menu-item">
				<router-link :to="{ name: 'user-payments-transactions' }" class="menu-link">
					<span class="menu-icon oi oi-align-left"></span>
					<span class="menu-text">Transactions</span>
				</router-link>
				<!-- <router-link :to="{ name: 'user-settings-payment' }" class="menu-link">
					<span class="menu-icon oi oi-credit-card"></span>
					<span class="menu-text">Payments methods</span>
				</router-link> -->
			</li>

			<li class="menu-header">Account Settings</li>
			<li class="menu-item">
				<router-link :to="{ name: 'user-settings-profile' }" class="menu-link">
					<span class="menu-icon oi oi-spreadsheet"></span>
					<span class="menu-text">Profile</span>
				</router-link>
				<router-link :to="{ name: 'user-settings-password' }" class="menu-link">
					<span class="menu-icon oi oi-key"></span>
					<span class="menu-text">Password</span>
				</router-link>
				<a @click.prevent="submit" class="menu-link d-none d-sm-block" href="#">
					<span class="menu-text">Logout</span>

					<form id="logout-form-b" action="/api/v1/account/logout" method="POST" style="display: none;">
						<input type="hidden" :value="token" name="_token">
			    	</form>
				</a>

				<a @click.prevent="submitApp" class="menu-link d-sm-none" href="#">
					<span class="menu-text">Logout</span>

					<form id="logout-form-app" action="/logout" method="POST" style="display: none;">
						<input type="hidden" :value="token" name="_token">
			    	</form>
				</a>
			</li>
		</ul>
	</nav>
</template>
<script>
	export default {
		data(){
			return {
				token : document.head.querySelector('meta[name="csrf-token"]').content
			}
		},
		methods : {
		    submit(){
		    	document.getElementById("logout-form-b").submit()
		    },
		    submitApp(){
		    	document.getElementById("logout-form-app").submit()
		    }
		}
	}
</script>