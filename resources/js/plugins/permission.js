import Vue from 'vue'
import Can from '../components/globals/Can'

import { mapGetters } from 'vuex'

const comp = {
	install(Vue, option){
		Vue.mixin({
			computed: {
				...mapGetters({
					user: 'userData'
				})
			},

			mounted(){
				console.log(this.user)
			},

			components: {
				Can
			}
		})
	}
}

Vue.use(comp)