<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item active">
                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} <span class="sr-only"></span></a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
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

            <div class="content">
                <!-- /resources/views/post/create.blade.php -->

                <h1>{{__('massages.create offer title' )}}</h1>
                @if(Session::has('sucsses'))
                   {{Session::get('sucsses')}}
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Create Post Form -->
                <div class="title m-b-md">

                </div>

                <div class="links">
                    <form method="post"action="{{route('offer.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('massages.enter offer name' )}}</label>
                            <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('massages.enter offer name' )}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('massages.enter offer name' )}}</label>
                            <input type="text" name="name_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('massages.enter offer name' )}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('massages.enter offer price' )}}</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('massages.enter offer price' )}}">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('massages.enter offer details' )}}</label>
                            <input type="text" name="details_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('massages.enter offer details' )}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('massages.enter offer details' )}}</label>
                            <input type="text" name="details_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('massages.enter offer details' )}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('massages.offer image' )}}</label>
                            <input type="file" name="img" class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('massages.enter offer save' )}}</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
