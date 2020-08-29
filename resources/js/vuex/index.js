import Vue from 'vue'
import Vuex from 'vuex'

import state from './state'
import * as actions from './actions'
import * as mutations from './mutations'
import * as getters from './getters'
import abilityPlugin from './ability'

/*import*/
import delivery from '../app/delivery/vuex'
import cart from '../app/cart/vuex'
import suppliers from '../app/suppliers/vuex'
import store from '../app/store/vuex'
import society from '../app/society/vuex'
import user from '../app/user/vuex'
import auth from '../app/auth/vuex'
import admin from '../app/admin/vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	state,
	actions,
	mutations,
	getters,
    modules: {
        admin: admin,
        auth:auth,
		user:user,
		society:society,
		store:store,
		suppliers:suppliers,
		cart:cart,
		delivery:delivery,
		/*export*/
    },
    plugins: [
    	abilityPlugin
    ]
})