import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  count: 0,
  user: null,
  token: null,
  loginMessage: null
}

const mutations = {
  INCREMENT (state) {
    state.count++
  },

  LOGIN (state, token) {
    state.token = token
  },

  SET_LOGIN_MSG (state, type, message) {
    state.loginMessage = {
      type: type,
      message: message
    }
  },

  CLEAR_LOGIN_MSG (state) {
    state.loginMessage = null
  }
}

export default new Vuex.Store({
  state,
  mutations
})
