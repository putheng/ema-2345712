<template>
	<nav id="stacked-menu" class="stacked-menu">
		<ul class="menu">
			<li class="menu-header" style="margin-top: 0;">payment</li>
			<li class="menu-item">
				<!-- <router-link :to="{ name: 'store-payments-balance' }" class="menu-link">
					<span class="oi oi-dollar"></span>
					<span class="menu-text">Balance</span>
				</router-link> -->
				<router-link :to="{ name: 'store-payments-payout' }" class="menu-link">
					<span class="oi oi-aperture"></span>
					<span class="menu-text">Payouts</span>
				</router-link>
				<!-- <router-link :to="{ name: 'store-payments-methods' }" class="menu-link">
					<span class="oi oi-credit-card"></span>
					<span class="menu-text">Payouts</span>
				</router-link> -->
			</li>

			<li class="menu-header">Products</li>
			<li class="menu-item">
				<router-link :to="{ name: 'store-products-sale' }" class="menu-link">
					<span class="oi oi-graph"></span>
					<span class="menu-text">Sales</span>
				</router-link>
				<router-link :to="{ name: 'store-products' }" class="menu-link">
					<span class="oi oi-list-rich"></span>
					<span class="menu-text">Products</span>
				</router-link>
				<router-link :to="{ name: 'store-products-new' }" class="menu-link">
					<span class="oi oi-plus"></span>
					<span class="menu-text">Add New Product</span>
				</router-link>
			</li>

			<li class="menu-header">Account Settings</li>
			<li class="menu-item">
				<router-link :to="{ name: 'store-setting-profile' }" class="menu-link">
					<span class="menu-icon oi oi-spreadsheet"></span>
					<span class="menu-text">Profile</span>
				</router-link>
				<router-link :to="{ name: 'store-setting-password' }" class="menu-link">
					<span class="menu-icon oi oi-key"></span>
					<span class="menu-text">Password</span>
				</router-link>
				<a @click="submit" class="menu-link">
					<span class="menu-icon oi oi-account-logout"></span>
					<span class="menu-text">Logout</span>

					<form id="logout-form-b" action="/api/v1/account/logout" method="POST" style="display: none;">
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
		    }
		}
	}
</script>