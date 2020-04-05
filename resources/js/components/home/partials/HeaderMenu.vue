<template>
<div class="bg-gray-200 border-b broder-gray-600 w-full">
	<div class="container flex justify-between">
		<ul class="list-reset flex pt-1">
			<li  class="nav-menu">
				<span class="mr-2">Country</span>
				<i class="fa fa-sort-down text-gray-600"></i>
			</li>
			<li  class="nav-menu">
				<span class="mr-2">Seller Center</span>
				<i class="fa fa-sort-down text-gray-600"></i>
			</li>
			<li  class="nav-menu">
				<span class="mr-2">Help</span>
				<i class="fa fa-sort-down text-gray-600"></i>
			</li>
			<li  class="nav-menu">
				Buyer Protection
			</li>
			<li  class="nav-menu items-center">
				<i class="fa fa-mobile text-xl text-gray-600 mr-2"></i>
				<span>App</span>
			</li>
		</ul>

		<ul class="list-reset flex relative">
			<LanguageSetting/>
			<li  class="nav-menu items-center">
				<i class="fa fa-heart-o text-gray-600 mr-2"></i>
				<span>Wish List</span>
			</li>
			<UserSetting/>
			<!-- <li  class="nav-menu">	
				<span class="flex items-center">
					<i class="fa fa-user-circle text-gray-600 mr-2"></i>
					<span>Account</span>
				</span>
				<i class="fa fa-sort-down ml-2 text-gray-600"></i>
			
				<ul class="list-reset absolute absolute mt-10">
					<li><a href="#">Login</a></li>
					<li><a href="#">Register</a></li>
				</ul>
			</li> -->
		</ul>
	</div>
</div>
</template>
<script>
	import LanguageSetting from './LanguageSetting'

	export default {
		components: {
			LanguageSetting
		}
	}
</script>