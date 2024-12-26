<!doctype html>
<html lang="rus">

<head>
    @include('frontend.layouts.head')
</head>



<body style="background-color: #303030">

    <div id="preloader" style="background-color: #303030">
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{asset('backend/assets/images/loading.gif')}}" width="80" height="80" alt="loader"></div>
            </div>
        </div>
    </div>


    @include('frontend.layouts.header')

    @yield ('content')

    @include('frontend.layouts.script')

</body>

</html>