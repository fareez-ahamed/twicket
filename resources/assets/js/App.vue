<template>
  <router-view></router-view>
</template>

<script>
import store from './vuex/store'
import { login } from './vuex/actions'

export default {

  replace: false,

  store,

  vuex: {
    getters: {
      userHasLoggedIn: (state) => {
        return state.token !== null
      }
    },
    actions: {
      login: login
    }
  }
}
</script>

<style>

</style>
