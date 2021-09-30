<!DOCTYPE html>
<html>
<body>

<p>Image to use:</p>
<img id="hinh1" width="150" height="300" src="{{ asset('assets/images/image1.jpg') }}" alt="The Scream">
<img id="hinh2" width="150" height="300" src="{{ asset('assets/images/image2.jpg') }}" alt="The Scream">

<p>Canvas:</p>
<canvas id="canvas" width="500" height="600" style="border:1px solid #d3d3d3; text-align: center;" >
Your browser does not support the HTML5 canvas tag.
</canvas>

<img id="image" width="500" height="600">

<button id="download">Download</button>
<script type="text/javascript" src="{{ asset('/js/LZWEncoder.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/NeuQuant.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/GIFEncoder.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/b64.js') }}"></script>
<script>
	window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
      })();
	var encoder = new GIFEncoder();
	window.onload = function() {
		var canvas = document.getElementById("canvas");
		canvas.width = 500;
		canvas.height = 600;

		var ctx = canvas.getContext("2d");
		encoder.setRepeat(0); 
  		encoder.setDelay(200); 
  		encoder.start();
  		ctx.fillStyle = "rgb(255,255,255)";  
		// ctx.fillRect(0,0, canvas.width, canvas.height);
		encoder.addFrame(ctx);
		// encoder.finish();
		function drawRotatedImage(ctx, image, x, y, width, height, rotation) {
			var halfWidth = width/2;
			var halfHeight = height/2;
			
			ctx.save();


			ctx.translate(x + halfWidth, y + halfHeight);
			ctx.rotate(rotation);
			ctx.drawImage(image, -halfWidth, -halfHeight, width, height);

			// ctx.drawImage(image2, -halfWidth, -halfHeight, width, height);
			ctx.restore();
			encoder.addFrame(ctx);
		}

		function draw(ctx, image1, image2) {
			if (!image1.complete && !image2.complete) {
				setTimout(function(){
					draw(ctx, image1, image2)
				}, 50);
				return;
			}
			// ctx.drawImage(image, 20, 20, 150, 300);

			drawRotatedImage(ctx, image1, 320, 20, 150, 300, Math.PI / 4)
			drawRotatedImage(ctx, image2, 220, 20, 150, 300, -Math.PI / 4)
			// encoder.addFrame(ctx);
		}

		function animate(image1, imgage2, canvas, context, startTime) {
	        // update
	        var time = (new Date()).getTime() - startTime;
	        var amplitude = 150;

	        // in ms
	        var period = 2000;
	        var centerX = canvas.width / 2 - image1.width / 2;
	        var nextX = amplitude * Math.sin(time * 2 * (Math.PI) / period) + centerX;
	        // image1.x = nextX;
	        // image2.x = nextX;

	        // clear
	        encoder.start();
	        ctx.clearRect(0, 0, canvas.width, canvas.height);
	        // draw
	        drawRotatedImage(ctx, image1, nextX, 20, 150, 300, Math.PI / 4)
  			
			drawRotatedImage(ctx, image2, nextX -100, 20, 150, 300, -Math.PI / 4)
			
	        // request new frame
	        requestAnimFrame(function() {
	          	animate(image1, image2, canvas, ctx, startTime);
	        });
	        encoder.finish();
      	}

	  	var image1 = document.getElementById("hinh1");
	  	var image2 = document.getElementById("hinh2");
	  	draw(ctx, image1, image2)
		

	  	setTimeout(function() {
	        var startTime = (new Date()).getTime();
	        animate(image1, image2, canvas, ctx, startTime);
	  	}, 1000);
		// encoder.addFrame(ctx);
	  	encoder.finish();
	  	// encoder.setRepeat(0); 
		// encoder.setDelay(1000);
  		
		// canvas.width = 500;
		// canvas.height = 600;
 	// 	ctx.fillStyle = "rgb(255,255,255)";  

		// ctx.fillRect(0,0, canvas.width, canvas.height);

  		
		var binary_gif = encoder.stream().getData() //notice this is different from the as3gif package!
		var data_url = 'data:image/gif;base64,'+encode64(binary_gif);
		
		document.getElementById('image').src = data_url
		// Download
		
  		encoder.download("download.gif");

  		var button = document.getElementById("download");
  		document.getElementById("download").addEventListener("click", function() {
		  encoder.download("download.gif");
		});

		
	}

	// function download(encoder){
	//   encoder.download("download.gif");
	// }


</script>

</body>
</html>
