<template lang="html">
  <div class="notification-log list-group">
    <!-- <a href="#">News <span class="badge">5</span></a><br> -->
    <notification-item v-for="notification in notifications" :notification="notification"></notification-item>
    <div class="empty" v-show="notifications.length === 0">
        Nothing here yet!
    </div>
  </div>
</template>

<script>
  export default {
    props: ['notifications']
  }
</script>

<style lang="css">
  /*.notification-log .notification-item:nth-child(even) {
      background-color: #ccc;
  }*/
  .empty {
    padding: 1rem;
    text-align: center;
  }
  
  .notification-log {
    margin-bottom: 0px;
  }
</style>