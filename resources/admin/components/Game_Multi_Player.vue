<script>
    export default {

		data: function() {
            return {
            	  players:[],
                  tries:[],
                  order:[],


                  tryinfo:[],
                  inputTry:null,
                  bool:false,

            }
        },
        // tries.length%tries[0].game.room.maxPlayers == game[0].order -1

		mounted () {
            this.getPlayersInRoom();
            setInterval(function () {
                this.bool=this.$store.state.game.order == this.order;
                this.getTries();
                this.GetRoomOrder();
                this.bool=this.order == this.$store.state.game.order;

            }.bind(this), 2000);


                
        },
        methods: {
            getTries: function () {
                this.$http.get('getGameTries/'+this.$store.state.room.id).then(function (response) {
                    
                        this.tries = response.data;
                });
             },
             getPlayersInRoom:function () {
                this.$http.get('getReadyPlayers/'+this.$store.state.room.id).then(function (response) {
                    this.players = response.data;                    
                });
             },

             SendTry:function()
             {
                this.tryinfo.push({
                    number:this.inputTry,
                    game_id:this.$store.state.game.id});


                this.$http.post('/try', this.tryinfo[this.tryinfo.length-1]).then(function(response) {

                    this.$store.commit('setRoom', response.data);

                })

             },

             GetRoomOrder:function(response){
                 this.$http.get('getRoom/'+this.$store.state.room.id).then(function (response) {
                    this.order = response.data.orders;                    
                });
             }



        },

    }
</script>

<template src="./templates/game_multi_player.html">

</template>

<style>
	.tentimet{
        text-align: center;
        margin-top: 30px;
        position: relative;
        width:500px;
        float:left; 
    }
    .players{
        text-align: top;
        position: relative;
        float:right;
        
    }
    .inputItem{
        text-align: center;
        position: relative;
    }
    .multiGame{
            position: absolute;
    margin-left: 8%;
    }

</style>