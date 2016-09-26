<template>
<div class="panel panel-default">
  <div class="panel-heading">
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <span>Users</span>
      <a class="action-link" @click="showCreateUserForm">Create New Client</a>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.action-link {
  cursor: pointer;
}

.m-b-none {
  margin-bottom: 0;
}
</style>
