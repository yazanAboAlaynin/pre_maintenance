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
                background-image: url({{asset('images/car2.jpg')}});
                height: 500px;
                width: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
        <div class="flex-center  full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color: white;font-weight: bold;font-size: 20px;background-color: #1b1e21"  href="{{ url('/home') }}">Home</a>
                    @else
                        <a style="color: white;font-weight: bold;font-size: 20px;background-color: #1b1e21"  href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a style="color: white;font-weight: bold;font-size: 20px;background-color: #1b1e21"   href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content pt-5" style="margin-top: 150px">
                <div class="title" style="color: #ee0a0a; font-weight: bold">
                    Pre Maintenance
                </div>


            </div>
        </div>
    </body>
</html>
