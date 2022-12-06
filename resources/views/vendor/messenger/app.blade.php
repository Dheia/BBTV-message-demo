<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
      <style>
         li.list-group-item.li_type {
         border: 0px;
         }
    
    
      </style>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="application-name" content="FS">
      <meta name="apple-mobile-web-app-title" content="FS">
      <meta name="theme-color" content="#343a40">
      <meta name="msapplication-navbutton-color" content="#343a40">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="msapplication-starturl" content="/">
      <link rel="icon" type="image/png" sizes="192x192"
         href="{{ asset('vendor-message/messenger/images/android-chrome-192x192.png') }}">
      <link rel="apple-touch-icon" type="image/png" sizes="180x180"
         href="{{ asset('vendor-message/messenger/images/apple-touch-icon.png') }}">
      <link rel="icon" type="image/png" sizes="32x32"
         href="{{ asset('vendor-message/messenger/images/favicon-32x32.png') }}">
      <link rel="icon" type="image/png" sizes="16x16"
         href="{{ asset('vendor-message/messenger/images/favicon-16x16.png') }}">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" />
      <link href="{{ URL::asset('assets/css/fan/style.css') }}" rel="stylesheet" />
      <link href="{{ URL::asset('css/messenger/style.css') }}" rel="stylesheet" />
      @include('frontend.fan.section.head')
      <meta name="title" content="@yield('title', config('messenger-ui.site_name'))">
      <title>@yield('title', config('messenger-ui.site_name'))</title>
      @auth
      <link id="main_css"
         href="{{ asset(messenger()->getProviderMessenger()->dark_mode ? 'vendor-message/messenger/dark.css?id=c6a1828963e845e69f67939f8fbd0d39' : 'vendor-message/messenger/app.css?id=3b55d7c19427a2dad7488300afe9035c') }}"
         rel="stylesheet">
      @else
      <link id="main_css" href="{{ asset('vendor-message/messenger/dark.css?id=c6a1828963e845e69f67939f8fbd0d39') }}"
         rel="stylesheet">
      @endauth
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">
      <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      @stack('css')
   </head>
   <body>
      <wrapper class="d-flex flex-column">
         <main id="FS_main_section" class="flex-fill">
            <div id="app">
               @if(Auth::user()->roles->first()->title == 'model'||Auth::user()->roles->first()->title == 'Model') 
               <style>
                  .content {
                     margin: 0px 0px 0px 0px !important; 
                  }
               </style>
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
                              <div class="col-sm-12 text-white col-md-9 mt= col-lx-9 mb-5">
                              @yield('content')</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @include('frontend.model.section.footer')
                  @include('frontend.model.section.footer-scripts')
                            @else
                            @if(Auth::user()->roles->first()->title == 'fan'||Auth::user()->roles->first()->title == 'Fan') 
                            @include('frontend.fan.section.header')
                            @include('frontend.fan.section.sidebar')
                            <div class="col-sm-12 text-white col-md-9 col-lx-9 mt-4 mb-5">
                            @yield('content')</div>
                            @include('frontend.fan.section.footer')
                            @include('frontend.fan.section.footer-scripts')
                            @endif
                            @endif
                            </div>
                            </div>
                            </main>
                            </wrapper>
                            @include('messenger::scripts')
                            </body>
                            </html>