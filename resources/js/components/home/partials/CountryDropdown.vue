<template>
  <select @change="changed" class="custom-select mr-2"
    :class="{'is-invalid': validation['city_id']}">
    <option value="">Please select</option>
    <option :value="country.id" v-for="country in countries" :key="country.id">
      {{ country.name }}
    </option>
  </select>
</template>

<script>
  import { mapGetters } from 'vuex'
  
  export default {
    data () {
      return {
        countries: []
      }
    },

    methods: {
      async getCities () {
        let response = await axios.get('countries')

        this.countries = response.data.data
      },

      changed ($event) {
        this.$emit('input', $event.target.value)
      }
    },

    mounted() {
      this.getCities()
    },

    computed: {
      ...mapGetters({
        validation: 'getValidationErrors',
      }),
    }
  }
</script>
