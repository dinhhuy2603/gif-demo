<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	{{-- <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet"> --}}
	<style type="text/css">
		body {
		  /*background-color:#f5f5f5;*/
		}
		.imagePreview {
		    width: 100%;
		    height: 300px;
		    background-position: center center;
		  background:url({{ asset('assets/images/no-image.jpg') }});
		  background-color:#fff;
		    background-size: cover;
		  background-repeat:no-repeat;
		    display: inline-block;
		  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
		}
		.btn-primary
		{
		  display:block;
		  border-radius:0px;
		  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
		  margin-top:-5px;
		}
		.imgUp
		{
		  margin-bottom:15px;
		}
		.del
		{
		  position:absolute;
		  top:0px;
		  right:15px;
		  width:30px;
		  height:30px;
		  text-align:center;
		  line-height:30px;
		  background-color:rgba(255,255,255,0.6);
		  cursor:pointer;
		}
		/*.imgAdd
		{
		  width:30px;
		  height:30px;
		  border-radius:50%;
		  background-color:#4bd7ef;
		  color:#fff;
		  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
		  text-align:center;
		  line-height:30px;
		  margin-top:0px;
		  cursor:pointer;
		  font-size:15px;
		}*/
	</style>
</head>
<body>
<div class="container">
<p>Image to use:</p>
{{-- <img id="hinh1" width="150" height="300" src="{{ asset('assets/images/image1.jpg') }}" alt="The Scream" style="display: none;"> --}}
<img id="hinh2" width="150" height="300" src="{{ asset('assets/images/image2.jpg') }}" alt="The Scream" style="display: none;">
{{-- <input type="file" accept="image/*;capture=camera"> --}}

<div class="row mx-auto p-3">
  <div class="col-sm-3 imgUp">
    <div class="imagePreview"></div>
			<label class="btn btn-primary">
				Upload<input type="file" accept="image/*;capture=camera" id="img_upload_1" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
			</label>
  </div><!-- col-2 -->

  <div class="col-sm-3 imgUp">
    <div class="imagePreview"></div>
			<label class="btn btn-primary">
				Upload<input type="file" accept="image/*;capture=camera" id="img_upload_2" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
			</label>
  </div><!-- col-2 -->
  {{-- <i class="fa fa-plus imgAdd"></i> --}}
</div><!-- row -->

<div class="row mx-auto p-3">
	<div class="col col-sm" style="border:1px solid black;">
      <p>Canvas:</p>
			<canvas id="canvas" width="500" height="300" style="text-align: center;" >
			Your browser does not support the HTML5 canvas tag.
			</canvas>
    </div>
    {{-- <div class="col-12" style="border:1px solid black;">
     <p>GIF:</p>
			<img id="image" width="500" height="350"/>
    </div> --}}
</div>
<div class="row mx-auto p-3">
	{{-- <div class="col-6" style="border:1px solid black;">
    <p>Canvas:</p>
		<canvas id="canvas" width="500" height="300" style="text-align: center;" >
		Your browser does not support the HTML5 canvas tag.
		</canvas>
  </div> --}}
  <div class="col col-sm" style="border:1px solid black;">
   <p>GIF:</p>
		<img id="image" width="500" height="350"/>
  </div>
</div>
{{-- <p>Canvas:</p>
<canvas id="canvas" width="500" height="300" style="text-align: center;" >
Your browser does not support the HTML5 canvas tag.
</canvas>
<p>GIF:</p>
	<img id="image" width="500" height="600" /> --}}

<button id="download">Download</button>
</div>
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
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
  var image1 = document.getElementById("hinh1");
  var image2 = document.getElementById("hinh2");
  var canvas = document.getElementById("canvas");

			// canvas.width = 500;
			// canvas.height = 350;
			// var ctx = canvas.getContext("2d");
			// encoder.setRepeat(0); 
			// encoder.setDelay(500); 
			// encoder.start();
			// ctx.fillStyle = "rgb(255,255,255)";  
			// ctx.fillRect(0,0, canvas.width, canvas.height);
			// encoder.addFrame(ctx);

const myImages = [];

function addImage(imageBlob) {
  myImages.push(imageBlob);
}

			// encoder.finish();
  $(function() {
	  $(document).on("change",".uploadFile", function()
	  {
	  		var uploadFile = $(this);
	      var files = !!this.files ? this.files : [];
	      if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

	      if (/^image/.test( files[0].type)){ // only image file
	        var reader = new FileReader(); // instance of the FileReader
	        reader.readAsDataURL(files[0]); // read the local file
	        // console.log(files);
	        reader.onloadend = function(){ // set image data as background of div
	            //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
	            // console.log(reader)
						uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
						// uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url('http://192.168.1.7:8080/assets/images/image1.jpg')");
						var img = new Image();
						img.src = this.result;
						// img.src = this.result;
						addImage(img);
						console.log(myImages.length);
						// myImages.forEach(function(img) { 
						if (myImages.length == 2) {
			        img.onload = function(){
			        	canvas.width = 500;
								canvas.height = 350;
								var ctx = canvas.getContext("2d");
								encoder.setRepeat(0); 
								encoder.setDelay(500); 
								encoder.start();
								ctx.fillStyle = "rgb(255,255,255)";  
								ctx.fillRect(0,0, canvas.width, canvas.height);
								encoder.addFrame(ctx);
			            // encoder.start();
					        // var image2 = document.getElementById("hinh2");
									// draw(ctx, img, image2)
									draw(ctx, myImages[0], myImages[1])
									encoder.addFrame(ctx);
									encoder.finish();
									var binary_gif = encoder.stream().getData() //notice this is different from the as3gif package!
									var data_url = 'data:image/gif;base64,'+encode64(binary_gif);
									
									document.getElementById('image').src = data_url
									myImages.length = 0
			        }
			      // }); 
			    	}

	        }
	      }
	    
	  });
	});

	function drawRotatedImage(ctx, image, x, y, width, height, rotation) {
		var halfWidth = width/2;
		var halfHeight = height/2;
		// encoder.start();
		ctx.save();


		ctx.translate(x + halfWidth, y + halfHeight);
		ctx.rotate(rotation);
		ctx.drawImage(image, -halfWidth, -halfHeight, width, height);
		ctx.restore();
		encoder.addFrame(ctx);
		// encoder.finish();
	}

	function draw(ctx, image1, image2) {
		
		if (!image1.complete && !image2.complete) {
			setTimout(function(){
				draw(ctx, image1, image2)
			}, 50);
			return;
		}
		drawRotatedImage(ctx, image1, 220, 20, 150, 300, Math.PI / 4)
		drawRotatedImage(ctx, image2, 120, 20, 150, 300, -Math.PI / 4)
		encoder.addFrame(ctx);
	}

	function animate(image1, imgage2, canvas, context, startTime) {
    // update
    var time = (new Date()).getTime() - startTime;
    var amplitude = 150;

    // in ms
    var period = 1000;
    var centerX = canvas.width / 2 - image1.width / 2;
    var nextX = amplitude * Math.sin(time * 2 * (Math.PI) / period) + centerX;

    console.log(time)
    console.log(nextX)
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

	setTimeout(function() {
      var startTime = (new Date()).getTime();
      // animate(image1, image2, canvas, ctx, startTime);
	}, 1000);

	var button = document.getElementById("download");
	document.getElementById("download").addEventListener("click", function() {
  	encoder.download("download.gif");
	});

	$(".imgAdd").click(function(){
	  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
	});

	$(document).on("click", "i.del" , function() {
		$(this).parent().remove();
	});

</script>

</body>
</html>
