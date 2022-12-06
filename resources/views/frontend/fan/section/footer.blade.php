</div>

<footer class="footer-bg-wrapper">
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-wrapp">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-6">
                        <div class="footer-info-wraper">
                        <img src="{{ url('images/logo') . '/' . $logo['footer_logo'] }}" alt="Logo" class="nav-logo" />
                            <p>
                                {{$logo['discript']}}
                            </p>
                            <div class="footer-icons-wrapepr">
                                <span class="footer-icons-wrap">
                                    <a href="{{$logo['facebook']}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    
                                </span>

                                <span class="footer-icons-wrap">
                                   <a href="{{$logo['twitter']}}" target="_blank"> <i class="fa-brands fa-twitter"></i></a>
                                </span>

                                <span class="footer-icons-wrap">
                                   <a href="{{$logo['pinterest']}}" target="_blank"> <i class="fa-brands fa-pinterest"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3">
                        <b class="footerlink-hading">Quick Link</b>
                        <div class="quick-link-wrapper">
                            <ul>
                              
                               
                    <a href="">
                        <li>Online Now</li>
                    </a>
                    <a href="">
                        <li>Phone Sex</li>
                    </a>
                    <a href="">
                        <li>Video Calls</li>
                    </a>
                    <a href="">
                        <li>Top Models</li>
                    </a>
                                               
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3">
                        <div class="supportlink-wrapepr">
                            <b class="footerlink-hading"> Support </b>
                            <div class="quick-link-wrapper">
                                <ul>
                                  
                                   
                        <a href="{{url('/billing')}}">
                            <li>Billing</li>
                        </a>
                        <a href="{{url('/faq')}}">
                            <li>FAQ</li>
                        </a>
                        <a href="{{url('/contact')}}">
                            <li>Contact</li>
                        </a>
                       
                                                   
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="allrights-wrapper">
                <p>© 2022 Bad BunniesTV. All rights reserved.</p>
                <div>
                    <span>Interested in becoming a model?</span>
                    <button class="apply-btn">Apply NoW</button>
                </div>
            </div>
        </div>
    </div>
</footer>
