// import Vue from 'vue'
import router from './router.js'
import App from './App.vue'
import Login from './Login.vue'
import NavbarView from './components/NavbarView.vue'
import Dashboard from './components/Dashboard.vue'
// import 'bootstrap-sass/assets/stylesheets/_bootstrap.scss'

router.map({
  '/login': {
    component: Login
  },
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
