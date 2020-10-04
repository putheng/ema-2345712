import axios from 'axios'
import queryString from 'query-string'

export const submit = ({commit}, {endpoint, payload, method}) => {
	commit('clearValidationErrors', '', {root:true})
	commit('setLoading', '', {root:true})
	
	return axios({ method: method, url: endpoint, data: payload }).then((response) => {
		commit('clearValidationErrors', '', {root:true})
		
		return Promise.resolve(response)
	}).catch((error) => {
		return Promise.reject(error)
	})
}

export const fetchUser = ({commit}) => {
	return axios.get('account/me').then((response) => {
		commit('setUserData', response.data.data, {root:true})

		return Promise.resolve(response)
	}).catch((error) => {
		return Promise.reject(error)
	})
}

export const setValidationErrors = ({commit}, error) => {
	commit('setValidationErrors', error)
}

export const setErrors = ({commit}, error) => {
	commit('setErrors', error)
}

export const clearErrors = ({commit}) => {
	commit('setErrors')
}

export const resetLoading = ({commit}) => {
	commit('clearLoading')
}

export const clearValidateFor = ({commit}, error) => {
	commit('clearValidateFor', error)
}

export const clearValidationErrors = ({commit}) => {
	commit('clearValidationErrors')
}

export const clearMessage = ({commit}) => {
	commit('clearMessage')
}

export const getCart = ({ commit, state }) => {
    let query = {}

    if (state.shipping) {
      query.shipping_method_id = state.shipping.id
    }

    return axios.get(`cart?${queryString.stringify(query)}`)
	    .then((response) => {
	    	commit('SET_PRODUCTS', response.data.data.products)
		    commit('SET_EMPTY', response.data.meta.empty)
		    commit('SET_SUBTOTAL', response.data.meta.subtotal)
		    commit('SET_TOTAL', response.data.meta.total)
		    commit('SET_CHANGED', response.data.meta.changed)

	    	return Promise.resolve(response)
	    })
	    .catch((error) => {
	    	return Promise.reject(error)
	    })
}

export const destroy = ({ dispatch }, productId) => {
    axios.delete(`cart/${productId}`)
    .then((response) => {
    	dispatch('getCart')
    })
}

export const update = ({ dispatch }, { productId, quantity }) => {
    return axios.patch(`cart/${productId}`, {
      quantity
    })
    .then((response) => {
    	dispatch('getCart')
    })
}

export const storeCart = ({ dispatch, commit }, products) => {
    axios.post('cart', {
      products
    })
    .then((response) => {
    	commit('SET_PRODUCTS', response.data.data.products)
	    commit('SET_EMPTY', response.data.meta.empty)
	    commit('SET_SUBTOTAL', response.data.meta.subtotal)
	    commit('SET_TOTAL', response.data.meta.total)
	    commit('SET_CHANGED', response.data.meta.changed)

    	return Promise.resolve(response)
    })
    .catch((error) => {
    	alert(error.response.data.errors.message)
    	return Promise.reject(error)
    })
}

export const setShipping = ({ commit }, shipping) => {
    commit('SET_SHIPPING', shipping)
}
