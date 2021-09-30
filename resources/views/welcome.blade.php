<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            /*#canvas{
                background-color:#fff;
                width:100%;
                height:100%;
                display:block;
                overflow: hidden;
                transform: translate3d(0,0,0);
                text-align: center;
                opacity: 1;
            }*/

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img id="img1" src="{{ asset('assets/images/image1.jpg') }}" style="display: none;">
                <img id="img2" src="{{ asset('assets/images/image2.jpg') }}" style="display: none;">
                {{-- <canvas id="canvas"></canvas> --}}
                <canvas id="canvas" width="450" height="297"></canvas>
            </div>
        </div>
    </body>
</html>

<script src="https://www.marvinj.org/releases/marvinj-0.8.js"></script>
{{-- <script type="text/javascript">
    window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       || 
            window.webkitRequestAnimationFrame || 
            window.mozRequestAnimationFrame    || 
            window.oRequestAnimationFrame      || 
            window.msRequestAnimationFrame     || 
            function(/* function */ callback, /* DOMElement */ element){
              window.setTimeout(callback, 1000 / 60);
            };
})();

var app = {
    context: document.getElementById('canvas').getContext('2d'),
  width: 300,
  height: 300,
  imageUrl: 'https://lh3.googleusercontent.com/LFkld29brpcYI1KSRgH_tGSNnlV7__uZ3l6agGRvr42XFqLtKLrJUocjcw6n-YBmcQ=w170',
  image1: undefined, 
  image2: undefined, 
  renderSize: {width:50, height:50},
  loadImage() {
    return new Promise((resolve, reject) => {
        app.image1 = new Image();
        app.image2 = new Image();
          app.image1.onload = function() {
            resolve();
          }
          app.image2.onload = function() {
            resolve();
          }
          app.image1.src = app.imageUrl;
          app.image2.src = app.imageUrl;
    });
  },
  clearCenter() {
    this.context.clearRect(this.width/2-this.renderSize.width/2, this.height/2-this.renderSize.height/2, this.renderSize.width, this.renderSize.height);
  },
  degreeToRadians(degree) {
    return degree * Math.PI / 180;
  },
  draw(x, y, degree) {
    let radians = this.degreeToRadians(degree);
    this.context.translate(x,y);
    this.context.rotate(radians);
    this.context.translate(-x,-y);
    this.context.drawImage(this.image1, 
                            0,0,
                            170, 170, (x - this.renderSize.width/2), (y - this.renderSize.height/2), this.renderSize.width, this.renderSize.height);    
        this.context.translate(x, y);
    this.context.drawImage(this.image2, 
                            0,0,
                            170, 170, (x - this.renderSize.width/2), (y - this.renderSize.height/2), this.renderSize.width, this.renderSize.height); 
    this.context.rotate(-radians);
    this.context.translate(-x,-y);
  },
  currentDegree: 0,
  centralRotation(){
    app.clearCenter();
    app.draw(150,150, app.currentDegree);
    this.currentDegree+=0.1;
    requestAnimationFrame(app.centralRotation);
  }
}


