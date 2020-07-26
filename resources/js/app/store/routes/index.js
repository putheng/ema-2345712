import {
	C15E818B8012FC0B,
	C15E818BC5DFBC0B,
	C15E818BD314DE4B,
	C15E818BDC0DFDBB,
	C15E818C0E93EC0B,
	C15E818D89703CEB,
	C15E818FBBE1A5AB,
	C15E818FC8A12DDB,
	C15E818FD2763CEB,
	C15E896E7217A60B,
	C15E8DEC1EE9B1BB,
	C15E9A8D409C560B,
	C15E9A8D4D1DD86B,
	C15E9A8D5B54D26B,
	C15E9A8D683E323B,
	C15EA995A476316B,
	C15F1CC2DF26B9FB,
	/****/
} from '../components'


export default [
	{
		path: '/store',
		component: C15E818BDC0DFDBB,
		name: 'store-index'
	},
	{
		path: '/store/setting',
		component: C15E818B8012FC0B,
		name: 'store-setting'
	},
	{
		path: '/store/products/new',
		component: C15E818BC5DFBC0B,
		name: 'store-products-new'
	},
	{
		path: '/store/products',
		component: C15E818BD314DE4B,
		name: 'store-products'
	},
	{
		path: '/store/products/sale',
		component: C15E818BDC0DFDBB,
		name: 'store-products-sale'
	},
	{
		path: '/store/setting/profile',
		component: C15E818C0E93EC0B,
		name: 'store-setting-profile'
	},
	{
		path: '/store/setting/password',
		component: C15E818D89703CEB,
		name: 'store-setting-password'
	},
	{
		path: '/store/payments/payout',
		component: C15E818FBBE1A5AB,
		name: 'store-payments-payout'
	},
	{
		path: '/store/payments/methods',
		component: C15E818FC8A12DDB,
		name: 'store-payments-methods'
	},
	{
		path: '/store/payments/balance',
		component: C15E818FD2763CEB,
		name: 'store-payments-balance'
	},
	{
		path: '/store/product/:slug/variation',
		component: C15E896E7217A60B,
		name: 'store-products-variation'
	},
	{
		path: '/store/products/:slug/edit',
		component: C15E8DEC1EE9B1BB,
		name: 'store-products-edit'
	},
	{
		path: '/store/cart/order',
		component: C15E9A8D409C560B,
		name: 'store-cart-order'
	},
	{
		path: '/store/cart/tickets',
		component: C15E9A8D4D1DD86B,
		name: 'store-cart-tickets'
	},
	{
		path: '/store/cart/wishlist',
		component: C15E9A8D5B54D26B,
		name: 'store-cart-wishlist'
	},
	{
		path: '/store/cart/tickets/:id',
		component: C15E9A8D683E323B,
		name: 'store-cart-viewticket'
	},
	{
		path: '/store/products/orders',
		component: C15EA995A476316B,
		name: 'store-products-orders'
	},
	{
		path: '/store/products/cashier',
		component: C15F1CC2DF26B9FB,
		name: 'store-products-cashier'
	},
	/**/
]