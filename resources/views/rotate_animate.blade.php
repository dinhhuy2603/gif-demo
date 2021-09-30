<!DOCTYPE HTML>
<html>
  <head>
    <style>
      body {
        margin: 0px;
        padding: 0px;
      }
    </style>
  </head>
  <body>
    <canvas id="testCanvas" width="600" height="600">
      Canvas not supported
    </canvas>
    <script type="text/javascript" src="{{ asset('/js/LZWEncoder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/NeuQuant.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/GIFEncoder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/b64.js') }}"></script>
    <script>
      var num = 5,
        rotation = 0,
        balls = [];

      function Ball() {
        this.r = 20;
        this.x = Math.random() * 200;
        this.y = Math.random() * 150;

      }

      (function init() {

        canvas = document.getElementById("testCanvas");
        context = canvas.getContext("2d");

        context.clearRect(0, 0, context.width, context.height);
        context.fillStyle = "lightblue";

        for (i = 0; i < num; i++) {
          balls[i] = new Ball()
        }
        requestAnimationFrame(draw);

      })();

      function draw() {

        // reset transforms before clearing
        context.setTransform(1, 0, 0, 1, 0, 0);
        context.clearRect(0, 0, canvas.width, canvas.height);

        // tramslate and rotate an absolute rotation value
        context.translate(300, 300);
        context.rotate(rotation);

        // draw arcs
        for (i = 0; i < num; i++) {
          var Ball = balls[i];
          context.beginPath();
          context.arc(Ball.x, Ball.y, Ball.r, 0, 2 * Math.PI, false);
          //context.stroke();
          context.fill();
        }
        context.beginPath();
        context.arc(0, 0, 240, 0, Math.PI * 2, false);
        context.lineWidth = 8;
        context.stroke();

        // update rotation value and request new frame
        rotation += 0.04;
        requestAnimationFrame(draw)
      }

      var encoder = new GIFEncoder();
        encoder.setRepeat(0); //0  -> loop forever
                          //1+ -> loop n times then stop
        encoder.setDelay(500); //go to next frame every n milliseconds
        encoder.start();
        encoder.addFrame(context);
        encoder.finish();
      var binary_gif = encoder.stream().getData() //notice this is different from the as3gif package!
      var data_url = 'data:image/gif;base64,'+encode64(binary_gif);
    
    // Download
    encoder.finish();
     encoder.download("download.gif");
    </script>
  
</body>
</html>      