$(document).ready(function() {
  var url = 'http://fleamarket.me/update-unread-notification';
  $('#notification a').click(function(){      
    if (typeof $('#notification a').attr('aria-expanded') === 'undefined' || $('#notification a').attr('aria-expanded') === 'false') {
      $.get(url, function (data, status) {
        
      });
      $('#notification-count').html(0);
      
    }
  });
});
