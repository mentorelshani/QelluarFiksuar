<script>
    export default {
 		data: function() {
            return {

            	diff:[],
            	nr_player:[],
            	name_room:[],
              id_room:[],
              id:1,
              players:[],
              

            	room:[],

            }
        },
        methods: {
            CreateRoom: function() {

               this.room.push({
               		level:this.diff,
               		maxPlayers:this.nr_player,
               		name:this.name_room}); 


               	this.$http.post('/createRoom', this.room[0]).then(function(response) {

                  console.log(response.data);
                  this.id_room=response.data.id;
                  this.$store.state.game=response.data.game;


                })

                this.$http.get('/getReadyPlayers/'+this.id).then(function(response) {

                  console.log(response.data);
                  this.players=response.data;
              
                  
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