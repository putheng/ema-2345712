<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">My orders</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-fluid">
					<div class="card-body">
						<table class="table">
							<thead>
								<th>Order #</th>
								<th>Date Purchased</th>
								<th>Status</th>
								<th>Total</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<app-modal 
											commit="admin/setIndustries"
											:data="{id:'00'}"
											:option="{ title: 'Update', url: '/api/industry/edit'}"
											cancel="Close" id="convertToID" title="Update" >
											<h6>Order No - 34VB5540K83</h6>
										</app-modal>

										<a href="#" 
											data-toggle="modal" 
											data-target="#convertToID">
											34VB5540K83
										</a>
										
									</td>
									<td>May 21, 2020</td>
									<td><span class="badge badge-primary">In Progress</span></td>
									<td>$358.75</td>
								</tr>
								<tr>
									<td>
										<a href="#" 
											data-toggle="modal" 
											data-target="#convertToID">
											34VB5540K83
										</a>
									</td>
									<td>May 21, 2020</td>
									<td><span class="badge badge-danger">Cancel</span></td>
									<td>$358.75</td>
								</tr>
								<tr>
									<td @click.prevent="$modal.show('newTodo')">
										<a href="#" 
											data-toggle="modal" 
											data-target="#convertToID">
											34VB5540K83
										</a>
									</td>
									<td>May 21, 2020</td>
									<td><span class="badge badge-warning">Delayed</span></td>
									<td>$358.75</td>
								</tr>
								<tr>
									<td @click.prevent="$modal.show('newTodo')">
										<a href="#" 
											data-toggle="modal" 
											data-target="#convertToID">
											34VB5540K83
										</a>
									</td>
									<td>May 21, 2020</td>
									<td><span class="badge badge-success">Delivered</span></td>
									<td>$358.75</td>
								</tr>
								<tr>
									<td @click.prevent="$modal.show('newTodo')">
										<a href="#" 
											data-toggle="modal" 
											data-target="#convertToID">
											34VB5540K83
										</a>
									</td>
									<td>May 21, 2020</td>
									<td><span class="badge badge-success">Delivered</span></td>
									<td>$358.75</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		methods: {
			//
		},
		computed: {
			//
		},
		mounted(){
			//
		}
	}
</script>
