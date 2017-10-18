import Vue from 'vue'
import Resource from 'vue-resource'
import Router from 'vue-router'

import App from './components/App.vue'
import Page_one from './components/Page1.vue'
import SingelPlayer from './components/Singel_Player.vue'
import MultiPlayer from './components/Multi_Player.vue'
import Game from './components/Game.vue'
import NewGame from './components/New_game.vue'
import FindGame from './components/Find_game.vue'
import StartMulti from './components/StartMulti.vue'
import GameMulti from './components/Game_Multi_Player.vue'

import notification from './services/notification';

import { store } from './store.js';

// Install plugins
Vue.use(Router)
Vue.use(Resource)


var routes = [
    {
      path: '/page1',
      name: 'page1',
      component: Page_one
    },
    {
      path: '/singelplayer',
      name: 'singelplayer',
      component: SingelPlayer
    },
    {
      path: '/multiplayer',
      name: 'multiplayer',
      component: MultiPlayer
    },
    {
      path: '/game',
      name: 'game',
      component: Game
    },
    {
      path: '/newgame',
      name: 'new_game',
      component: NewGame
    },
    {
      path: '/findgame',
      name: 'find_game',
      component: FindGame
    },
    {
      path: '/startmultiplayer',
      name: 'startmultiplayer',
      component: StartMulti
    },
    {
      path: '/game-multiplayer',//duhet te dergohet id ne url->/game-multiplayer/:id
      name: 'startmultiplayer',
      component: GameMulti
    }, 
    {
      path: 'enterRoom/id',
      name: 'EnterRoom',
      component: Game
    },

]

// Set up a new router
var router = new Router({
    mode: 'history',
    routes: routes
})


new Vue({
    router: router,
    store,
    render: h => h(App)
}).$mount('#admin')

