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
			<li class="menu-item">
				<router-link :to="{ name: 'society' }" class="menu-link">
					<span class="menu-icon oi oi-info"></span>
					<span class="menu-text">Dashboard</span>
				</router-link>
			</li>
			<!-- /.menu-item -->
			<!-- .menu-item -->

			<li class="menu-item has-child">
				<a href="#" class="menu-link">
					<span class="menu-icon fas fa-money-check-alt"></span> 
					<span class="menu-text">Cart</span>
				</a>
				<ul class="menu">
					<li class="menu-item">
						<router-link :to="{ name: 'society-cart-order' }" class="menu-link">
							<span class="menu-text">Order</span>
						</router-link>
						<router-link :to="{ name: 'society-cart-wishlist' }" class="menu-link">
							<span class="menu-text">Wishlist</span>
						</router-link>
						<router-link :to="{ name: 'society-cart-tickets' }" class="menu-link">
							<span class="menu-text">Support tickets</span>
						</router-link>
					</li>
				</ul>
			</li>
			
			<li class="menu-item has-child">
				<a href="#" class="menu-link">
					<span class="menu-icon fas fa-money-check-alt"></span>
					<span class="menu-text">E-Wallet</span>
				</a>
				<ul class="menu">

					<li class="menu-item">
						<router-link class="menu-link" :to="{name: 'society-payments-earning'}">
							E-Wallet Summary
						</router-link>
						<router-link class="menu-link" :to="{name: 'society-payments-transfer'}">
							Fund Transfter
						</router-link>
						<router-link class="menu-link" :to="{name: 'society-payments-transferhistory'}">
							Transfter History
						</router-link>
						<router-link class="menu-link" :to="{name: 'society-payments-transactions'}">
							All Transactions
						</router-link>
					</li>
				</ul>
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
						<router-link class="menu-link" :to="{ name:'society-society-network' }">
							Network
						</router-link>
						<router-link class="menu-link" :to="{name: 'society-society-sponsor'}">
							Sponsor
						</router-link>
						<router-link class="menu-link" :to="{name: 'society-society-placement'}">
							Placement Tree
						</router-link>
					</li>
				</ul>
			</li>

			<li class="menu-item has-child">
				<a href="#" class="menu-link">
					<span class="menu-icon fas fa-wrench"></span> 
					<span class="menu-text">Setting</span>
				</a> <!-- child menu -->
				<ul class="menu">
					<li class="menu-item">
						<router-link class="menu-link" :to="{ name:'society-settings-profile' }">
							Profile
						</router-link>
						<router-link class="menu-link" :to="{ name:'society-settings-password' }">
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