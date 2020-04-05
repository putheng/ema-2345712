import Vue from 'vue'

const Modal = {
	install(Vue){
		this.event = new Vue()

		Vue.prototype.$modal = {
			show(modal){
				console.log(modal)
				Modal.event.$emit('show', modal)
			},

			$event: this.event
		}
	}
}


Vue.use(Modal)