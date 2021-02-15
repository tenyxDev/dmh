<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <link rel="canonical" href="https://amp.dev/documentation/guides-and-tutorials/start/create/basic_markup/">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script type="application/ld+json">
          {
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "headline": "Open-source framework for publishing content",
            "datePublished": "2015-10-07T12:02:41Z",
            "image": [
              "logo.jpg"
            ]
          }

    </script>
    <title>DMH</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        .left {
            float: left;
        }

        .right {
            float: right;
        }


        .perspective {
            perspective: 1200px;
            -webkit-perspective: 1200px;
        }

        .tardis-wrap {
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;

            transform: translateZ(-300px);
            -webkit-transform: translateZ(-300px);
        }

        .tardis {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 100px auto;

            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;

            transform-origin: 50% 50%;
            -webkit-transform-origin: 50% 50%;

            transform: rotateX(-20deg) rotateY(-30deg);
            -webkit-transform: rotateX(-20deg) rotateY(-30deg);

            animation-name: spin;
            animation-duration: 5000ms;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes spin {
            from {
                transform: rotateX(-20deg) rotateY(0deg);
            }

            to {
                transform: rotateX(-20deg) rotateY(360deg);
            }
        }


        /*
        #
        # Begin details
        #
        */
        .tardis .side {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 200px;
            height: 360px;
            background-color: #3f577d;

            box-shadow: inset 1px 0 0 #313d49, inset -1px 0 0 #313d49, inset 0 1px 0 #313d49, inset 0 -1px 0 #313d49;

            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            z-index: 1;
        }

        .side:nth-of-type(1) {
            transform: translateZ(100px);
            -webkit-transform: translateZ(100px);
        }

        .side:nth-of-type(2) {
            transform: rotateY(90deg) translateZ(100px);
            -webkit-transform: rotateY(90deg) translateZ(100px);
        }

        .side:nth-of-type(3) {
            transform: rotateY(180deg) translateZ(100px);
            -webkit-transform: rotateY(180deg) translateZ(100px);
        }

        .side:nth-of-type(4) {
            transform: rotateY(-90deg) translateZ(100px);
            -webkit-transform: rotateY(-90deg) translateZ(100px);
        }

        .tardis .roof {
            position: absolute;
            width: 200px;
            height: 200px;
            background-color: #3f577d;

            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;

            transform: rotateX(-90deg) translateZ(-100px);
            -webkit-transform: rotateX(-90deg) translateZ(-100px);
            z-index: 2;
        }


        /* The top roof box */
        .roof-top {
            position: absolute;

            left: 30px;
            width: 140px;
            height: 140px;
            z-index: 2;
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
        }

        .top-lid {
            width: 140px;
            height: 140px;
            background-color: #355683;

            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            transform: rotateX(-90deg) translateZ(-89px);
            -webkit-transform: rotateX(-90deg) translateZ(-89px);
        }

        .roof-panel {
            position: absolute;
            width: 140px;
            height: 20px;
            background-color: #445d84;
            box-shadow: inset 1px 0 0 #313d49, inset -1px 0 0 #313d49, inset 0 1px 0 #313d49, inset 0 -1px 0 #313d49;
            top: -20px;
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
        }

        .roof-panel.a {
            transform: rotateY(0deg) translateZ(70px);
            -webkit-transform: rotateY(0deg) translateZ(70px);
        }

        .roof-panel.b {
            transform: rotateY(90deg) translateZ(70px);
            -webkit-transform: rotateY(90deg) translateZ(70px);
        }

        .roof-panel.c {
            transform: rotateY(180deg) translateZ(70px);
            -webkit-transform: rotateY(180deg) translateZ(70px);
        }

        .roof-panel.d {
            transform: rotateY(-90deg) translateZ(70px);
            -webkit-transform: rotateY(-90deg) translateZ(70px);
        }

        /* Light */
        .light {
            position: absolute;
            width: 40px;
            height: 40px;
            top: -60px;
            left: 85px;
            z-index: 3;
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
        }

        .light-lid {
            width: 30px;
            height: 30px;
            background-color: #eee;


            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            transform: rotateX(-90deg) translateZ(-14px);
            -webkit-transform: rotateX(-90deg) translateZ(-14px);
        }

        .light .light-panel {
            position: absolute;
            width: 30px;
            height: 40px;

            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
        }

        .light .light-panel .bottom {
            width: 30px;
            height: 12px;
            position: absolute;
            bottom: 0px;
            background-color: #355683;
            box-shadow: inset 1px 0 0 #313d49, inset -1px 0 0 #313d49, inset 0 1px 0 #313d49, inset 0 -1px 0 #313d49;
        }

        .light .light-panel .top {
            width: 30px;
            height: 28px;
            position: absolute;
            top: 0px;
            background-color: #eee;
            box-shadow: inset 1px 0 0 #fff, inset -1px 0 0 #fff, inset 0 1px 0 #fff, inset 0 -1px 0 #fff;
        }

        .light-panel.a {
            transform: rotateY(0deg) translateZ(15px);
            -webkit-transform: rotateY(0deg) translateZ(15px);
        }

        .light-panel.b {
            transform: rotateY(90deg) translateZ(15px);
            -webkit-transform: rotateY(90deg) translateZ(15px);
        }

        .light-panel.c {
            transform: rotateY(180deg) translateZ(15px);
            -webkit-transform: rotateY(180deg) translateZ(15px);
        }

        .light-panel.d {
            transform: rotateY(-90deg) translateZ(15px);
            -webkit-transform: rotateY(-90deg) translateZ(15px);
        }


        /* Floor */
        .tardis .floor {
            position: absolute;
            width: 220px;
            height: 220px;
            left: -10px;
            top: 360px;
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
        }

        .floor-lid {
            position: absolute;
            width: 220px;
            height: 220px;
            background-color: #355683;
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            transform: rotateX(90deg) translateZ(109px);;
            -webkit-transform: rotateX(90deg) translateZ(109px);;
        }

        .floor-panel {
            position: absolute;
            width: 220px;
            height: 10px;
            background-color: #3f577d;
            box-shadow: inset 1px 0 0 #313d49, inset -1px 0 0 #313d49, inset 0 1px 0 #313d49, inset 0 -1px 0 #313d49;
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
        }

        .floor-panel.a {
            transform: rotateY(0deg) translateZ(110px);
            -webkit-transform: rotateY(0deg) translateZ(110px);
        }

        .floor-panel.b {
            transform: rotateY(90deg) translateZ(110px);
            -webkit-transform: rotateY(90deg) translateZ(110px);
        }

        .floor-panel.c {
            transform: rotateY(180deg) translateZ(110px);
            -webkit-transform: rotateY(180deg) translateZ(110px);
        }

        .floor-panel.d {
            transform: rotateY(-90deg) translateZ(110px);
            -webkit-transform: rotateY(-90deg) translateZ(110px);
        }


        /*
        #
        # Top sign
        #
        */
        .side .top-sign {
            width: 180px;
            height: 28px;
            background-color: #445d84;
            border: solid 1px #54749f;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, .4);
            border-radius: 2px;
            position: absolute;
            top: 10px;
            left: 10px;

            z-index: 10;
        }

        .top-sign .text {
            background-color: #28394d;
            border: solid 1px #54749f;
            border-radius: 2px;
            width: 100px;
            margin: 3px auto;
            height: 20px;
            color: #fff;
            font-size: 12px;
            line-height: 20px;
            padding: 0px 5px;
            box-shadow: inset 0px 0px 3px rgba(0, 0, 0, .4);
            position: relative;

            text-shadow: 0px 0px 4px rgba(255, 255, 255, .6);
        }

        .text .tiny {
            font-size: 4px;
            line-height: 6px;
            text-align: center;
            width: 20px;
            position: absolute;
            right: 35px;
            top: 4px;
        }

        /*
        #
        # Door frame
        #
        */
        .side .door-frame {
            position: absolute;
            width: 160px;
            left: 20px;
            top: 35px;
            bottom: 0px;

            background-color: #445d84;

            box-shadow: inset 0px 2px 8px rgba(0, 0, 0, .5);

            z-index: 5;
        }


        .door-frame .door {
            position: absolute;
            top: 0px;
            bottom: 0px;
            width: 77px;

            box-shadow: inset 0px 0px 3px rgba(0, 0, 0, .7);
        }

        .door.door-left {
            left: 0px;
        }

        .door.door-right {
            right: 0px;
        }

        /* Insets */
        .door .door-inset {
            position: absolute;
            left: 10px;
            bottom: 10px;

            width: 55px;
            height: 65px;
            box-shadow: inset 0px .5px 5px rgba(0, 0, 0, .5);
        }

        .door-inset:nth-of-type(2) {
            bottom: 85px;
        }

        .door-inset:nth-of-type(3) {
            bottom: 160px;
        }

        /* Sign */
        .door .sign {
            position: absolute;
            left: 15px;
            bottom: 165px;
            width: 45px;
            height: 55px;
            background-color: #d5e4f6;
            box-shadow: inset 1px 0 0 #313d49, inset -1px 0 0 #313d49, inset 0 1px 0 #313d49, inset 0 -1px 0 #313d49;
        }

        /* Window */
        .door .window {
            position: absolute;
            left: 10px;
            bottom: 235px;

            width: 55px;
            height: 65px;
            background-color: #28475d;
        }

        .window .pane {
            width: 14px;
            height: 28px;
            background-color: #dfe7fc;
            float: left;
            margin: 2px;
            box-shadow: inset 0px 0px 10px #fff;
        }

        .pane.a {
            margin-left: 3px;
            margin-right: 1px;
        }

        .pane.d {
            margin-left: 3px;
            margin-right: 1px;
        }
    </style>

</head>
<body>
<div class="ticketWrapper">
    @include('snippets/nav/nav')
</div>

<div class="perspective">
    <div class="tardis-wrap">
        <div class="tardis">
            <!-- start of side -->
            <div class="side">
                <div class="top-sign">
                    <div class="text">
                        <span class="left">POLICE</span>
                        <span class="tiny">PUBLIC CALL</span>
                        <span class="right">BOX</span>
                    </div>
                </div>
                <div class="door-frame">
                    <div class="door door-left">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="sign"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                    <div class="door door-right">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="door-inset c"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of side -->

            <!-- start of side -->
            <div class="side">
                <div class="top-sign">
                    <div class="text">
                        <span class="left">POLICE</span>
                        <span class="tiny">PUBLIC CALL</span>
                        <span class="right">BOX</span>
                    </div>
                </div>
                <div class="door-frame">
                    <div class="door door-left">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="door-inset c"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                    <div class="door door-right">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="door-inset c"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of side -->

            <!-- start of side -->
            <div class="side">
                <div class="top-sign">
                    <div class="text">
                        <span class="left">POLICE</span>
                        <span class="tiny">PUBLIC CALL</span>
                        <span class="right">BOX</span>
                    </div>
                </div>
                <div class="door-frame">
                    <div class="door door-left">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="door-inset c"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                    <div class="door door-right">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="door-inset c"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of side -->

            <!-- start of side -->
            <div class="side">
                <div class="top-sign">
                    <div class="text">
                        <span class="left">POLICE</span>
                        <span class="tiny">PUBLIC CALL</span>
                        <span class="right">BOX</span>
                    </div>
                </div>
                <div class="door-frame">
                    <div class="door door-left">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="door-inset c"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                    <div class="door door-right">
                        <div class="door-inset"></div>
                        <div class="door-inset b"></div>
                        <div class="door-inset c"></div>
                        <div class="window">
                            <div class="pane a"></div>
                            <div class="pane b"></div>
                            <div class="pane c"></div>
                            <div class="pane d"></div>
                            <div class="pane e"></div>
                            <div class="pane f"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of side -->

            <div class="roof"></div>


            <div class="roof-top">
                <div class="roof-panel a"></div>
                <div class="roof-panel b"></div>
                <div class="roof-panel c"></div>
                <div class="roof-panel d"></div>
                <div class="top-lid"></div>
            </div>


            <div class="light">
                <div class="light-panel a">
                    <div class="bottom"></div>
                    <div class="top"></div>
                </div>
                <div class="light-panel b">
                    <div class="bottom"></div>
                    <div class="top"></div>
                </div>
                <div class="light-panel c">
                    <div class="bottom"></div>
                    <div class="top"></div>
                </div>
                <div class="light-panel d">
                    <div class="bottom"></div>
                    <div class="top"></div>
                </div>
                <div class="light-lid"></div>
            </div>


            <!-- start of floor -->
            <div class="floor">
                <div class="floor-panel a"></div>
                <div class="floor-panel b"></div>
                <div class="floor-panel c"></div>
                <div class="floor-panel d"></div>
                <div class="floor-lid"></div>
            </div>
            <!-- end of floor -->


        </div>
    </div>
</div>
</body>
</html>
