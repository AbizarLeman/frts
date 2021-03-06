<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Farm Record Tracking System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #e8f7ff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            html #background {
                min-height: 100%;
                background-image: url(/images/background.png);
                background-size: cover;
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
                color: #ffffff;
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
            html #backgroundimage {
                min-height: 100%;
                background-image: url(/img/background.png);
                background-size: cover;
            }
            .project-label {
                background: rgba(187, 178, 178, 0.761);
                padding-left: 10px;
                padding-right: 10px;
            }
            .welcome-navbar {
                background: rgba(187, 178, 178, 0.761);
            }
        </style>
    </head>
    <body>
        <div id="backgroundimage" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="welcome-navbar top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content project-label">
                <div class="title m-b-md">Farm Record Tracking System</div>
            </div>
        </div>
    </body>
</html>
