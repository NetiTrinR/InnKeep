<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InnKeep</title>

    <!-- Fonts -->
    <!-- Save this file later and add it to the brew -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">

    @yield('header.styles')
    @yield('header.scripts')
</head>
<!-- http://www.honokaa.org/images/wood_background%202.png -->
<!-- http://www.barracudatavern.com/images/background-image.jpg -->

<body id="app-layout">
    @include('partials._navigation')
    <div class="container-fluid">
        <div class="row">
            <div id="notifications" class="col-md-10 col-md-offset-1">
                @include('partials._notifications')
            </div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- Save this file later and add it to the brew -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ elixir('js/all.js') }}"></script>
    @yield('footer.scripts')
</body>
</html>