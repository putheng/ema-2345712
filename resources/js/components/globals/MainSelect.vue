<template>
	<div class="form-group">
		<label :for="id">{{ label }}</label> 
		<select 
			class="custom-select"
			:id="id"
			v-bind="$attrs"
			:name="inputName"
			:value="value"
			v-model="inputValue"
			@input="$emit('input', $event.target.value)"
			v-bind:class="{'is-invalid': validation[inputName]}"
			@change="clearValidation"
		>
			<option :key="key" :value="item.id" v-for="(item, key) in data">{{ item.title }}</option>
		</select>
		<div class="invalid-feedback" v-if="validation[inputName]">
            <i class="fa fa-exclamation-circle fa-fw"></i>
            {{ validation[inputName] +'' }}
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
			type: {
				required: false,
				type: String,
				default: 'text'
			},
			label: {
				required: false,
				type: String
			},
			data: {
				required: true,
				type: Array
			},
			value: {
				required: false,
				default: ''
			}
		},
		data(){
			return {
				id: this.formtedInputName(),
				inputName: this.formtedInputName(),
				inputValue: this.value
			}
		},
		methods: {
			clearValidation(){
				this.$store.dispatch('clearValidateFor', this.inputName)
			},
			formtedInputName(){
				return this.name.replace(/\s+/g, '_').toLowerCase()
			}
		},
		computed: {
			...mapGetters({
				validation: 'getValidationErrors'
			})
		}
	}
</script>