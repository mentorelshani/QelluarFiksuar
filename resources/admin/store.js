import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store=new Vuex.Store({
	state:{
		playersInRoom : [],
		idRoom : [],
		test:1212,

		room:null,
		game:[],


	},
	mutations: {
        setRoom(state, room) {
          state.room=room;
        },
        setGame(state, game) {
          state.game=game;
        },

	}
})
