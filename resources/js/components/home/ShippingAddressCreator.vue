<template>
<form @submit.prevent="store">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="co-fn">Location Name <span class='text-danger'>*</span></label>
				<input class="form-control" type="text" id="co-fn" v-model="form.name" 
					:class="{'is-invalid': validation['name']}">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="co-ln">Phone number <span class='text-danger'>*</span></label>
				<input class="form-control" type="text" id="co-phone" v-model="form.phone"
					:class="{'is-invalid': validation['phone']}">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="co-address">Address <span class='text-danger'>*</span></label>
				<input class="form-control" type="text" id="co-address" v-model="form.address"
					:class="{'is-invalid': validation['address']}">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="co-ln">City <span class='text-danger'>*</span></label>
				<city-dropdown v-model="form.city_id" />
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="co-fn">Country <span class='text-danger'>*</span></label>
				<country-dropdown v-model="form.country_id" />
			</div>
		</div>
		<div class="col-sm-12">
			
		</div>

		<div class="col-sm-12">
			<button type="submit" class="btn btn-primary" :disabled="loading">
				<span v-if="loading" 
				class="spinner-border spinner-border-sm mr-2"
				role="status" aria-hidden="true"></span>
				Add address
			</button>

			<button class="btn btn-link" @click.prevent="$emit('cancel')">Cancel</button>
			<br><br>
		</div>
	</div>
</form>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
	data () {
      	return {
      		loading: false,
	        form: {
				name: '',
				address: '',
				city_id: '',
				phone: '',
				country_id: '',
				default: true
	        }
      	}
    },

    methods: {
    	store () {
    		this.loading = true
	        axios.post('addresses', this.form)
	        .then((response) => {
	        	this.$emit('created', response.data.data)
	        	this.loading = false
	        })
	        .catch((error) => {
	        	this.loading = false
	        })
	        
    	}
    },

    computed: {
    	...mapGetters({
			validation: 'getValidationErrors',
		}),
    }
}
</script>