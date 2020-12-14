<!DOCTYPE html>
<html>
<head>
  <title> 404 - Page Not Found </title>
  <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}" />

  <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/errors.css') }}">

</head>
<body>

  <h1 id="headerBg"> 404 </h1>

  <div class="container">
      <h1>4 <div class="emojis-wrapper">
    <div class="emoji emoji1">
        <div class="mouth"></div>
    </div> 4</h1>
      <!-- <h3>Page Not Found </h3> -->

      <p> Oh no! This page doesn't exist.  </p>

      <a href="{{ route('frontend.index') }}" class="button"> Go Back Main Page </a>
  </div>

      <script type="text/javascript">
      var canvas = document.createElement('canvas');
      var height = canvas.height = window.innerHeight;
      var width = canvas.width = window.innerWidth;
      var ctx = canvas.getContext('2d');
      document.body.appendChild(canvas);

      function random(min,max)
      {
          return Math.random()*(max-min+1)+min;
      }

      function range_map(value,in_min, in_max, out_min, out_max) {
        return (value - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
      }

      var word_arr = [];
      var txt_min_size = 5;
      var txt_max_size = 25;
      var keypress = false;
      var acclerate = 2;
      for (var i = 0; i < 25; i++) {
        word_arr.push({
          x : random(0,width),
          y : random(0,height),
          text : '404',
          size : random(txt_min_size,txt_max_size)
        });

        word_arr.push({
          x : random(0,width),
          y : random(0,height),
          text : 'page',
          size : random(txt_min_size,txt_max_size)
        });


        word_arr.push({
          x : random(0,width),
          y : random(0,height),
          text : 'not found',
          size : random(txt_min_size,txt_max_size)
        });

        word_arr.push({
          x : random(0,width),
          y : random(0,height),
          text : '404',
          size : Math.floor(random(txt_min_size,txt_max_size))
        });
      }

      function render()
      {
        ctx.fillStyle = "rgba(120,76,13,1)";
        ctx.fillRect(0,0,width,height);

        ctx.fillStyle = "#fff";
        for (var i = 0; i < word_arr.length; i++) {
          ctx.font = word_arr[i].size+"px quicksand_light";
          var w = ctx.measureText(word_arr[i].text);
          ctx.fillText(word_arr[i].text,word_arr[i].x,word_arr[i].y);

          if(keypress)
          {
            word_arr[i].x += range_map(word_arr[i].size,txt_min_size,txt_max_size,2,4) * acclerate;
          }
          else {
            word_arr[i].x += range_map(word_arr[i].size,txt_min_size,txt_max_size,2,3);
          }

          if(word_arr[i].x >= width)
          {
            word_arr[i].x = -w.width*2;
            word_arr[i].y = random(0,height);
            word_arr[i].size =  Math.floor(random(txt_min_size,txt_max_size));

          }
        }

        ctx.fill();

        requestAnimationFrame(render);
      }

      render();

      window.addEventListener('keydown',function(){
        keypress = true;
      },true);
      window.addEventListener('keyup',function(){
        keypress = false;
      },true);
    </script>

</body>
</html>