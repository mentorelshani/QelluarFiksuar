import Vue from 'vue'
import Resource from 'vue-resource'
import Router from 'vue-router'
import * as VueGoogleMaps from 'vue2-google-maps'

import App from './components/App.vue'
import Home from './components/Home.vue'

// Install plugins
Vue.use(Router)
Vue.use(Resource)

Vue.use(VueGoogleMaps, {
  load: 'AIzaSyBJFggZoYEll4HUmYwXbPXv48-7VRIZ_T4'
})

Vue.filter('truncate', function (string, value) {
  return string.substring(0, value) + '...';
})

// route config
let routes = [
  {
    path: '/home',
    name: 'home',
    component: Home
  },
  { path: '*', redirect: '/home' }
]

// Set up a new router
let router = new Router({
  mode: 'history',
  routes: routes
})

router.beforeEach(function (to, from, next) {
  window.scrollTo(0, 0)
  next();
});

// Start up our app
new Vue({
  router: router,
  render: h => h(App)
}).$mount('#app')
