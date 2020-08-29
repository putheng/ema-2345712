<template>
	<nav id="stacked-menu" class="stacked-menu">
		<ul class="menu">

			<li class="menu-header">Order</li>
			<li class="menu-item">
				<router-link :to="{ name: 'delivery-orders-view' }" class="menu-link">
					<span class="menu-icon oi oi-align-left"></span>
					<span class="menu-text">All</span>
				</router-link>
				<router-link :to="{ name: 'delivery-orders-processing' }" class="menu-link">
					<span class="menu-icon oi oi-align-left"></span>
					<span class="menu-text">Processing</span>
				</router-link>
				<router-link :to="{ name: 'delivery-orders-completed' }" class="menu-link">
					<span class="menu-icon oi oi-align-left"></span>
					<span class="menu-text">Completed</span>
				</router-link>
			</li>

			<li class="menu-header">Account Settings</li>
			<li class="menu-item">
				<router-link :to="{ name: 'delivery-settings-password' }" class="menu-link">
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