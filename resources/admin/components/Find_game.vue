<script>
	export default {
 		data: function() {
            return {

            	rooms:[],
                players:[],


            }
        },

        mounted () {
            setInterval(function () {
                this.GetRooms();
            }.bind(this), 5000);

        },

        methods: {
            JoinRoom: function(param) {

                this.$http.get('enterRoom/'+param).then(function (response) {

                    this.$store.commit('setRoom', response.data.room);
                    this.$store.commit('setGame', response.data.game);
                });
                },
            GetRooms: function(){

                this.$http.get('getRooms').then(function (response) {
                        this.rooms = response.data;
                    });
            }	
        },
    }
    
</script>

<template  src="./templates/find_game.html">

</template>

<style>

</style>