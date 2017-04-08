
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
                // if ($("#notificationContainer").is(":visible") == true) {
                //   
                // }
                $("#notification-count").html(parseInt($('#notification-count').html())+ 1);
                // sessionStorage.setItem('notificationCount', parseInt(sessionStorage.getItem('notificationCount')) + 1);
                // $('#notification-count').show();
            });
    }
});