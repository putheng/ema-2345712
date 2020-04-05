import Vue from 'vue'

Vue.mixin({
	computed:{
		routes(){
			return JSON.parse('[{"uri":"\/auth\/logout","name":"auth.logout"},{"uri":"\/webapi\/v1\/login","name":"guest.login"},{"uri":"\/webapi\/v1\/register","name":"guest.register"},{"uri":"\/webapi\/v1\/me","name":"me.index"},{"uri":"\/webapi\/v1\/me\/create","name":"me.create"},{"uri":"\/webapi\/v1\/me","name":"me.store"},{"uri":"\/webapi\/v1\/me\/{me}","name":"me.show"},{"uri":"\/webapi\/v1\/me\/{me}\/edit","name":"me.edit"},{"uri":"\/webapi\/v1\/me\/{me}","name":"me.update"},{"uri":"\/webapi\/v1\/me\/{me}","name":"me.destroy"}]')
		}
	},

	methods: {
		route(name){
			let route = this.routes.filter((r) => {
				return r.name == name
			})[0]

			if(route.uri != undefined){
				return route.uri
			}

			return '#'
		}
	},

	mounted(){
		let uri = this.routes[9].uri
	}
})