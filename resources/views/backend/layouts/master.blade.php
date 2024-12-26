
<!doctype html>
<html lang="en">

<head>
    @include('backend.layouts.head')
</head>
<body class="theme-gold">

<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('backend/assets/images/loading.gif')}}" width="80" height="80" alt="loader"></div>
    </div>
</div>

<div id="wrapper">

    @include('backend.layouts.nav')

    @include('backend.layouts.sidebar')

    @yield('content')
    
</div>

@include('backend.layouts.footer')
</body>
</html>