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
            html, body {
                background-color: #222;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

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
        @include('snippets/nav/nav')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    @if (Auth::check())
                        <a href="{{ route('tickets.index') }}">Welcome to DMH project</a>
                    @endif
                </div>

                <div class="links">
                    @if (Auth::check())
                        <a href="{{ route('tickets.index') }}">Tickets</a>
                    @endif
                    @if (Auth::check())
                        <a href="{{ route('ticket.info') }}">Info</a>
                    @endif
                    <a href="https://github.com/tenyxDev/dmh">GitHub</a>
                </div>
            </div>
        </div>

        <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/26bc02400f.js" crossorigin="anonymous"></script>
    </body>
</html>
