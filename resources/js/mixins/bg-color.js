import Vue from 'vue'

Vue.mixin({
	methods:{
		noteTiTleColor(str){
			let t = str.substr(0, 1).toLowerCase()

			if(t == 'a'){
				return 'bg-primary'
			}
			if(t == 'b'){
				return 'bg-secondary'
			}
			if(t == 'c'){
				return 'bg-info'
			}
			if(t == 'd'){
				return 'bg-blue'
			}
			if(t == 'f'){
				return 'bg-warning'
			}
			if(t == 'g'){
				return 'bg-danger'
			}
			if(t == 'h'){
				return 'bg-light'
			}
			if(t == 'e'){
				return 'bg-success'
			}
			if(t == 'i'){
				return 'bg-blue'
			}
			if(t == 'j'){
				return 'bg-indigo'
			}
			if(t == 'k'){
				return 'bg-purple'
			}
			if(t == 'l'){
				return 'bg-pink'
			}
			if(t == 'm'){
				return 'bg-red'
			}
			if(t == 'n'){
				return 'bg-orange'
			}
			if(t == 'o'){
				return 'bg-yellow'
			}
			if(t == 'p'){
				return 'bg-green'
			}
			if(t == 'q'){
				return 'bg-teal'
			}
			if(t == 'r'){
				return 'bg-cyan'
			}
			if(t == 's'){
				return 'bg-gray'
			}
			if(t == 't'){
				return 'bg-gray-dark'
			}
			if(t == 'u'){
				return 'bg-yellow'
			}
			if(t == 'v'){
				return 'bg-yellow'
			}
			if(t == 'w'){
				return 'bg-cyan'
			}
			if(t == 'x'){
				return 'bg-purple'
			}
			if(t == 'y'){
				return 'bg-blue'
			}
			if(t == 'z'){
				return 'bg-indigo'
			}

			return 'bg-gray'
		}
	}
})