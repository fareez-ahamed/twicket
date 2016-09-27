import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

Vue.use(VueRouter)
Vue.use(VueResource)

let router = new VueRouter()

Vue.http.interceptors.push((request, next) => {
  request.headers.set('X-CSRF-TOKEN', window.Laravel.csrfToken)
  next()
})

// router.beforeEach(transition => {
//   if (!transition.to.router.app.userHasLoggedIn &&
//       transition.to.path !== '/login') {
//     console.log('Hi')
//     transition.redirect({
//       path: '/login'
//     })
//   } else {
//     transition.next()
//   }
// })

export default router
