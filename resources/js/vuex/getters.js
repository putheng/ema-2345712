import { Ability } from '@casl/ability'

export const getValidationErrors = (state) => state.validation

export const getLoading = (state) => state.loading

export const getError = (state) => state.error

export const getMessage = (state) => state.message

export const showMessage = (state) => state.showMessage

export const formCompleted = (state) => state.formCompleted

export const userData = (state) => state.userData

export const ability = () => {
	return new Ability([], {
		subjectName(subject) {
		  return !subject || typeof subject === 'string'
		    ? subject
		    : subject[TYPE_KEY]
		}
	})
}

export const products = (state) => {
    return state.products
}

export const cartCount = (state) => {
    return state.products.length
}

export const empty = (state) => {
    return state.empty
}

export const subtotal = (state) => {
    return state.subtotal
}

export const total = (state) => {
    return state.total
}

export const changed = (state) => {
    return state.changed
}

export const shipping = (state) => {
    return state.shipping
}
