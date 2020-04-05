export const fetchNetworks = ({commit}, data) => {
	axios.get('sociaty/show').then((response) => {
		commit('setNetworks', response.data.data)
	}).catch(() => {})
	
}

export const fetchTransfers = ({commit}, data) => {
	axios.get('payment/transfer').then((response) => {
		commit('setTransfers', response.data.data)
	}).catch(() => {})
}