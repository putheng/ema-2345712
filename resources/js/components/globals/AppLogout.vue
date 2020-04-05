<template>
	<a class="dropdown-item" href="#" @click="submit">
		<span class="dropdown-icon oi oi-account-logout"></span>
		Logout
		<form id="logout-form" action="/api/v1/account/logout" method="POST" style="display: none;">
			<input type="hidden" :value="token" name="_token">
    	</form>
	</a>
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
	    	document.getElementById("logout-form").submit()
	    }
	}
}
</script>