<script>
    export default {

		
        data: function() {
            return {
            	  ReadyPlayers:[],

            }
        },

		mounted () {
            this.$http.get('getReadyPlayers').then(function (response) {
                this.ReadyPlayers=response.data;
                    console.log(this.ReadyPlayers);
            });
            console.log(this.$store.state.test);
        },
        methods:{
        	startGame:function() {
        		
        	},

        },    	
    }
</script>

<template src="./templates/start_multi.html">

</template>

<style>
	
</style>