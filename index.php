<!-- Cam Kave Copyright Alex "Styromaniac" Goven 2018-2023; Licensed MIT https://www.mit.edu/~amini/LICENSE.md -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cam Kave</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Cam Kave">
    <meta name="apple-mobile-web-app-title" content="Cam Kave">
    <meta name="theme-color" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="1536x1536" href="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="1536x1536" href="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/favicon.png">
    <link rel="manifest" type="application/manifest+json" href="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/manifest.json">
    <base href="./" target="_top">
    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
        const el = document.createElement('pwa-update');
        document.body.appendChild(el);
    </script>

    <style>
        ::-webkit-scrollbar {
            width: 0px
        }

        ::-webkit-scrollbar-track {
            background: 0 0
        }

        ::-webkit-scrollbar-thumb {
            background: radial-gradient(transparent,#248) center no-repeat;
            border-radius: 4px
        }

        #bar,#bat {
            height: 45px
        }

        #bat {
            bottom: 0
        }

        #bar,#list {
            text-align: center
        }

        #bar,html {
            overflow: hidden
        }

        #bar {
            background: linear-gradient(to bottom,#36c,#060c18,#0c1830);
            border-radius: 23px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 2
        }

        #bat {
            content: url("https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/BlueBat.svg");
            display: inline-block
        }

        #bar,#bat,.shadow,#content,.copyright img {
            filter: drop-shadow(0 0 7px #000)
        }

        #list,.overlay {
            height: calc(100% - 45px)
        }

        #list {
            margin: 12px 0
        }

        #media img,#media video {
            top: 45px;
            border: 1px solid #000;
            box-shadow: 0 0 7px 7px #000;
            outline: #124 solid 4px;
            position: 50% 50%;
            width: 166px!important;
            z-index: 1;
            margin: 7px
        }

        #media img,#media video,#menu {
            height: auto
        }

        #media img:hover,#media video:hover {
            outline: #444 solid 4px
        }

        #menu img {
            width: 150px!important;
            padding: 28px 14px
        }

        #UserIcon {
            height: 100px;
            border-radius: 50px;
            outline: 3px solid #124
        }

        #MIT {
           font-size: 0;
           height: 0px;
           transition: font-size 0.5s ease-in-out, height 0.5s ease-in-out;
         }
  
         #MIT.visible {
           font-size: 16px;
           height: auto;
         }

        .overlay {
            will-change: scroll-position
        }

        .copyright, .text {
            line-height: 2;
            text-shadow: 0 0 14px #000;
            color: #48f;
            cursor: default;
            font-size: 16px;
            text-decoration: none
        }

        .copyright img {
            height: 32px
        }

        * {
        	user-select: none;
            height: 100%;
            -webkit-tap-highlight-color: transparent
        }

        a {
            color: #48f;
            cursor: default;
            font-size: 20px;
            text-decoration: none
        }

        body {
            background: radial-gradient(#124,#000) center no-repeat,#000;
            overscroll-behavior:none;
            margin: 0
        }

        #bat,.overlay,body {
            overflow: auto
        }

        #media img,#media video,body {
            background-size: 100%
        }

        html {
            backface-visibility: hidden;
            transform: translate3D(0,0,0);
            width: 100%
        }

        video::-webkit-media-controls-panel {
            background-image: linear-gradient(transparent,transparent)!important
        }

        #content {
            backdrop-filter: blur(7px)brightness(50%);
        }

        #lightbox {
            display: none;
            width: 100%;
            height: calc(100% - 45px);
            top: 0;
            left: 0;
            position: fixed;
            text-align: center;
            z-index: 99999
        }

        #lightbox img,#lightbox video {
            width: auto!important;
            height: auto!important;
            max-width: 100%!important;
            max-height: 100%!important;
            outline: 0!important;
            border: 0!important;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto
        }
    </style>
</head>
<body oncontextmenu="return false;">
    <div class="overlay">
        <div id="list">
            <span id="media">
<?php

                // Define where we want to look for files.
                $searchPath = 'Camera/';

                // Get a list of everything in our search path
                $files = scandir($searchPath);

                // For each item in that list
                foreach ($files as $file) {

                    // Check if it is an image file
                    if (strpos($file, '.jpg') !== false) {

                        // Add the img tag
                        echo '                <img data-media="image" type="image/jpg" src="'.$searchPath.$file.'">
';

                    }

                    // Check if it is an mp4 file
                    if (strpos($file, '.mp4') !== false) {

                        // Add the video tag
                        echo '                <video data-media="video" type="video/mp4" src="'.$searchPath.$file.'"></video>
';

                    }

                }
                ?>
                	</span>
                	<br>
                	<span class="text">
                	<?php echo "Last synced: " . date ("F d Y H:i:s", getlastmod()); ?>  UTC.
                    </span>
                	<br>
                	<span class="copyright">
                	<?php echo "Kave &copy 2018-".date ("Y", getlastmod()); ?> Alex "Styromaniac" Goven
                    <br>
                    <img src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/MIT.svg">
                    <br>
<div id="MIT" class="transition hide">
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
<br>
<br>
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
<br>
<br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
</div>
                	</span>
                <div id="lightbox">
                    <div id="bar">
                        <a oncontextmenu="toggleFullScreen()" onclick="window.closeLightbox()">
                            <span id="bat">
                        </a>
                    </div>
                    <div id="content"></div>
                </div>
            </span>
        </div>
    </div>
    <div id="bar">
        <a onClick="window.location.href=window.location.href" oncontextmenu="toggleFullScreen()">
            <span id="bat">
        </a>
    </div>
    <script>
        const lightboxElem = document.getElementById("lightbox");
        const contentElem = document.getElementById("content");

        function openLightbox(src, type) {
            lightboxElem.style.display = 'block';

            let element;
            if (type === 'image') {
                element = document.createElement("img");
            } else if (type === 'video') {
                element = document.createElement("video");
            }

            element.src = src;
            element.controls = true;
            element.autoplay = true;

            contentElem.appendChild(element);
        }

        const elements = document.querySelectorAll("[data-media]");
        for (let i = 0; i < elements.length; i++) {
            elements[i].onclick = function(e) {
                let src = e.target.src;
                let type = e.target.dataset.media;
                openLightbox(src, type);
            };
        }

        function closeLightbox() {
            //Clear content element and hide the lightbox
            contentElem.innerHTML = '';
            lightboxElem.style.display = 'none';
        }

        function toggleFullScreen() {
            if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullScreen) {
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        }
    </script>
<script>
  var copyright = document.querySelector(".copyright");
  var mit = document.querySelector("#MIT");

  copyright.addEventListener("click", function() {
    mit.classList.toggle("visible");
  });
</script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/styromaniac/Cam-Kave@main/sw.js">
    </script>
</body>
</html>
