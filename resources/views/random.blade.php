<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
      <meta http-equiv="Cache-Control" content="max-age=259200, must-revalidate" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>SIT - Fest </title>
      <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="stylesheets/normalize-min.css">
      <link rel="stylesheet" href="stylesheets/pace.css">
      <link rel="stylesheet" href="stylesheets/main.css">
   </head>
   <style>
   body{
     overflow: hidden;
   }

   </style>
   <body>
      <div class="page-wrapper page">
         <img src="img/asteroids-left.png" alt="pic" class="a-left"> <img src="img/asteroids-right.png" alt="pic" class="a-right"> <img src="img/asteroids-left.png" alt="pic" class="b-left"> <img src="img/asteroids-right.png" alt="pic" class="b-right">
         <div class="container">
            <canvas id="canvasOne" class="dusty" width="1280" height="1420"></canvas>
            <canvas id="canvasAustro" class="austro" width="600" height="640"></canvas>
            <div class="center">





              <div class="centered"  style="display:none;width:60%;background-color:white; font-size : 3em; color:black; position:relative;z-index:101;">
                <br>{!! $uid===""?"":$uid !!} <br>
                {!! $name===""?"":$name !!}
                {!! $surname===""?"":$surname !!} <br>
                {!! $department===""?"":$department !!}<br><br>
              </div>





              <div id="output" class="logo-main centered" style="background-color:rgab(0,0,0,0.2); font-size : 5em; color:rgba(255,255,255,0.8); position:relative;z-index:100; margin-top:25%"></div>


               <div class="tiny-stars" style="margin-top:-45%">
                 <img src="img/stars2.svg" alt="">
               </div>
               <div class="tiny-stars middle-stars" style="margin-top:-45%">
                 <img src="img/stars3.svg" alt="">
               </div>
               <div class="planet-big centered" style="margin-top:-45%">
                  <span class="round round-1"></span>
                  <span class="round round-2"></span>
                  <span class="round round-3"></span>
                  <span class="round round-1"></span>
                  <span class="round round-2"></span>
                  <span class="round round-3"></span>
                  <span class="round round-1"></span>
                  <span class="round round-2"></span>
                  <span class="round round-3"></span>
                  <span class="round round-4"></span>
                  <span class="round round-5"></span>
               </div>
               <img src="img/planet-1.png" alt="" class="abs planet-1"> <img src="img/moon.png" alt="" class="abs moon"> <!-- END OF THE 1st SCREEN --> <!-- THE 2nd SCREEN -->
            </div>
         </div>
         </div>
         <canvas id="bg-stars" class="bg-stars"> </canvas>
         <canvas id="world" class="planet-3-orbit" width="800" height="600"></canvas>
         <canvas id="world-2" class="planet-3-orbit" width="800" height="600"></canvas>
         <canvas id="world-3" class="planet-3-orbit" width="800" height="600"></canvas>
         <canvas id="stars-cursor"></canvas>
      </body>

      <script src="js/vendor/jquery-2.1.1.min.js"></script>

      <script type="text/javascript">
        document.getElementById("uid").focus();
      </script>

      <script type="text/javascript">
        $(document).ready(function(){
          var theLetters = "1234567890"; //You can customize what letters it will cycle through
          var ctnt = "{!! $uid===""?"":$uid !!}"; // Your text goes here
          var speed = 60; // ms per frame
          var increment = 23; // frames per step. Must be >2


          var clen = ctnt.length;
          var si = 0;
          var stri = 0;
          var block = "";
          var fixed = "";
          //Call self x times, whole function wrapped in setTimeout
          (function rustle (i) {
          setTimeout(function () {
          if (--i){rustle(i);}
          nextFrame(i);
          si = si + 1;
          }, speed);
          })(clen*increment+1);
          function nextFrame(pos){
          for (var i=0; i<clen-stri; i++) {
            //Random number
            var num = Math.floor(theLetters.length * Math.random());
            //Get random letter
            var letter = theLetters.charAt(num);
            block = block + letter + ' ';
          }
          if (si == (increment-1)){
            stri++;
          }
          if (si == increment){
          // Add a letter;
          // every speed*10 ms
          fixed = fixed +  ctnt.charAt(stri - 1) + ' ';
          si = 0;
          }
          $("#output").html(fixed + block);
          block = "";
          }
          });

          setTimeout(function () {
            $("#output").html('{!! $uid===""?"":$uid !!}'+'<br><br><span style="font-size: 60px">'+'{!! $name===""?"":$name !!}'+' '+'{!! $surname===""?"":$surname !!}'+'</span><br><br>'+
            '{!! $department===""?"":$department !!}');
            $("#output").css({"margin-top":"17%", "font-size": "5em"});
          }, 17000);
      </script>
</html>
