<template>
<div class="media align-items-center py-2 border-bottom" >
	<a class="d-block mr-2" href="#">
	<img width="64" :src="product.product.images[0].url" alt="Product"/>
	</a>
	<div class="media-body">
		<h6 class="widget-product-title">
			<a target="_blank" 
				:href="'/product/'+ product.product.slug + '/show'">
				{{ product.product.name }} / {{ product.type }} - {{ product.name }}
			</a>
		</h6>
		<div class="widget-product-meta">
			<div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
				<div>
					<span class="text-accent mr-2">{{ product.sale_price }}</span>
					<span class="text-muted">x {{ product.quantity }}</span>
					<span class="text-accent mr-2">= {{ product.total }}</span>
				</div>

				<div>
					<select v-model="quantity" class="custom-select custom-select-sm mr-2">
						<option value="0" v-if="product.quantity == 0">0</option>
						<option
			                :value="x"
			                v-for="x in product.stock_count"
			                :key="x"
			                :selected="x == product.quantity"
			            >
			                {{ x }}
			            </option>
					</select>
					
				</div>
				<div>
					<button @click.prevent="destroy(product.id)" class="btn btn-link">Remove</button>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
  import { mapActions } from 'vuex'

  export default {
    computed: {
      quantity: {
        get () {
          return this.product.quantity
        },

        set (quantity) {
          this.update({ productId: this.product.id, quantity })
        }
      }
    },

    props: {
      product: {
        required: true,
        type: Object
      }
    },

    methods: {
      ...mapActions({
        destroy: 'destroy',
        update: 'update'
      })
    }
  }
</script>