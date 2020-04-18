<template>
  <select @change="changed" class="custom-select mr-2"
    :class="{'is-invalid': validation['city_id']}">
    <option value="">Please select</option>
    <option :value="city.id" v-for="city in cities" :key="city.id">
      {{ city.name }}
    </option>
  </select>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    data () {
      return {
        cities: []
      }
    },

    methods: {
      async getCities () {
        let response = await axios.get('cities')

        this.cities = response.data.data
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
