<footer class="footer-bg-wrapper">
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-wrapp">
              
                        <div class="footer-info-wraper">
                        <img src="{{ url('images/logo') . '/' . $logo['footer_logo'] }}" alt="Logo" class="nav-logo" /></a>
                            <p>
                                {{$logo['discript']}}
                            </p>
                            <div class="footer-icons-wrapepr">
                                <span class="footer-icons-wrap">
                                    <a href="{{$logo['facebook']}}"><i class="fa-brands fa-facebook-f"></i></a>
                                    
                                </span>

                                <span class="footer-icons-wrap">
                                   <a href="{{$logo['twitter']}}"> <i class="fa-brands fa-twitter"></i></a>
                                </span>

                                <span class="footer-icons-wrap">
                                   <a href="{{$logo['pinterest']}}"> <i class="fa-brands fa-pinterest"></i></a>
                                </span>
                            </div>
                       
                 
                </div>
            </div>

            <div class="allrights-wrapper">
                <p>© 2022 Bad BunniesTv. All rights reserved.</p>
             
            </div>
        </div>
    </div>
</footer>
<style>
    .footer-icons-wrapepr {
        display: flex;
    margin-top: 20px;
    justify-content: center;
    width: 100%;
}
.footer-info-wraper p {
    width: 100% !important;
}
footer.footer-bg-wrapper {
    text-align: center;
}
.footer-info-wraper p {
    width: 100% !important;
    margin: 0 auto;
    text-align: center;
    line-height: 30px;
}
.footer-icons-wrap {
    margin: 10px;}

.allrights-wrapper {
    display: block !important;}
</style>