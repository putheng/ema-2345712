<template>
	<div class="avatar-upload">
	    <div class="avatar-edit">
	        <input 
	        	@change="readURL"
	        	type='file'
	        	id="imageUpload"
	        	accept="image/*"
	         />
	        <label for="imageUpload"><i class="fa fa-pencil-alt"></i></label>
	    </div>
	    <div class="avatar-preview">
	        <div id="imagePreview" :style="{ 'background-image': 'url(' + user.avatar + ')' }">
	        </div>
	    </div>

	</div>
</template>

<script>
	import { mapGetters } from 'vuex'
	
	import upload from '../../mixins/upload'
	export default {
        mixins: [
            upload
        ],
        computed: {
        	...mapGetters({
        		user: 'userData'
        	})
        },
		methods: {
			readURL(e) {
			    if (e.target.files && e.target.files[0]) {
				    this.upload(e).then((response) => {
	                    

	                }).catch((error) => {

	                })

			    	this.value = e.target.files[0]
			    	
			        var reader = new FileReader()

			        reader.onload = function(e) {
			        	

			            $('#imagePreview').css('background-image', 'url('+ e.target.result +')')
			            $('#imagePreview').hide()
			            $('#imagePreview').fadeIn(650)
			        }

			        reader.readAsDataURL(e.target.files[0])
			    }
			}
		}
	}
</script>
