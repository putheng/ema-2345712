import Vue from 'vue'

Vue.mixin({
	methods: {
		trunc (str, limit) {
		    return (str.length > limit) ? str.substr(0, limit - 1) + '...' : str
		},
		noteTitleN(str){
			return str.substr(0, 1)
		}
	}
})