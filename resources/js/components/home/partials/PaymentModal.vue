<template>
<div class="modal fade" id="modalLarge" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Payment</h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" :src="url"></iframe>	
				</div>
				
			</div>
			<!-- <div class="modal-footer">
				<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
				<button class="btn btn-primary btn-shadow btn-sm" type="button">Save changes</button>
			</div> -->
		</div>
	</div>
</div>
</template>

<script>
	export default {
		props: ['url']
	}
</script>