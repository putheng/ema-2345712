<template>
	<div class="visual-picker has-peek">
		<input 
			type="file"
			:id="'vpc02'+ inputName"
			class="d-none"
			accept="image/*"
			@change="readURL"
		>
		<label v-if="onSelected"
			class="visual-picker-figure" 
			:style="{ 'background-image': 'url(' + imgSrc + ')' }"
			:for="'vpc02'+ inputName">
		</label>
		<label v-else-if="image"
			class="visual-picker-figure" 
			:style="{ 'background-image': 'url(' + image.url + ')' }"
			:for="'vpc02'+ inputName">
		</label>
		<label v-else
			class="visual-picker-figure" 
			:for="'vpc02'+ inputName">
			<span class="visual-picker-content">
				<span class="tile tile-lg">
					<span class="oi oi-image"></span>
				</span>
			</span>
		</label>
		<a v-if="onSelected" 
			@click.prevent="remove"
			href="#" class="visual-picker-peek">Remove</a>
		<a v-if="image" 
			@click.prevent="removeImage(image.id)"
			href="#" class="visual-picker-peek">Remove</a>
	</div>
</template>

<script>
	export default {
		props: {
			name: {
				required: true,
				type: String
			},
			image: {
				required: false,
				type: Object
			}
		},
		data(){
			return {
				onSelected: false,
				url: '',
				inputValue: '',
				imgSrc: '',
			}
		},

		mounted(){
			this.imgSrc = this.image
		},

		computed: {
			inputName(){
				return this.name.replace(/\s+/g, '_').toLowerCase()
			}
		},

		methods: {
			remove(){
				this.onSelected = false
				this.inputValue = ''
			},

			removeImage(imageID){
				this.image = ''
				axios.post(`products/image/remove`, {
					id: imageID
				})
			},

			readURL(e) {
				const file = e.target.files[0]
				
				if (!file.type.includes('image/')) {
			        alert('Please select an image file')
			        return
			    }

			    if (typeof FileReader === 'function') {
			        const reader = new FileReader()

			        reader.onload = (event) => {
			    		this.onSelected = true
			        	this.imgSrc = event.target.result
			        	this.inputValue = e.target.files[0]  
			        }

			        reader.readAsDataURL(file)
			    } else {
			        alert('Sorry, FileReader API not supported')
			    }
			}
		}
	}
</script>

<style scoped>
.visual-picker-figure{
	background-position: center;
	background-size: contain;
	background-repeat: no-repeat;
}
</style>