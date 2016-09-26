<template>
  <navbar></navbar>
  <div class="container navbar-view-margin">
    <router-view></router-view>
  </div>
</template>

<script>
import Navbar from './Navbar.vue'

export default {

  components: { Navbar }

}
</script>
