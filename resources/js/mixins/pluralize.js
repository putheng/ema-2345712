import Vue from 'vue'
import pluralize from 'pluralize'

const Pluralize = {
	install(Vue, option){
		Vue.mixin({
			methods: {
				pluralize: pluralize
			}
		})
	}
}

Vue.use(Pluralize)