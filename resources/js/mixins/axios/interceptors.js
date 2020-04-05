import axios from 'axios'
import store from '../../vuex'

axios.interceptors.response.use((response) => {
	store.commit('setStatusCode', response.status)

	if(response.status === 200){
		store.dispatch('clearErrors')
		if(response.data.message){
			store.commit('setMessage', response.data.message)
		}

		if(response.data.success){
			store.commit('formCompleted', true)
		}
	}

	if(response.data.login){
		window.location.replace('/'+ response.data.role);
	}
	
	return Promise.resolve(response)
}, (error) => {
	store.commit('setStatusCode', error.response.status)
	
	if(error.response.status === 422){
		
		store.commit('setMessage', error.response.data.message)
		
		store.dispatch('setValidationErrors', error.response.data.errors)
		store.dispatch('setErrors', error.response.data.message)
	}

	if(error.response.status === 402){
		store.dispatch('setErrors', error.response.data.message)
	}

	if(error.response.status === 500){
		store.dispatch('setErrors', "Status Code: 500, look like something went wrong. please try again later or report to your system administrator.")
	}

	if(error.response.status === 404){
		store.dispatch('setErrors', "Oop, look like something went wrong. please try again later or report to your system administrator.")
	}

	return Promise.reject(error)
})