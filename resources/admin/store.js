import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store=new Vuex.Store({
	state:{
		playersInRoom : [],
		idRoom : [],
		test:1212,
		game:[],

	}
})
