<template>
	<div>
		<div class="d-flex flex-wrap justify-content-between align-items-center rounded-lg border py-2 px-3 mb-4">
			<div class="media media-ie-fix align-items-center mr-3 py-2">
				<div class="media-body">
					<div class="font-size-ms text-muted">ដឹកជញ្ជូន​ទៅ:</div>
					<div class="font-size-md font-weight-medium text-heading" v-if="selectedAddress">
            {{ selectedAddress.name }} - {{ selectedAddress.phone }}<br>
            {{ selectedAddress.address }},
            {{ selectedAddress.city.name }},
            {{ selectedAddress.country.name }}
            
            
          </div>
				</div>
			</div>
			<div class="py-2">
        <a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0"
          href="#" @click.prevent="changeAddress">
          ជ្រើសរើស អាសយដ្ឋាន
        </a>
				<a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0"
					href="#" @click.prevent="addAddress">
					បង្កើត អាសយដ្ឋាន
				</a>
			</div>
		</div>
		
		<template v-if="selecting">
      <shipping-address-selector
        :addresses="addresses"
        :selectedAddress="selectedAddress"
        @click="addressSelected"
      />
  	</template>
  	<template v-else-if="creating">
    	<shipping-address-creator
      	@cancel="creating = false"
      	@created="created"
      />
  	</template>
	</div>
</template>

<script>

import { mapGetters, mapActions } from 'vuex'

  export default {
    data () {
      return {
        selecting: false,
        creating: false,
        // localAddresses: this.addresses,
        selectedAddress: null
      }
    },

    watch: {
      selectedAddress (address) {
        this.$emit('input', address.id)
      }
    },

    props: {
      addresses: {
        required: true,
        type: Array
      }
    },

    computed: {
      defaultAddress () {
        return this.localAddresses.find(a => a.default === true)
      },

      localAddresses:{
        set(value){
          return this.addresses = value
        },
        get(){
          return this.addresses
        }
      }
    },

    methods: {
      addressSelected (address) {
        this.switchAddress(address)
        this.selecting = false
        this.creating = false
      },

      addAddress(){
        this.creating = true
        this.selecting = false
      },

      changeAddress(){
        this.selecting = true

        this.switchAddress(this.defaultAddress)
      },

      switchAddress (address) {
        this.selectedAddress = address
      },

      created (address) {
        this.localAddresses.push(address)
        this.creating = false

        this.switchAddress(address)
      }
    },

    created () {
      if (this.addresses.length) {
        this.switchAddress(this.defaultAddress)
      }
    }
}
</script>





