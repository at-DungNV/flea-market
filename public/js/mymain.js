$(document).ready(function() {
  if (isNaN(sessionStorage.getItem('notificationCount'))) {
    sessionStorage.setItem('notificationCount', 0);
    $('#notification-count').hide();
  } else {
    $("#notification-count").html(sessionStorage.getItem('notificationCount'));
  }
  
  if (isNaN(sessionStorage.getItem('notificationCount')) || sessionStorage.getItem('notificationCount') == 0) {
    $('#notification-count').hide();
  }
});

$('#notification a').click(function(){        
  if (typeof $(this).attr('aria-expanded') == 'undefined' || $(this).attr('aria-expanded') == 'false') {
    $('#notification-count').hide();
    sessionStorage.setItem('notificationCount', 0);
  } 
});