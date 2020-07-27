<template>
	<nav id="stacked-menu" class="stacked-menu">
		<ul class="menu">
			<li class="menu-item">
				<a class="menu-link d-none d-sm-block" href="/">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">{{ $t('general.home') }}</span>
				</a>
				<a class="menu-link d-sm-none" href="/home">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">{{ $t('general.home') }}</span>
				</a>
			</li>

			<li class="menu-header">Products</li>
			<li class="menu-item">
				<router-link :to="{ name: 'suppliers-product-sale' }" class="menu-link">
					<span class="oi oi-graph"></span>
					<span class="menu-text">Sales</span>
				</router-link>
				<router-link :to="{ name: 'suppliers-product-orders' }" class="menu-link">
					<span class="oi oi-cart"></span>
					<span class="menu-text">Orders</span>
				</router-link>
				<router-link :to="{ name: 'suppliers-product' }" class="menu-link">
					<span class="oi oi-list-rich"></span>
					<span class="menu-text">Products</span>
				</router-link>
				<router-link :to="{ name: 'suppliers-product-add' }" class="menu-link">
					<span class="oi oi-plus"></span>
					<span class="menu-text">Add New Product</span>
				</router-link>
			</li>

			<li class="menu-header">Account Settings</li>
			<li class="menu-item">
				<router-link :to="{ name: 'suppliers-account' }" class="menu-link">
					<span class="menu-icon oi oi-spreadsheet"></span>
					<span class="menu-text">Account</span>
				</router-link>
				<router-link :to="{ name: 'suppliers-account-password' }" class="menu-link">
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