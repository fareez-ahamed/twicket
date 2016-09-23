// import Vue from 'vue'
import router from './router.js'
import App from './App'
import Login from './Login'
import NavbarView from './components/NavbarView'
import Dashboard from './components/Dashboard'
import 'bootstrap-sass/assets/stylesheets/_bootstrap.scss'

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
