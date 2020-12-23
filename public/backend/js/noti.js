$(document).ready(function(){

  var notificationsToggle    = $('.questionsnoti');
     
  showNoti();

  function showNoti(){
    $.get("/questionnoti",function(response){
      var count = response.length;
      if(count > 0)
      {
        notificationsToggle.find('span').html(count);
        var html='';
        $('.panelnoti').text(count+' New Notifications');
        function timeAgo(someDateInThePast) {
          var result = '';
          var difference = Date.now() - someDateInThePast;

          if (difference < 5 * 1000) {
              return 'just now';
          } else if (difference < 90 * 1000) {
              return 'moments ago';
          }

          //it has minutes
          if ((difference % 1000 * 3600) > 0) {
              if (Math.floor(difference / 1000 / 60 % 60) > 0) {
                  let s = Math.floor(difference / 1000 / 60 % 60) == 1 ? '' : 's';
                  result = `${Math.floor(difference / 1000 / 60 % 60)} minute${s} `;
              }
          }

          //it has hours
          if ((difference % 1000 * 3600 * 60) > 0) {
              if (Math.floor(difference / 1000 / 60 / 60 % 24) > 0) {
                  let s = Math.floor(difference / 1000 / 60 / 60 % 24) == 1 ? '' : 's';
                  result = `${Math.floor(difference / 1000 / 60 / 60 % 24)} hour${s}${result == '' ? '' : ','} ` + result;
              }
          }

          //it has days
          if ((difference % 1000 * 3600 * 60 * 24) > 0) {
              if (Math.floor(difference / 1000 / 60 / 60 / 24) > 0) {
                  let s = Math.floor(difference / 1000 / 60 / 60 / 24) == 1 ? '' : 's';
                  result = `${Math.floor(difference / 1000 / 60 / 60 / 24)} day${s}${result == '' ? '' : ','} ` + result;
              }

          }

          return result + ' ago';
        }
        $.each(response,function(i,v){
          let url = '/backside/questions/'+v.data.id;
          if(i<4){
            const currentTimeStamp = Date.parse(v.created_at);
            html+='<a href="'+url+'" class="list-group-item">';
                html+=`<div class="row g-0 align-items-center">
                      <div class="col-2">
                        <i class="text-danger" data-feather="alert-circle"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">Update completed</div>
                        <div class="text-muted small mt-1">${v.data.description}</div>
                        <div class="text-muted small mt-1">${timeAgo(currentTimeStamp)}</div>
                      </div>
                    </div>
                  </a>`;
                }else{

                }
        });
        $('#noti_data').html(html);
        
      }else 
      {
        var html='';
        $('.panelnoti').text('0 New Notifications');
        html+=`<a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <i class="text-danger" data-feather="alert-circle"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark text-center">Empty Notification</div>
                        
                      </div>
                    </div>
                  </a>`;
        $('#noti_data').html(html);
        notificationsToggle.find('span').text(0);
        
      }
    });
  }
    
  Pusher.logToConsole = true;

  var pusher = new Pusher('0569f3090279c1cbab87', {
    cluster: 'ap1'
  });

      
  var channel = pusher.subscribe('my-channel');

  channel.bind('my-event', function(data) {
          
    showNoti();
    notificationsToggle.show();
  });

      
})