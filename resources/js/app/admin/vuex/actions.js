export const fetchStores = ({commit}) => {
	return axios.get('store/store').then((response) => {
		commit('setStores', response.data)

		return Promise.resolve(response)
	})
}

export const fetchRoles = ({ commit }) => {
	axios.get('admin/roles').then((response) => {
		commit('setRoles', response.data.data)

		return Promise.resolve(response)
	}).catch((error) => {

		return Promise.reject(error)
	})
}