<template>
  <table class="table is-hoverable is-fullwidth">
    <tbody>
      <tr v-for="(address, index) in addresses" :key="address.id">
        <td>
          <p :class="{ 'has-text-weight-bold': address.id === selectedAddress.id }">
            {{ address.name }} - {{ address.phone }}<br>
            {{ address.address }},
            {{ address.city.name }},
            {{ address.country.name }}.
            
          </p>
        </td>
        <td class="text-right">
          <a href="" class="btn btn-sm btn-primary" @click.prevent="$emit('click', address)">
            ជ្រើសយក
          </a>
          <a href="" class="btn btn-link" @click.prevent="removeAddress(address.id, index)">
            លុបចោល
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
  export default {
    props: {
      addresses: {
        required: true,
        type: Array
      },
      selectedAddress: {
        required: true,
        type: Object
      }
    },

    methods: {
      async removeAddress(id, index){
        if(confirm('Are you sure to delete this addresse?')){
          
          this.addresses.splice(index, 1)

          let r = await axios.delete(`addresses/${id}`)

          // this.addresses = r.data.data

          

        }
        
      }
    }
  }
</script>
