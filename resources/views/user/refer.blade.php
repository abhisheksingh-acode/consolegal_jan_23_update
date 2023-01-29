@extends('layouts.user')

@section("title","Dashboard User")


@section('content')

          <!--refer start -->
          <div class="tab-pane active text-style" id="tab4">
            <div class="container">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Invite</a>

                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">FAQS</a>

                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <h3>Refers to friend and earn cash back</h3>
                      <div class="row">


                        <div class="col-xl-8 col-lg-8 col-md-8 col-8">
                          <form>
                            <input type="text" name="copy" id="copy" value="{{Config::get('app.url')}}users/signup/{{$user->user_id}}">
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-4">
                          <button type="button" onclick="work()" class="tapbtn">Tap to copy</button>
                          </form>
                        </div>

                        <script>
                          function work() {
                            /* Get the text field */
                            var copyText = document.getElementById("copy");

                            /* Select the text field */
                            copyText.value;
                            copyText.setSelectionRange(0, 99999); /* For mobile devices */

                            /* Copy the text inside the text field */
                            navigator.clipboard.writeText(copyText.value);

                            /* Alert the copied text */
                            document.querySelector(".tapbtn").innerHTML = "copied";

                          }
                        </script>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                          <h5>Or Invite Via</h5>
                        </div>
                        <a href="https://web.whatsapp.com/send?text={{Config::get('app.url')}}users/signup/{{$user->id}}" data-action="share/whatsapp/share" target="_blank" class="col-xl-4 col-lg-4 col-md-4 col-6"><span><i class="fa fa-whatsapp" aria-hidden="true"></i>
                            via whatsApp</span></a>
                        <!-- <div class="col-xl-3 col-lg-3 col-md-3 col-2"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-2"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-2"><i class="fa fa-share-alt" aria-hidden="true"></i></div> -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                          <p class="inv-title">Invite Now</p>
                        </div>

                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                          <img src="images/gift.jpg">
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                          <button class="ref-btn"><i class="fa fa-share-alt pr-2" aria-hidden="true"></i>share, refer & earn now</button>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <section class="py-5">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                              <div id="accordion">

                                <div class="card">
                                  <div class="card-header bg-dark ">
                                    <a class="card-link text-white" data-toggle="collapse" href="#collapseOne"><span class="float-right"><i class="fa fa-arrow-down"></i></span>
                                      <h6>Collapsible Group Item #1</h6>

                                    </a>
                                  </div>
                                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                      Lorem ipsum..
                                    </div>
                                  </div>
                                </div>

                                <div class="card">
                                  <div class="card-header bg-dark">
                                    <a class="collapsed card-link text-white" data-toggle="collapse" href="#collapseTwo"><span class="float-right"><i class="fa fa-arrow-down"></i></span>
                                      <h6>Collapsible Group Item #2</h6>
                                    </a>
                                  </div>
                                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                      Lorem ipsum..
                                    </div>
                                  </div>
                                </div>

                                <div class="card">
                                  <div class="card-header bg-dark">
                                    <a class="collapsed card-link text-white" data-toggle="collapse" href="#collapseThree"><span class="float-right"><i class="fa fa-arrow-down"></i></span>
                                      <h6>Collapsible Group Item #3</h6>
                                      <span class="float-right"><i class="ti-plus"></i></span>
                                    </a>
                                  </div>
                                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                      Lorem ipsum..
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>

@endsection