<script>
  export default {

 		data: function() {
            return {  
            	Level:[],
            }
        },
        methods: {
            Level_singel: function(param) {

                if(param=='dy')
                {
                	this.Level=2;
                	console.log(this.Level);
                }
                else if(param=='tre')
                {
                	this.Level=3;
                	console.log(this.Level);
                }
                if(param=='kater')
                {
                	this.Level=4;
                	console.log(this.Level);
                }

        		this.$http.post('/store', this.Level).then(function(response) {

                	console.log(response.data);
                })
            },
        }
    }
</script>

<template  src="./templates/singel_player.html">

</template>

<style>
	.singelplayer{margin-bottom: 100px;}

</style>