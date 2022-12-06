<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- STYLE CSS -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/fan/style.css') }}" rel="stylesheet" />
    @include('frontend.fan.section.head')
    <style>
    .content {
        margin:130px 0px 0px 0px ;
    }
    .heading.mt-5  h4.text-white {
    padding-top: 25px;
}
option {
    background: #091625;
    padding: 30px !important;
}
.filtersidenav {
    top: 142px;}
.card-body.text-white h6 b{
    font-family: 'Montserrat';
font-style: normal;
font-weight: 600;
font-size: 22px;
line-height: 20px;
color: #FFFFFF;
}
</style>

</head>

<body class="app sidebar-mini">
    <!-- GLOBAL-LOADER -->
    {{-- <div id="global-loader">
        <img src="{{ URL::asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- /GLOBAL-LOADER -->
    <!-- PAGE -->
    @include('frontend.fan.section.header')
    @include('frontend.fan.section.sidebar')
    @yield('content')
    @include('frontend.fan.section.footer')

    @include('frontend.fan.section.footer-scripts')

</body>

</html>
