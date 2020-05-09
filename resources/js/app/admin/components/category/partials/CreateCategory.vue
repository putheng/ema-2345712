<template>
<transition name="fade">
	<div class="modal modal-alert fade" 
		id="CategoryCreate" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog" role="document">
			<app-form @created="created" action="admin/category">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Add a category
						</h5>
					</div>
					<div class="modal-body">

						<app-input name="name" label="Name"/>

						<app-input name="icon" label="Icon"/>

						<app-input name="parent" label="Parent ID"/>

						<app-input name="area" label="Area" value="1"/>
						
					</div>
					<div class="modal-footer">
						<app-button type="submit">
							Create
						</app-button>
						<button
							type="button"
							class="btn btn-warning"
							data-dismiss="modal"
							
						>
							Cancel
						</button>
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