<template>
<div>
	<h6>{{ type }}</h6>
	<div class="form-group d-flex flex-wrap align-items-center">

		<select class="custom-select mr-3 mb-3" style="width: 12rem;" :value="selectedVariationId" @change="changed($event, type)">
			<option value="">Please choose</option>
			<option
            v-for="v in variation"
            :key="v.id"
            :value="v.id"
            :disabled="!v.in_stock"
          >
            {{ v.name }}

            <template v-if="v.tax_price">
              ({{ v.sale_price }})
            </template>


            <template v-if="!v.in_stock">
              (out of stock)
            </template>
          </option>
		</select>
	</div>
</div>
</template>

<script>
export default {
	props: {
		type: {
			required: true,
			type: String
		},
		variation: {
			required: true,
			type: Array
		},
		value: {
			required: false,
			default: ''
		}
	},

    computed: {
      selectedVariationId () {
        if (!this.findVariation(this.value.id)) {
          return ''
        }

        return this.value.id
      }
    },

    methods: {
      changed (event, type) {
        this.$emit('input', this.findVariation(event.target.value))
      },

      findVariation (id) {
        let vari = this.variation.find(v => v.id == id)

        if (typeof vari === 'undefined') {
          return null
        }

        return vari
      }
    }
}
</script>