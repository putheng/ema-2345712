<template>
	<nav id="stacked-menu" class="stacked-menu">
		<!-- .menu -->
		<ul class="menu">
			<!-- .menu-item -->
			<li class="menu-item">
				<router-link :to="{ name: 'admin-profile' }" class="menu-link">
					<span class="menu-icon fas fa-home"></span>
					<span class="menu-text">{{ $t('general.home') }}</span>
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
						<router-link class="menu-link" :to="{name: 'admin-category-create'}">
							Create
						</router-link>
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
						<router-link class="menu-link" :to="{ name:'admin-settings-role' }">
							Role
						</router-link>
						<router-link class="menu-link" :to="{ name:'admin-profile-password' }">
							Password
						</router-link>
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
		
	}
</script>