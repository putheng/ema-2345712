<template>
	<nav id="stacked-menu" class="stacked-menu">
		<ul class="menu">
			<li class="menu-item">
				<a class="menu-link d-none d-sm-block" href="/">
					<span class="menu-icon oi oi-home"></span>
					<span class="menu-text">Home</span>
				</a>
				<a class="menu-link d-sm-none" href="/home">
					<span class="menu-icon oi oi-home"></span>
					<span class="menu-text">Home</span>
				</a>
			</li>

			<li class="menu-header">Cart</li>
			<li class="menu-item">
				<router-link :to="{ name: 'store-cart-order' }" class="menu-link">
					<span class="menu-icon oi oi-cart"></span>
					<span class="menu-text">Order</span>
				</router-link>
				<router-link :to="{ name: 'store-cart-wishlist' }" class="menu-link">
					<span class="menu-icon oi oi-heart"></span>
					<span class="menu-text">Wishlist</span>
				</router-link>
				<router-link :to="{ name: 'store-cart-tickets' }" class="menu-link">
					<span class="menu-icon oi oi-info"></span>
					<span class="menu-text">Support tickets</span>
				</router-link>
			</li>

			<li class="menu-header">Products</li>
			<li class="menu-item">
				<router-link :to="{ name: 'store-products-cashier' }" class="menu-link">
					<span class="oi oi-spreadsheet"></span>
					<span class="menu-text">Cashier</span>
				</router-link>
				<router-link :to="{ name: 'store-products-orders' }" class="menu-link">
					<span class="oi oi-cart"></span>
					<span class="menu-text">Orders</span>
				</router-link>
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

			<!-- <li class="menu-header" style="margin-top: 0;">Payment</li>
			<li class="menu-item">
				<router-link :to="{ name: 'store-payments-payout' }" class="menu-link">
					<span class="oi oi-aperture"></span>
					<span class="menu-text">Payouts</span>
				</router-link>
				<router-link :to="{ name: 'store-payments-payout' }" class="menu-link">
					<span class="oi oi-dollar"></span>
					<span class="menu-text">Withdraw</span>
				</router-link>
				<router-link :to="{ name: 'store-payments-payout' }" class="menu-link">
					<span class="oi oi-dollar"></span>
					<span class="menu-text">Transactons</span>
				</router-link>
			</li> -->

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