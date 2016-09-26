
import $ from 'jquery'
window.$ = window.jQuery = $
// import Vue from 'vue'
import router from './router.js'
import App from './App.vue'
import NavbarView from './components/NavbarView.vue'
import Dashboard from './components/Dashboard.vue'
import UserManagementView from './components/UserManagementView.vue'

require('bootstrap-sass') // ES6 Import doesn't work

router.map({
  '/': {
    component: NavbarView,
    subRoutes: {
      '/': {
        component: Dashboard
      }
    }
  },
  '/admin/user': {
    component: NavbarView,
    subRoutes: {
      '/': {
        component: UserManagementView
      }
    }
  }
})

router.start(App, 'body')
