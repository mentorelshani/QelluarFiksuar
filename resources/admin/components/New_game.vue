<script>
    export default {
 		data: function() {
            return {

            	diff:[],
            	nr_player:[],
            	name_room:[],

              room:[],
              asd:1234,

            }
        },
        methods: {
            CreateRoom: function() {

               this.room.push({
               		level:this.diff,
               		maxPlayers:this.nr_player,
               		name:this.name_room}); 


               	this.$http.post('/createRoom', this.room[this.room.length-1]).then(function(response) {

                  this.$store.commit('setRoom', response.data.room);
                  this.$store.commit('setGame', response.data.game);
                
                  // this.$store.state.room=this.asd;

                })


               },
            ClearForm: function() {

               this.diff=null;
               this.nr_player=null;
               this.name_room=null;

	
               },

            },
        }
    
</script>

<template src="./templates/new_game.html">

</template>

<style>
	
</style>