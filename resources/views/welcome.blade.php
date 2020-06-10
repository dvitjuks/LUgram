<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            background-color: #fff;
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

        .links>a {
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
    <div class="flex-center position-ref full-height" id="top">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="/profile/{{Auth::user()->username}}">Profile</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title d-flex">
                <img src="/logos/lulogo.png" class="pr-3" style="height: 150px">
                <div style="color:black; font-weight: bold; letter-spacing: 5px">LUgram</div>
            </div>
            <hr>
            <div class="links">
                <div class="pt-2" style="font-weight: 700; font-size: 30px; color: black">See what other people are posting:</div>
            </div>
        </div>

    </div>
    <a style="text-decoration: none; color: white" href="#top">
        <div class="btn btn-secondary" style="position: fixed; z-index:99; bottom: 30px; right: 30px; background-color: #333"><span class="pt-1 material-icons">
                navigation
            </span></div>
    </a>
    <div class="container">
        <div class="row pt-2">
            @foreach(App\Post::orderBy('created_at','desc')->get() as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100" style="max-width: 30vw;"></a>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>