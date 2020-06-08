<template>
	<div class="form-group" :class="{'d-none':inputType == 'hidden' }">
		<label v-if="label" :for="id" class="col-form-label">{{ label }}</label>
		<input
			:name="inputName"
			:type="inputType"
			v-bind="$attrs"
			:id="id"
			class="form-control"
			@input="$emit('input', $event.target.value)"
			v-model="inputValue"
			@keyup="clearValidation"
			:value="value"
			v-bind:class="{'is-invalid': validation[inputName]}"
		>
		<div class="invalid-feedback" v-if="validation[inputName]">
            <i class="fa fa-exclamation-circle fa-fw"></i>
            {{ validation[inputName][0] }}
        </div>
        
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
import store from '.../../vuex'

export default {
	props: {
		name: {
			required: true,
			type: String
		},
		isClear: {
			required:false,
			type: String
		},
		type: {
			required: false,
			type: String,
			default: 'text'
		},
		label: {
			required: false,
			type: String
		},
		value: {
			required: false,
			default: ''
		}
	},
	data(){
		return {
			inputValue: this.value
		}
	},
	methods: {
		clearValidation(e){
		  	this.$emit('keyup', e)
	 		this.$store.dispatch('clearValidateFor', this.inputName)
		},
		formtedInputType(){
			return this.type == 'email' ? 'text' : this.type
		},
		formtedInputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		}
	},
	computed: {
		...mapGetters({
			validation: 'getValidationErrors',
			completed: 'formCompleted'
		}),
		id(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		},
		inputType(){
			return this.type == 'email' ? 'text' : this.type
		},
		inputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		},
	}
}
</script>