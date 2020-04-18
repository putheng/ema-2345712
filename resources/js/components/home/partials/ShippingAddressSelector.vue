<template>
  <table class="table is-hoverable is-fullwidth">
    <tbody>
      <tr v-for="address in addresses" :key="address.id">
        <td>
          <p :class="{ 'has-text-weight-bold': address.id === selectedAddress.id }">
            {{ address.name }} - {{ address.phone }}<br>
            {{ address.address }},
            {{ address.city.name }},
            {{ address.country.name }}.
            
          </p>
        </td>
        <td>
          <a href="" class="button is-info" @click.prevent="$emit('click', address)">
            Ship here
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
    }
  }
</script>