app.loadImage().then(() => {
    app.draw(25,25, 0);
  app.draw(app.width-25,25, 90);
  app.draw(app.width-25,app.height-25, 180);
  app.draw(25,app.height-25, 275);
  
  app.centralRotation();
});
</script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.4.3/lottie.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/data.json') }}"></script> --}}
<script type="text/javascript">
    window.onload = function() {
        var canvas = document.getElementById("canvas");
        // var canvas = document.getElementById('canvas')
        var image = new Image();
        image.src = 'http://localhost:8000/assets/images/image1.jpg';
        canvas.width = canvas.scrollWidth;
        canvas.height = canvas.scrollHeight;

        // Get a reference to the 2d drawing context/ api
        var ctx = canvas.getContext('2d')
        
        ctx.drawImage(image, 0, 0, 100, 160);
    }
    // image1 = new MarvinImage();
    // image1.load("http://localhost:8000/assets/images/image1.jpg", imageLoaded);
    // console.log(image1)
    // image2 = new MarvinImage();
    // image2.load("http://localhost:8000/assets/images/image2.jpg", imageLoaded);
    // image3 = new MarvinImage();
    // image3.load("https://i.imgur.com/UoISVdT.png", imageLoaded);

    // var loaded=0;

    // function imageLoaded(){
    //     if(++loaded == 2){
    //         var image = new MarvinImage(image1.getWidth(), image1.getHeight());
    //         Marvin.combineByAlpha(image1, image2, image, 0, 0);
    //         Marvin.combineByAlpha(image, image3, image, 190, 120);
    //         image.draw(canvas);
    //     }
    // }   


    // var img1 = document.getElementById('img1')
    // img1.style.transform = "rotate(45deg)";
    // var imge1_new = img1.style.transform = "rotate(45deg)";
    // var img1 = new Image();
    // img1.src = 'http://localhost:8000/assets/images/image2.jpg';
    // document.body.append(img1);
    // img1.style.transform = "rotate(45deg)";

    // // console.log(imge1_new)
    // var img2 = document.getElementById('img2')
    // var canvas = document.getElementById('canvas');
    // var context = canvas.getContext('2d');

    // canvas.width = img1.width*3;
    // canvas.height = img1.height;

    // context.globalAlpha = 1.0;
    // context.drawImage(img1, 0, 0);
    // context.globalAlpha = 0.5; //Remove if pngs have alpha
    // context.drawImage(img2, 100, 200);


    // var canvas = document.getElementById("canvas");
    //     var ctx = canvas.getContext("2d");
    //     //First canvas data
    //     var img1 = loadImage('http://localhost:8000/assets/images/image1.jpg', main);
    //     //Second canvas data
    //     var img2 = loadImage('http://localhost:8000/assets/images/image2.jpg', main);

    //     var imagesLoaded = 0;

    //     function main() {
    //         imagesLoaded += 1;

    //         if (imagesLoaded == 2) {
    //             // composite now
    //             ctx.drawImage(img1, 0, 10, 150, 300);
    //             // 
    //             ctx.globalAlpha = 0.5;
    //             ctx.drawImage(img2, 200, 10, 150, 300);
    //             ctx.rotate(Math.PI)
    //         }
    //     }

    //     function loadImage(src, onload) {
    //         console.log('loadImage', src);
    //         var img = new Image();

    //         img.onload = onload;
    //         img.src = src;

    //         return img;
    //     }
</script>
{{-- <script type="text/javascript">
    var params = {
        container: document.getElementById('canvas'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        animationData: animationData
    };

    var anim;

    anim = lottie.loadAnimation(params);

</script> --}}

{{-- <script type="text/javascript">
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var img1 = new Image();
    var img2 = new Image();

    img1.onload = function() {
        canvas.width = img1.width;
        canvas.height = img1.height;
        img2.src = 'http://localhost:8000/assets/images/image2.jpg';
        // document.body.append(img2);
        img2.style.transform = "rotate(45deg)";
    };
    img2.onload = function() {
        context.globalAlpha = 1.0;
        img1.style.transform = "rotate(45deg)";
        context.drawImage(img1, 0, 0);
        context.globalAlpha = 0.5; //Remove if pngs have alpha
        img2.style.transform = "rotate(45deg)";
        context.drawImage(img2, 0, 0);
    };        

    img1.src = 'http://localhost:8000/assets/images/image1.jpg';
    document.body.append(img1);
    
</script> --}}


{{-- <script type="text/javascript">
var img1 = document.getElementById('img1');
var img2 = document.getElementById('img2');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

var imge1_new = document.querySelector("#img1").style.transform = "rotate(45deg)";
var imge2_new = document.querySelector("#img2").style.transform = "rotate(135deg)";

canvas.width = img1.width*2;
canvas.height = img1.height;
console.log(img1.width, img1.height)

context.globalAlpha = 1.0;
context.drawImage(img1, 200, 2000);
context.globalAlpha = 1.0; //Remove if pngs have alpha
context.drawImage(img1, 2000, 0);
</script> --}}
