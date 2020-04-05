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