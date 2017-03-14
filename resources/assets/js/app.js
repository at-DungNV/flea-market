
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
 
window.Pusher = require('pusher-js');

import Echo from "laravel-echo"

window.echo = new Echo('24b72305eb14391936ea');

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
    data: {
      messages: [],
      usersInRoom: []
    },
    methods: {
      addMessage(message) {
        // Add to existing messages
        this.messages.push(message);
        // Persist to the database etc
        axios.post('/messages', message).then(response => {
          // Do whatever;
        })
      }
    },
    created() {
      axios.get('/messages').then(response => {
        this.messages = response.data;
        console.log(response.data);
      });
      
      Echo.join('chatroom')
            .here((users) => {
                this.usersInRoom = users;
            })
            .joining((user) => {
                this.usersInRoom.push(user);
            })
            .leaving((user) => {
                this.usersInRoom = this.usersInRoom.filter(u => u != user)
            })
            .listen('MessagePosted', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });
    }
});
