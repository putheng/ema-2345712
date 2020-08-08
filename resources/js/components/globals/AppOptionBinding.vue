<template>
<div class="form-group">
	<label class="col-form-label">{{ label }}</label>
	<select 
		:name="inputName"
		class="custom-select"
		
		@input="$emit('input', $event.target.value)"
		@change="clearValidation"
		v-bind="$attrs"
		:class="{'is-invalid': validation[inputName]}"
	>
		<optgroup :label="option.name" v-for="option in options">
			<option :value="option.id" >All</option>
			<option 
				v-for="child in option.children"
				v-if="option.children" 
				:selected="child.id == selected"
				:value="child.id"> 
					{{ child.name }}
				</option>
		</optgroup>
		
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
			required: false,
		}

	},

	methods: {
		clearValidation(e){
			this.inputValue = e.target.value
			this.$store.dispatch('clearValidateFor', this.inputName)
		},
		formatedInputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		}
	},

	data(){
		return {
			inputValue: ''
		}
	},

	mounted(){
		this.inputValue = this.selected
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
		}
	},
}
</script>
</template>