<template>
  <div class="container">
    <div class="row login-box">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="well well-lg">
          <div v-if="loginMessage" class="alert alert-{{loginMessage.type}}" role="alert">{{ loginMessage.message }}</div>
          <form class="form-horizontal" @submit.prevent="login(email, password)" role="form">
            <div class="form-group">
              <div class="col-sm-12">
                <input v-model="email" type="email" name="email" id="inputEmail" class="form-control" value="" required="required" title="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <input v-model="password" type="password" name="password" id="inputPassword" class="form-control" value="" required="required" title="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-block btn-primary">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { login } from './vuex/actions'

export default {
  data () {
    return {
      email: '',
      password: ''
    }
  },
  vuex: {
    getters: {
      loginMessage: (store) => {
        return store.loginMessage
      }
    },
    actions: {
      login
    }
  }
}
</script>

<style>
.login-box {
  margin-top: 200px;
}
</style>
