
import $ from 'jquery'
window.$ = window.jQuery = $
// import Vue from 'vue'
import router from './router.js'
import App from './App.vue'
import NavbarView from './components/NavbarView.vue'
import Dashboard from './components/Dashboard.vue'

require('bootstrap-sass') // ES6 Import doesn't work

router.map({
  '/': {
    component: NavbarView,
    subRoutes: {
      '/': {
        component: Dashboard
      }
    }
  }
})

router.start(App, 'body')
