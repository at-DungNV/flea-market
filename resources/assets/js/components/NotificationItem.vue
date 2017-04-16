<template lang="html">
  <li class="notification-item list-group-item" v-bind:class="[notification.seen === 0 ? 'unread-message' : 'read-message']">
    <img class="image" :src="'http://fleamarket.me/image/'+notification.user.avatar" alt="" width="32" height="32" />
    {{ notification.message }}
    <p>
      <i class="fa fa-calendar-times-o" aria-hidden="true"></i> {{notification.created_at}}
    </p>
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
