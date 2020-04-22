import {
	C15E721F8BC2EACB,
	C15E721F9ADACE4B,
	C15E721FAD5E2EDB,
	C15E721FBB8B956B,
	C15E721FCB37391B,
	C15E722B788E455B,
	C15E722B8300903B,
	C15E722B8E7FA54B,
	C15E722C6D0F2C0B,
	C15E72F0BEAB700B,
	C15E732B9A2E15DB,
	/****/
} from '../components'


export default [
	{
		path: '/dashboard',
		component: C15E721F8BC2EACB,
		name: 'user-dashboard'
	},
	{
		path: '/dashboard/cart/order',
		component: C15E721F8BC2EACB,
		name: 'user-dashboard-order'
	},
	{
		path: '/dashboard/cart/wishlist',
		component: C15E721F9ADACE4B,
		name: 'user-dashboard-wishlist'
	},
	{
		path: '/dashboard/settings/profile',
		component: C15E721FAD5E2EDB,
		name: 'user-settings-profile'
	},
	{
		path: '/dashboard/settings/addresses',
		component: C15E721FBB8B956B,
		name: 'user-settings-addresses'
	},
	{
		path: '/dashboard/payments/methods',
		component: C15E721FCB37391B,
		name: 'user-settings-payment'
	},
	{
		path: '/dashboard/payments/balance',
		component: C15E722B788E455B,
		name: 'user-payments-balance'
	},
	{
		path: '/dashboard/payments/withdraw',
		component: C15E722B8300903B,
		name: 'user-payments-withdraw'
	},
	{
		path: '/dashboard/payments/transactions',
		component: C15E722B8E7FA54B,
		name: 'user-payments-transactions'
	},
	{
		path: '/dashboard/tickets',
		component: C15E722C6D0F2C0B,
		name: 'user-dashboard-tickets'
	},
	{
		path: '/dashboard/ticket/:id',
		component: C15E72F0BEAB700B,
		name: 'user-dashboard-viewticket'
	},
	{
		path: '/dashboard/settings/password',
		component: C15E732B9A2E15DB,
		name: 'user-settings-password'
	},
	/**/
]