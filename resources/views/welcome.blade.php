<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<script>
setTimeout(function(){
       window.location.reload(1);
}, 2000);

</script>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                @if(strlen($data->name)>0)
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }} <br />
                </div>
                <h2>Welcome {{$data->name}}</h2>

                <div class=links>
                    <div class="content">[{{$data->uid}}] </div>
                    <div class="content"><img src="{{$data->img_url}}" height=150/></div>
                    @if(strlen($data->item_name)>0)
                        <div class="content">You bought a cloth on <B>{{$data->item_date}}</B>, name: {{$data->item_name}}.</div>
                        <div class="content"><img src="{{$data->item_img}}" height=150/></div>
                        <h2>你穿起來感覺如何?</h2>
                    @else
                        <div class="content">Someone bought a cloth on <B>{{$data->pick_date}}</B>, name: {{$data->pick_name}}.</div>
                        <div class="content"><img src="{{$data->pick_img}}" height=150/></div>
                        <h2>你穿起來一定很好看</h2>
                    @endif
                </div>
                @else
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }}
                </div>

                <div class="links">
                    Welcome to our cloth store!
                    <div class="content">
                    <img src="http://crm.talkwood.info/img/store.jpg" height="200"/>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
