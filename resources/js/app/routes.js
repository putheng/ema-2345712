import delivery from './delivery/routes'
import cart from './cart/routes'
import suppliers from './suppliers/routes'
import store from './store/routes'
import society from './society/routes'
import user from './user/routes'
import auth from './auth/routes'
import admin from './admin/routes'

export default [
	...admin,
	...auth,
	...user,
	...society,
	...store,
	...suppliers,
	...cart,
	...delivery,
	/**/
]
