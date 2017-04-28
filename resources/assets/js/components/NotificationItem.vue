<template lang="html">
  <li class="notification-item list-group-item" v-bind:class="[notification.read_at == null ? 'unread-message' : 'read-message']">
    <div v-if="notification.data.url">
      <a v-bind:href="notification.data.url" class="notification-link" @click="viewNotification">
        <img class="image" :src="'http://fleamarket.me/image/'+notification.data.approver" alt="" width="32" height="32" />
        {{ notification.data.message }}
      </a>
    </div>
    <div class="" v-else>
      <img class="image" :src="'http://fleamarket.me/image/'+notification.data.approver" alt="" width="32" height="32" />
      {{ notification.data.message }}
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
        var url = this.notification.data.url;
        if(this.notification.read_at == null) {
          url = url+ "?notification="+ this.notification.id;
        }
        $.get(url, function(data, status){
          
        });
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
