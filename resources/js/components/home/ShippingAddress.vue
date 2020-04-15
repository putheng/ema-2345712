<template>
	<div>
		<div class="d-flex flex-wrap justify-content-between align-items-center rounded-lg border py-2 px-3 mb-4">
			<div class="media media-ie-fix align-items-center mr-3 py-2">
				<div class="media-body">
					<div class="font-size-ms text-muted">Shipping to:</div>
					<div class="font-size-md font-weight-medium text-heading">New York, USA</div>
				</div>
			</div>
			<div class="py-2">
				<a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="#" @click.prevent="creating = true">
				<i class="czi-edit mr-2"></i>Add an address
				</a>
			</div>
		</div>
		<div class="row" v-if="creating">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="co-fn">First name <span class='text-danger'>*</span></label>
					<input class="form-control" type="text" id="co-fn" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="co-ln">Last name <span class='text-danger'>*</span></label>
					<input class="form-control" type="text" id="co-ln" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="co-ln">Phone number <span class='text-danger'>*</span></label>
					<input class="form-control" type="text" id="co-phone" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="co-fn">Email address</label>
					<input class="form-control" type="email" id="co-email">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label for="co-address">Address <span class='text-danger'>*</span></label>
					<input class="form-control" type="text" id="co-address" required>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label for="co-note">Order note</label>
					<textarea class="form-control" id="co-note" rows="6" placeholder="Please write here any additional information..."></textarea>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data(){
		return {
			selecting: false,
        	creating: false,
		}
	}
}
</script>





