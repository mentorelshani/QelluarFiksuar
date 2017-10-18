<script>
    export default {

		data: function() {
            return {
            	  players:[],
                  length1:[],
                  tries:[{"aa" : '1'}],
                  getOrder:[],

                  game_id:[],
                  inputTry:[],
                  tryinfo:[],
                  order:[],
                  game:{"order" : '1'},
                  abc:32,
                  bool:[],

            }
        },
        // tries.length%tries[0].game.room.maxPlayers == game[0].order -1

		mounted () {

            this.loadData();
            this.getPlayersInRoom();

            setInterval(function () {
                this.bool=this.$store.state.game.order == this.order;
                this.getPlayersInRoom();
                this.loadData();
                this.bool=this.tries.length%this.length1== this.game.order -1 || this.tries['aa']== '1';

                console.log("this.length1  "+this.length1);
                console.log("this.tries.length  "+this.tries.length);
                console.log("game[0]oreder  "+ this.game.order);
            }.bind(this), 1000);

                console.log(this.$store.state.game);
            this.order = 1;
            this.bool=this.$store.state.game.order == this.order;



                
        },
        methods: {
            loadData: function () {
                this.$http.get('getGameTries').then(function (response) {
                    if(response.data.length != 0){
                        this.tries = response.data;
                   
                    }
                    else
                    {
                         this.tries = [{
                            "game":{
                                "user":{
                                    "username": ""
                                }
                            },
                            "tentimi" :"",
                            "message" :"Nuk ka asnje tentim"
                         
                        
                         }];
                     }


                });
             },
             getPlayersInRoom:function () {
                this.$http.get('getReadyPlayers').then(function (response) {
                    this.players = response.data;
                    if(response.data!=null)
                    {
                        this.room_id=response.data[0].room_id;
                        this.length1 = response.data.length;
                    }
                    
                });
             },

             SendTry:function()
             {
                this.tryinfo.push({
                    number:this.inputTry,
                    room_id:this.room_id});
                var length = this.tryinfo.length;


                this.$http.post('/try', this.tryinfo[(length-1)]).then(function(response) {

                    this.game =response.data;
                    console.log(this.game);
                

                })

                this.getOrder.push({
                    count:this.length1,
                    order:this.order,
                })

                this.$http.post('/getOrder/',this.getOrder[(length-1)]).then(function(response) {
                    this.order =response.data;
                    console.log(this.order);


                })

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