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
            * {
                box-sizing: border-box;
            }
            .sally {
              position: absolute;
              margin: auto;
              left: 0;
              right: 0;
              top: 0;
              width: 350px;
              height: 350px;
            }
            .sally .head {
              position: absolute;
              border-radius: 50%;
              background: #FFD93B;
              border: 5px solid black;
              width: 350px;
              height: 350px;
              left: 0%;
              top: 10%;
              z-index: 2;
            }
            .sally .head:before {
              content: "";
              position: absolute;
              width: 100%;
              height: 100%;
              background: inherit;
              border-radius: inherit;
              z-index: 2;
            }
            .sally .eyes {
              position: absolute;
              width: 100%;
              top: 27%;
              z-index: 3;
            }
            .sally .eye {
              position: absolute;
              border-radius: 50%;
              width: 60px;
              height: 60px;
              background: black;
            }
            .sally .eye.left {
              left: 53%;
            }
            .sally .eye.right {
              right: 53%;
            }
            .sally .mouths {
              position: absolute;
              width: 50px;
              height: 100px;
              background: #FF6600;
              border-radius: 0% 100% 100% 0 / 50%;
              border: 6px solid #CF4804;
              border-left: 0;
              top: 50%;
              left: 57%;
              z-index: 3;
            }
            .sally .mouth {
              position: absolute;
              width: 100px;
              height: 53px;
              border-radius: 50px 0px 0px 50px;
              border: 6px solid #CF4804;
              background: inherit;
              right: 100%;
              border-right: 0px;
            }
            .sally .mouth.up {
              top: -6px;
              transform-origin: 100% 100%;
            }
            .sally .mouth.down {
              bottom: -6px;
              transform-origin: 100% 0%;
            }

            .sally .body {
              position: absolute;
              width: 350px;
              height: 320px;
              border-radius: 50%;
              background: #FFD93B;
              border: 5px solid black;
              top: 70%;
              left: 10%;
            }
            .sally .wing {
              position: absolute;
              width: 200px;
              height: 120px;
              border-radius: 50% / 30% 30% 70% 70%;
              background: inherit;
              border: inherit;
            }
            .sally .wing.inner {
              left: 70%;
              top: 20%;
              transform-origin: 0% 0%;
              transform: rotate(30deg);
              border-left: 5px solid transparent;
            }
            .sally .wing.outer {
              right: 55%;
              top: 360px;
              transform-origin: 100% 0%;
              transform: rotate(30deg);
            }

            .sally .legs {
              position: absolute;
              top: 570px;
              width: 100%;
            }
            .sally .leg {
              background: #FF6600;
              border: 5px solid #CF4804;
              width: 45px;
              height: 60px;
              position: absolute;
            }
            .sally .leg:before {
              content: "";
              position: absolute;
              width: 100%;
              height: 100%;
              background: inherit;
              z-index: 1;
            }
            .sally .leg.left {
                right: 40%;
            }
            .sally .leg.right {
              left: 65%;
            }
            .sally .leg .foot {
              position: absolute;
              width: 70px;
              height: 50px;
              top: 80%;
              right: -15px;
              border: inherit;
              background: inherit;
              border-radius: 50%;
              transform: rotate(-20deg);
            }
        </style>
    </head>
    <body>
        <div class="sally">
          <div class="head">
            <div class="eyes">
              <div class="eye left"></div>
              <div class="eye right"></div>
            </div>
            <div class="mouths">
              <div class="mouth up"></div>
              <div class="mouth down"></div>
            </div>
            <div class="wing outer"></div>
            <div class="body">
              <div class="wing inner"></div>
            </div>
          </div>
          <div class="legs">
            <div class="leg left"><div class="foot"></div></div>
            <div class="leg right"><div class="foot"></div></div>
          </div>
        </div>

        <img src="https://cdn.glitch.com/0e4d1ff3-5897-47c5-9711-d026c01539b8%2Fbddfd6e4434f42662b009295c9bab86e.gif?v=1573157191712" alt="this slowpoke moves"  width="250" alt="404 image"/>

    </body>
</html>

<script src="https://www.marvinj.org/releases/marvinj-0.8.js"></script>
<script src="//daybrush.com/scenejs/release/latest/dist/scene.min.js"></script>
<script type="text/javascript">
    var scene = new Scene({
      ".mouth.up": {
        "from": {
          transform: "rotate(0deg)",  
        },
        "to": {
          transform: "rotate(10deg)"
        } 
      },
      ".mouth.down": {
        "from": {
          transform: "rotate(0deg)",  
        },
        "to": {
          transform: "rotate(-10deg)"
        },
      },
      ".wing.outer": {
        "from": {
          transform: "rotate(20deg)",
        },
        "to": {
          transform: "rotate(35deg)",
        }
      }  
    }, {
      duration: 0.3,
      direction: "alternate",
      iterationCount: "infinite",
      easing: Scene.EASE_IN_OUT,
      selector: true,
    }).playCSS();
</script>