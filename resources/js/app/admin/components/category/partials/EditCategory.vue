<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="CategoryEdit" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog" role="document">
			<app-form @created="created" :action="'admin/category/'+ category.slug">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Update category
						</h5>
					</div>
					<div class="modal-body">

						<input-binding v-model="category.name" name="name" label="Name"/>

						<input-binding v-model="category.icon" name="icon" label="Icon"/>

						<input-binding v-model="category.area" name="area" label="Area" value="1"/>

						<input-binding v-model="category.parent" name="parent" label="Parent ID"/>

						<input-binding v-model="category.order" name="order" label="Order"/>
						
					</div>
					<div class="modal-footer">

						<button
							type="button"
							class="btn btn-warning"
							data-dismiss="modal"
							
						>
							Cancel
						</button>

						<app-button type="submit">
							Update
						</app-button>
					</div>
				</div>
			</app-form>
		</div>
	</div>
</transition>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		props: ['category'],
		data(){
			return {
				
			}
		},
		computed: {
			
		},
		methods: {
			created(e){
				this.$emit('created', e)
			}
		}
	}
</script>

<style scoped>

.slide-leave-active,
.slide-enter-active {
	transition: all 200ms;
}
.slide-enter {
	transform: translate(100%, 0);
}
.slide-leave-to {
	transform: translate(100%, 0);
}
</style>