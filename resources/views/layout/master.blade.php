<!docType html>
<html>
<head>


    <title> @yield('title')</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    
    
    <script defer src="{{asset('/static/fontawesome/svg-with-js/js/fontawesome-all.js')}}"></script>
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>

<body>
@include('partials.header')
<div class="container">
    @yield('content')
</div>


<script src="{{URL::to('js/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('js/bootstrap.min.js')}}" type="text/javascript"></script>

@yield('script')
</body>
</html>