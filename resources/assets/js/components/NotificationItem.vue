<template lang="html">
  <li class="notification-item list-group-item" v-bind:class="[notification.seen === 0 ? 'unread-message' : 'read-message']">
    <div v-if="notification.url">
      <a v-bind:href="notification.url" class="notification-link" @click="viewNotification">
        <img class="image" :src="'http://fleamarket.me/image/'+notification.approver" alt="" width="32" height="32" />
        {{ notification.message }}
      </a>
    </div>
    <div class="" v-else>
      <img class="image" :src="'http://fleamarket.me/image/'+notification.approver" alt="" width="32" height="32" />
      {{ notification.message }}
    </div>
    <p>
      <i class="fa fa-calendar-times-o" aria-hidden="true"></i> {{notification.created_at}}
    </p>
  </li>
</template>

<script>
  export default {
    props: ['notification'],
    methods: {
      viewNotification() {
        var url = this.notification.url;
        if(this.notification.seen == 0) {
          url = url+ "?notification="+ this.notification.id;
        }
        $.get(url, function(data, status){
          
        });
        // console.log(this.notification.url+"?x=vandung");
      }
    }
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
