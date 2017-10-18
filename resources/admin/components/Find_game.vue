<script>
	export default {
 		data: function() {
            return {

            	rooms:[],
                players:[],


            }
        },

        mounted () {

        	this.$http.get('getRooms').then(function (response) {
                    this.rooms = response.data;
                    console.log(this.rooms);
                });
        },

        methods: {
            JoinRoom: function(param) {

                this.$http.get('enterRoom/'+param).then(function (response) {
                    console.log(response.data);
                    this.$store.state.game=response.data;
                });



                }	
            },

        }
    
</script>

<template  src="./templates/find_game.html">

</template>

<style>

</style>