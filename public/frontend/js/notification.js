$(document).ready(function(){
  var DURATION_IN_SECONDS = {
    epochs: ['year', 'month', 'day', 'hour', 'minute'],
    year: 31536000,
    month: 2592000,
    day: 86400,
    hour: 3600,
    minute: 60
  };

  function getDuration(seconds) {
    var epoch, interval;

    for (var i = 0; i < DURATION_IN_SECONDS.epochs.length; i++) {
      epoch = DURATION_IN_SECONDS.epochs[i];
      interval = Math.floor(seconds / DURATION_IN_SECONDS[epoch]);
      if (interval >= 1) {
        return {
          interval: interval,
          epoch: epoch
        };
      }
    }

  };

  function timeSince(date) {
    var seconds = Math.floor((new Date() - new Date(date)) / 1000);
    var duration = getDuration(seconds);
    var suffix = (duration.interval > 1 || duration.interval === 0) ? 's' : '';
    return duration.interval + ' ' + duration.epoch + suffix;
  };

  var notificationsToggle    = $('.nav-icon');
     
  showNoti();

  function showNoti(){
    $.get("/answernoti",function(response){
      var count = response.length;
      if(count > 0){
        notificationsToggle.find('span').html('+'+count);
      }else{
        notificationsToggle.find('span').html(0);
      }
      
    });
  }
    
  Pusher.logToConsole = true;

  var pusher = new Pusher('0569f3090279c1cbab87', {
    cluster: 'ap1'
  });

      
  var channel = pusher.subscribe('my-channel1');

  channel.bind('my-event1', function(data) {
          
    showNoti();
    notificationsToggle.show();
  });

      
})