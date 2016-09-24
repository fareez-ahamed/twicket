<template>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">#twicket</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Username <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" @click.prevent="logout">Logout</a>
              <form v-el:logout-form id="logout-form" action="/logout" method="POST" style="display: none;">
                <input type="hidden" name="_token" v-model="csrf_token">
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
</template>

<script>
export default {
  data () {
    return {
      csrf_token: window.Laravel.csrfToken
    }
  },
  methods: {
    logout () {
      console.log('logging out')
      console.log(this.$els.logoutForm)
      this.$els.logoutForm.submit()
      console.log('logged out')
    }
  }
}
</script>
