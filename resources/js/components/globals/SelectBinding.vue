<template>
<div class="form-group">
	<label class="col-form-label">{{ label }}</label>
	<select 
		:value="selected"
		:name="inputName"
		class="custom-select"
		v-model="inputValue"
		@input="$emit('input', $event.target.value)"
		@change="clearValidation"
		v-bind="$attrs"
		:class="{'is-invalid': validation[inputName]}"
	>
		<option value=""> Choose... </option>
		<option :value="option.value" v-for="option in options"> {{ option.name }} </option>
	</select>
	<div class="invalid-feedback" v-if="validation[inputName]">
        <i class="fa fa-exclamation-circle fa-fw"></i>
        {{ validation[inputName][0] }}
    </div>
</div>
</template>

<script>
import { mapGetters, mapActions, mapState } from 'vuex'

export default {
	props: {
		options: {
			required: true,
			type: Array
		},
		name: {
			required: true,
			type: String
		},
		label: {
			required: true,
			type: String
		},
		selected: {
			
		}
	},

	methods: {
		clearValidation(){
			this.$store.dispatch('clearValidateFor', this.inputName)
		},
		formatedInputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		}
	},

	computed: {
		...mapGetters({
			validation: 'getValidationErrors',
		}),
		id(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		},
		inputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		},
		inputValue: {
			get() {
				return this.selected;
			},
			set(val) {
				this.$emit('input', val);
			}
		}
	},
}
</script>