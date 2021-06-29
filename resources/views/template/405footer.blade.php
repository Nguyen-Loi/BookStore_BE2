  @section('foot')
   <footer id="tg-footer" class="tg-footer tg-haslayout">
            <div class="tg-footerarea">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="tg-clientservices">
                                <li class="tg-devlivery">
                                    <span class="tg-clientserviceicon"><i class="icon-rocket"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>Fast Delivery</h3>
                                        <p>Shipping Worldwide</p>
                                    </div>
                                </li>
                                <li class="tg-discount">
                                    <span class="tg-clientserviceicon"><i class="icon-tag"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>Open Discount</h3>
                                        <p>Offering Open Discount</p>
                                    </div>
                                </li>
                                <li class="tg-quality">
                                    <span class="tg-clientserviceicon"><i class="icon-leaf"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>Eyes On Quality</h3>
                                        <p>Publishing Quality Work</p>
                                    </div>
                                </li>
                                <li class="tg-support">
                                    <span class="tg-clientserviceicon"><i class="icon-heart"></i></span>
                                    <div class="tg-titlesubtitle">
                                        <h3>24/7 Support</h3>
                                        <p>Serving Every Moments</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tg-threecolumns">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="tg-footercol">
                                    <strong class="tg-logo"><a href="index.blade.php"><img src="images/flogo.png" alt="image description"></a></strong>
                                    <ul class="tg-contactinfo">
                                        <li>
                                            <i class="icon-apartment"></i>
                                            <address>Suit # 07, Rose world Building, Street # 02, AT246T Manchester
                                            </address>
                                        </li>
                                        <li>
                                            <i class="icon-phone-handset"></i>
                                            <span>
                                                <em>0800 12345 - 678 - 89</em>
                                                <em>+4 1234 - 4567 - 67</em>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="icon-clock"></i>
                                            <span>Serving 7 Days A Week From 9am - 5pm</span>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <span>
                                                <em><a href="mailto:goblinslay@gmail.com">goblinslay@gmail.com</a></em>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="tg-socialicons">
                                        <li class="tg-facebook"><a href="https://www.facebook.com/thitbo.chao.10/"><i class="fa fa-facebook"></i></a></li>

                                        <li class="tg-googleplus"><a href="https://www.facebook.com/thitbo.chao.10/"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="tg-rss"><a href="https://www.facebook.com/thitbo.chao.10/"><i class="fa fa-rss"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="tg-footercol tg-widget tg-widgetnavigation">
                                    <div class="tg-widgettitle">
                                        <h3>Shipping And Help Information</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>

                                            <li><a href="../public/contactus.blade.php">Returns</a></li>
                                            <li><a href="../public/contactus.blade.php">Privacy</a></li>

                                            <li><a href="../public/contactus.blade.php">Contact Us</a></li>


                                        </ul>
                                        <ul>

                                            <li><a href="../public/aboutus.blade.php">Meet Our Team</a></li>

                                            <li><a href="../public/aboutus.blade.php">Join Our Team</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="tg-footercol tg-widget tg-widgettopsellingauthors">
                                    <div class="tg-widgettitle">
                                        <h3>Top Selling Authors</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            @foreach ($top3Author as $key)
                                            <li>
                                                <figure><a href="./authordetail.blade.php?id={{ $key->id }}">
                                                        <img width="50" height="50" src="images/author/{{$key->image}}" alt="image description"></a></figure>
                                                <div class="tg-authornamebooks">
                                                    <h4><a href="./authordetail.blade.php?id={{ $key->id }}">{{$key->nameAuthor}}</a></h4>
                                                    <p>{{$key->PublishedBooks}} Published Books</p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h4>Signup Newsletter!</h4>
                            <h5>Register today</h5>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <form class="tg-formtheme tg-formnewsletter">
                                <fieldset>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email ID">
                                    <a href="./login">   <button type="button"><i class="icon-envelope"></i></button></a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-footerbar">
                <a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span class="tg-paymenttype"><img src="images/paymenticon.png" alt="image description"></span>
                            <span class="tg-copyright">2017 All Rights Reserved By &copy; Book Library</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
@show
