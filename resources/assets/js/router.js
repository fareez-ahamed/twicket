import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

let router = new VueRouter()

router.beforeEach(transition => {
  if (!transition.to.router.app.userHasLoggedIn &&
      transition.to.path !== '/login') {
    console.log('Hi')
    transition.redirect({
      path: '/login'
    })
  } else {
    transition.next()
  }
})

export default router
