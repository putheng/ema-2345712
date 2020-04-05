<template>
<li class="ml-1 nav-menu relative z-30"> 
  <a v-on-clickaway="hide" @click.prevent="show" href="#">
    <div class="flex items-center px-2 py-1 border-2 border-transparent">
        <div class="leading-tight flex">
            <span class="flex items-center">
                <span class="text-gray-600">EN</span>
            </span>
            <i class="fa fa-sort-down ml-2 text-gray-600"></i>
        </div>
    </div>
  </a>
  <transition name="dropdown-fade">
    <div v-if="isShow" class="absolute shadow-lg w-20 right-0 mt-12 clearfix ">
    
    <div class="bg-gray-200 w-full border border-gray-400">
      <div class="w-full flex flex-col justify-between h-full">
        <div class="flex flex-col h-full py-2">
        	
        	<ul class="list-reset flex flex-col text-sm">
                <router-link :to="{name: 'auth-signin'}"
                    class="hover:bg-gray-600 text-gray-600 hover:text-white px-3 py-2">
                    English
                </router-link>
                <router-link :to="{name: 'auth-signup'}" 
                    class="hover:bg-gray-600 text-gray-600 hover:text-white px-3 py-2">
                    Khmer
                </router-link>
            </ul>
        </div>
      </div>
    </div>
  </div>
  </transition>
</li>
</template>

<script>
	import { mixin as clickaway } from 'vue-clickaway'

	export default {
		mixins: [ clickaway ],

		data(){
			return {
				isShow: false
			}
		},

		methods: {
			show(){
				this.isShow = this.isShow = !this.isShow
			},

			hide(){
				this.isShow = false
			}
		}
	}
</script>