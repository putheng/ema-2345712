export const setValidationErrors = (state, errors) => {
	state.validation = errors
	state.loading = false
}

export const setErrors = (state, errors) => {
	state.error = errors
	state.loading = false
}

export const clearValidationErrors = (state) => {
	state.validation = []
	state.loading = false
}

export const clearValidateFor = (state, error) => {
	state.validation[error] = null
}


export const setLoading = (state) => {
	state.loading = true
}

export const clearLoading = (state) => {
	state.loading = false
}

export const setMessage = (state, message) => {
	state.message = message
	state.showMessage = true
}

export const clearMessage = (state) => {
	state.message = null
	state.showMessage = false
}

export const setStatusCode = (state, message) => {
	state.statusCode = message
}

export const setUserData = (state, data) => {
	state.userData = data
}

export const formCompleted = (state, message) => {
	state.formCompleted = message
}

export const  SET_PRODUCTS = (state, products) => {
    state.products = products
}

export const SET_EMPTY = (state, empty) => {
    state.empty = empty
}

export const SET_SUBTOTAL = (state, subtotal) => {
    state.subtotal = subtotal
}

export const SET_TOTAL = (state, total) => {
    state.total = total
}

export const SET_CHANGED = (state, changed) => {
    state.changed = changed
}

export const SET_SHIPPING = (state, shipping) => {
    state.shipping = shipping
}

