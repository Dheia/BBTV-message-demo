<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- STYLE CSS -->
    {{-- <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ URL::asset('/css/model/style.css') }}" rel="stylesheet" /> --}}
    @include('frontend.model.section.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
</head>
<body class="app sidebar-mini">
    @include('frontend.model.section.header')
    <div class="content-wrapper">
        <div class="container">
            <div class="content">
                <div class="row">
                    @include('frontend.model.section.sidebar')
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    @include('frontend.model.section.footer')

    @include('frontend.model.section.footer-scripts')

    <style>
        .exampleInputEmail1_ifr>#tinymce,
        .exampleInputEmail1_ifr>#tinymce>p {
            color: #fff !important;
        }
        .bg-light {
    background-color: #112435 !important;
}
    </style>
</body>
</html>
