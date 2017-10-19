<script>
    export default {

		
        data: function() {
            return {
            	  ReadyPlayers:[],
                  bool:false,
            }
        },

		mounted () {
          
            

             setInterval(function () {
                this.getReadyPlayers();

                }.bind(this), 1000);

           
        },
        methods:{
        	startGame:function() {
        		
        	},

            getReadyPlayers:function() {
                 this.$http.get('getReadyPlayers/'+this.$store.state.room.id).then(function (response) {
                    this.ReadyPlayers=response.data;
                    this.bool = this.ReadyPlayers.length == this.$store.state.room.maxPlayers;
                });
            },

        },    	
    }
</script>

<template src="./templates/start_multi.html">

</template>

<style>
	
</style>