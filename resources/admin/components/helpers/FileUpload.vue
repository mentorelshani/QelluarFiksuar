<script type="text/javascript">
	import Vue from 'vue'

	Vue.component('fileupload', {
	 	template: `
			  <div v-if="!image">
			    <h2>{{ value }}</h2>
			    <input type="file" accept="image/*" :value="value" v-on:change="onFileChange">
			  </div>
			  <div v-else>
			    <img :src="image" />
			    <button @click="removeImage">Remove image</button>
			  </div>
		    `,
		    props: {
	          	value: {
	        		required: true
	      		}
		    },
		      data: function (){
			    return {
			    	image: ''
			  	}
			  },
			  methods: {
			    onFileChange(e) {
			      var files = e.target.files || e.dataTransfer.files;
			      if (!files.length)
			        return;
			      this.createImage(files[0]);
			    },
			    createImage(file) {
			      var image = new Image();
			      var reader = new FileReader();
			      var vm = this;

			      reader.onload = (e) => {
			        vm.image = e.target.result;
			       	console.log(e);
			      };
			      reader.readAsDataURL(file);
			    },
			    removeImage: function (e) {
			      this.image = '';
			    }
			  }
	})
</script>