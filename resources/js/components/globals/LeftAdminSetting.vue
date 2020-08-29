<template>
	<nav id="stacked-menu" class="stacked-menu">
		<!-- .menu -->
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

			<!-- .menu-item -->
			<li class="menu-item">
				<router-link :to="{ name: 'admin-profile' }" class="menu-link">
					<span class="menu-icon oi oi-info"></span>
					<span class="menu-text">Dashboard</span>
				</router-link>
				
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Products</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{name: 'admin-products-create'}">
							Create
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-products'}">
							View
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-products-shipping'}">
							Shipping Method
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-products-shippingplace'}">
							Shipping Place
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Orders</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{name: 'admin-order'}">
							View
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-order-processing'}">
							Processing
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-order-completed'}">
							Completed
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon far fa-list-alt"></span> <span class="menu-text">Category</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<!-- <router-link class="menu-link" :to="{name: 'admin-category-create'}">
							Create
						</router-link> -->
						<router-link class="menu-link" :to="{name: 'admin-category'}">
							View
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon fa fa-tasks"></span> <span class="menu-text">Store</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{name: 'admin-store-create'}">
							Create
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-store'}">
							View
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>

			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon fa fa-tasks"></span> <span class="menu-text">Supplier</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{name: 'admin-supplier-create'}">
							Create
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-supplier'}">
							View
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon fas fa-money-check-alt"></span> <span class="menu-text">Payments</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{name: 'admin-payments-wallet'}">
							My Wallet
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-payments-transfer'}">
							Transfter
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-payments-transactions'}">
							Transactions
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link">
					<span class="menu-icon oi oi-people"></span>
					<span class="menu-text">Society</span>
				</a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'admin-society' }">
							Network
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-society-sponsor'}">
							Sponsor
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-society-placement'}">
							Placement Tree
						</router-link>
						<router-link class="menu-link" :to="{name: 'admin-society-users'}">
							All
						</router-link>
					</li>
				</ul>
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->
			<li class="menu-item has-child">
				<a href="#" class="menu-link"><span class="menu-icon fas fa-wrench"></span> <span class="menu-text">Setting</span></a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'admin-settings-profile' }">
							Profile
						</router-link>
						<router-link class="menu-link" :to="{ name:'admin-settings-users' }">
							Users
						</router-link>
						<router-link class="menu-link" :to="{ name:'admin-settings-role' }">
							Role
						</router-link>
						<router-link class="menu-link" :to="{ name:'admin-profile-password' }">
							Password
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
				<!-- /child menu -->
			</li>
			<!-- /.menu-item -->
		</ul>
		<!-- /.menu -->
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