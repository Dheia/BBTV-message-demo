@extends('frontend.main')
@section('content')
<style>
  ::marker {
    color: #7c8989 !important;
}
  .bg-white {
    background-color: transparent !important;
    padding: 10px !important;
    align-items: center !important;
    justify-content: center !important;
    color: #fff !important;
    padding: 13px !important;
  }

  span.relative.z-0.inline-flex.shadow-sm.rounded-md {
    border-radius: 10px !important;
    background: #173453 !important;
    padding: 25px;
  }

  svg.w-5.h-5 {
    color: #fff !important;
    height: 25px !important;
    width: 25px !important;
    background-color: transparent !important;
  }

  .border {
    border: none !important;
  }

  span.relative.z-0.inline-flex.shadow-sm.rounded-md {}

  span.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5 {
    height: 30px !important;
    /* display: inline-block; */
    width: 30px !important;
    background: #c73ca9 !important;
    transform: rotate(45deg) !important;
    -ms-transform: rotate(45deg) !important;
    -webkit-transform: rotate(45deg) !important;
    border-radius: 7px !important;
  }

  #pagination a svg:hover {
    /* display: inline-block; */
    height: 25px !important;
    width: 25px !important;
    background-color: #c73ca9 !important;
    /* transform: rotate(45deg)!important;
    -ms-transform: rotate(45deg)!important;
    -webkit-transform: rotate(45deg)!important; */
    border-radius: 7px !important;
  }

  a.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.hover\:text-gray-500.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
    padding: 13px 20px !important;
  }
</style>
<!-- online wrapper start -->
<div class="onlinewrapp-bg">
                          <div class="container">
                            <div class="content">
                              <div class="row">
                                
                                <div class="col-sm-12 text-white col-md-12 col-lg-12 mt-5 mb-5">
                                  <div class="heading ">
                                    <h4 class="ml-3"><b>Bad Bunnies TV Users Code Of Conduct</b></h4></div>
                                  <div class="card">
                                    <div class="card-body text-white">
                                      <div class="card_cont mb-4">
                                          <small class="content_text  text-muted">This code of conduct is for Bad Bunnies TV and is supplemental to the Terms and Conditions and Privacy Policy. Please refer to such terms for an in-depth breakdown of our conduct rules.</small>
                                      </div>
                                      <div class="card_cont mb-4">
                                        <h6><b>Responsibility</b></h6>
                                          <small class="content_text text-muted">Bad Bunnies TV cannot be held responsible for the actions or comments made by users or models on the website, forums, or other social media outlets.We strongly advise you not to give personal or account information to anyone. This includes information that can be used to identify you (i.e. your real phone number, physical address, etc.) or information that may be used to compromise your account.
                                          Users may not engage in or encourage any illegal behavior or communications concerning such.</small>
                                      </div>
                                       <div class="card_cont mb-4">
                                        <h6><b>Forbidden Conduct</b></h6>
                                          <small class="content_text text-muted">The following actions are forbidden, and can lead to disciplinary action in accordance with the Disciplinary Policy outlined below.</small><br><br>
                                            <small class="content_text text-muted">Harassing or bullying models via verbal or written communications.
                                            Any language or content deemed illegal, dangerous, threatening, abusive, obscene, vulgar, defamatory, hateful, racist, sexist, ethically offensive or constituting harassment.
                                            Impersonation of someone or someone else’s likeness.
                                            Verbal or written abuse targeted toward a Bad Bunnies TV employee.
                                            Circumventing the Bad Bunnies TV billing system by sending payments through outside payment services (PayPal, Venmo, Cash App, Google Pay, etc.) to models on Bad Bunnies TV.
                                            Asking models to communicate via other applications (Snapchat, Twitter, Instagram, etc.) in lieu of the Bad Bunnies TV platform.
                                            Publicly sharing and/or posting private information of models.</small>
                                      </div>
                                       <div class="card_cont mb-4">
                                        <h6><b>Forbidden Activities / Terms</b></h6>
                                          <small class="content_text text-muted">These activities and terms, whether they are acted upon, depicted, implied, or discussed as a roleplaying scenario, are strictly prohibited on Bad Bunnies TV. If a model insists on breaking these rules, please report the model immediately.</small><br><br>
                                          <ul>
                                            <li><small class="content_text text-muted">Any illegal activity</small></li>
                                            <li><small class="content_text text-muted">Any actions associated with bringing injury or risk of injury to others (including animals)</small></li>
                                            <li><small class="content_text text-muted">Anything that would impair consent</small></li>
                                            <li><small class="content_text text-muted">Use abusive, inflammatory, or racist language.</small></li>
                                            <li><small class="content_text text-muted">Portraying or discussing sexual activities involving any person under the age of 18 years of age</small></li>
                                            <li><small class="content_text text-muted">Escorting</small></li>
                                            <li><small class="content_text text-muted">Prostitution</small></li>
                                            <li><small class="content_text text-muted">Paid or unpaid in-person meetups</small></li>
                                            <li><small class="content_text text-muted">Bestiality</small></li>
                                            <li><small class="content_text text-muted">Urination</small></li>
                                            <li><small class="content_text text-muted">Defecation</small></li>
                                            <li><small class="content_text text-muted">Vomiting</small></li>
                                            <li><small class="content_text text-muted">Blood</small></li>
                                            <li><small class="content_text text-muted">Hypnosis</small></li>
                                          </ul>
                                        <br>
                                        <small class="content_text text-muted">*This is not an exhaustive list and may be added at the discretion of the website.</small>
                                      </div>
                                      <div class="card_cont mb-4">
                                        <h6><b>Disciplinary Policy</b></h6>
                                          <small class="content_text text-muted">In the event of a Code of Conduct violation, disciplinary action will be taken. Depending on the seriousness of the violation, sanctions can range from a warning to a permanent account suspension.</small>
                                      </div>
                                      <div class="card_cont mb-4">
                                        <h6><b>Account Security</b></h6>
                                          <small class="content_text text-muted">All users are responsible for the security of his/her account, including protecting his/her system and account from being compromised. Users must promptly inform Bad Bunnies TV of any apparent breach of the security of their user account, such as the loss, theft, or unauthorized disclosure or use of their user account.</small>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

<!-- online wrapper end -->



@endsection
@section('scripts')

@parent
@endsection