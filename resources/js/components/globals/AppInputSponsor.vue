<template>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group" :class="{'d-none':inputType == 'hidden' }">
				<label v-if="label" :for="id" class="col-form-label">{{ label }} 
					<b>{{ auth.uuid }}</b></label>
				<input
					:name="inputName"
					:type="inputType"
					v-bind="$attrs"
					:id="id"
					class="form-control"
					@input="$emit('input', $event.target.value)"
					v-model="inputValue"
					@keyup="clearValidation"
					@keydown="fetchSponsor"
					:value="value"
					v-bind:class="{'is-invalid': validation[inputName]}"
				>
				<div class="invalid-feedback" v-if="validation[inputName]">
		            <i class="fa fa-exclamation-circle fa-fw"></i>
		            {{ validation[inputName] +'' }}
		        </div>
		        
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-form-label">Sonsor Name</label>
				<input type="text" name="sponsor" class="form-control" disabled>
				{{ sponsors }}
			</div>
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
			id: this.formtedInputName(),
			inputType: this.formtedInputType(),
			inputName: this.formtedInputName(),
			inputValue: this.value,
			sponsors: [],
		}
	},
	methods: {
		clearValidation(){
			this.$store.dispatch('clearValidateFor', this.inputName)
		},
		formtedInputType(){
			return this.type == 'email' ? 'text' : this.type
		},
		formtedInputName(){
			return this.name.replace(/\s+/g, '_').toLowerCase()
		},
		fetchSponsor(){
			axios.get(`sociaty/filter?id=${this.inputValue}`).then((response) => {
				console.log(response.data)
			})
		}
	},
	computed: {
		...mapGetters({
			validation: 'getValidationErrors',
			completed: 'formCompleted',
			auth: 'userData'
		})
	}
}
</script>