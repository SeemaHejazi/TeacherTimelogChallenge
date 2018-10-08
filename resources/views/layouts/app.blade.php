<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HiMama</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">

</head>
    <body>
        @include('inc.navbar')

        <div class="container">
            @if(Request::is('/'))
                @include('inc.showcase')
            @endif

            <div class="row">
                <div class="col-md-8 col-lg-8">
                    @include('inc.messages')

                    @yield('content')
                </div>
                {{--<div class="col-md-4 col-lg-4">--}}
                    {{----}}
                {{--</div>--}}
            </div>
        </div>

        <footer id="footer" class="text-center">
            <p>Copyright 2018 &copy; Seema Hejazi</p>
        </footer>
        <script src="/js/app.js"></script>
    </body>
</html>
