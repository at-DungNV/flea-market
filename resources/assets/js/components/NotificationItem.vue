<template lang="html">
  <li class="notification-item list-group-item" v-bind:class="[notification.seen === 1 ? 'unread-message' : 'read-message']">
    <i class="fa fa-dot-circle-o fa-lg" aria-hidden="true"></i> {{ notification.message }} - {{notification.created_at}} - {{notification.seen}}
  </li>
</template>

<script>
  export default {
    props: ['notification']
  }
</script>

<style lang="css">
.notification-item {
    padding: 1rem;
}

.notification-item > p {
    margin-bottom: .5rem;
}
.unread-message {
  background-color: #ccc;
}

.read-message {
  background-color: white;
}
</style>
