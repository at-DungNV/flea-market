
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */


Vue.component('notification-item', require('./components/NotificationItem.vue'));
Vue.component('notification-log', require('./components/NotificationLog.vue'));

document.addEventListener('DOMContentLoaded', function () {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe(message, url) {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('Notification from admin', {
      icon: '/images/small-logo-01.png',
      body: message,
    });
    setTimeout(notification.close.bind(notification), 3000);
    notification.onclick = function () {
      // window.location = url;
      notification.close();
    };
    
  }

}

if(user != null) {
  const demo = new Vue({
    el: '#notification',
    data: {
      notifications: []
    },
    methods: {
    },
    
    created() {
      // khi load trang sẽ lấy giá trị gán vào element giống như gọi bình thường
      Vue.http.get('/notifications').then((response) => {
        this.notifications = response.data;
      });
      
      // this is called real time
      Echo.private('notification'+id)
      .listen('PostApprovalEvent', (e) => {
        this.notifications.unshift(e.notification);
        $("#notification-count").html(parseInt($('#notification-count').html())+ 1);
        notifyMe(e.notification.data.message, e.notification.data.url);
      });
      
      Echo.private('notification'+id)
      .listen('SendMessageEvent', (e) => {
        this.notifications.unshift(e.notification);
        $("#notification-count").html(parseInt($('#notification-count').html())+ 1);
        notifyMe(e.notification.data.message, "http://stackoverflow.com/a/13328397/1269037");
      });
    }
  });
}