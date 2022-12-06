<footer class="footer-bg-wrapper">
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-wrapp">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-6">
                        <div class="footer-info-wraper"><a>
                            <img src="{{ url('images/logo') . '/' . $logo['footer_logo'] }}" alt="Logo"
                                class="nav-logo" /></a>
                            <p class="mt-2">
                                {{$logo['discript']}}
                            </p>
                            <div class="footer-icons-wrapepr ">
                            <a class="footer-icons-wrap" href="{{$logo['facebook']}}"> <span >
                                   <i class="fa-brands fa-facebook-f mt-1"></i>
                                </span></a>

                                <a class="footer-icons-wrap" href="{{$logo['twitter']}}"> <span >
                                   <i class="fa-brands fa-twitter mt-1"></i>
                                </span></a>

                                <a class="footer-icons-wrap" href="{{$logo['pinterest']}}"> <span >
                                    <i class="fa-brands fa-pinterest mt-1"></i>
                                </span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 fotter_center1">
                        <b class="footerlink-hading">Quick Link</b>
                        <div class="quick-link-wrapper">
                            <ul>


                                <a href="{{ route('online-now') }}">
                                    <li>Online Now</li>
                                </a>
                                <a href="{{ route('phone-sex') }}">
                                    <li>Phone Sex</li>
                                </a>
                                <a href="{{ route('video-calls') }}">
                                    <li>Video Calls</li>
                                </a>
                                <a href="{{ route('top-models') }}">
                                    <li>Top Models</li>
                                </a>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 fotter_center2">
                        <div class="supportlink-wrapepr">
                            <b class="footerlink-hading"> Support </b>
                            <ul class="last_list">
                                <li><a href="{{ route('billing') }}">Billing</a></li>
                                <li><a href="faq">FAQ</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="allrights-wrapper">
                <p>© 2022 Bad Bunnies Tv. All rights reserved.</p>
                <div>
                    <span>Interested in becoming a model?</span>
                    <a href="{{url('/storeuser')}}"> <button class="apply-btn">Apply NoW</button></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<style type="text/css">
    ul.last_list {
        padding: 0;
    }
</style>