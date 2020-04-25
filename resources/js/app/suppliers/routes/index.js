import {
	C15E9BE43C01B23B,
	C15E9BE446493C1B,
	C15E9BE45652FE7B,
	C15E9BE46421FE0B,
	C15E9BE46B7C32EB,
	C15E9BE47B0EB2DB,
	C15EA2B2FA040AAB,
	C15EA2B56DCCF92B,
	C15EA2B84CC23C7B,
	/****/
} from '../components'


export default [
	{
		path: '/supplier/product/sale',
		component: C15E9BE43C01B23B,
		name: 'suppliers-product-sale'
	},
	{
		path: '/supplier/product',
		component: C15E9BE446493C1B,
		name: 'suppliers-product'
	},
	{
		path: '/supplier/product/add',
		component: C15E9BE45652FE7B,
		name: 'suppliers-product-add'
	},
	{
		path: '/supplier/account',
		component: C15E9BE46421FE0B,
		name: 'suppliers-account'
	},
	{
		path: '/supplier/account/password',
		component: C15E9BE46B7C32EB,
		name: 'suppliers-account-password'
	},
	{
		path: '/supplier/cart/order',
		component: C15E9BE47B0EB2DB,
		name: 'suppliers-product-orders'
	},
	{
		path: '/supplier',
		component: C15E9BE43C01B23B,
		name: 'suppliers-account-summary'
	},
	{
		path: '/supplier/product/:slug/edit',
		component: C15EA2B56DCCF92B,
		name: 'suppliers-product-edit'
	},
	{
		path: '/supplier/product/:slug/variation',
		component: C15EA2B84CC23C7B,
		name: 'suppliers-product-variation'
	},
	/**/
]