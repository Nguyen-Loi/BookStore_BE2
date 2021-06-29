<!doctype html>
<html class="no-js" lang="">
@php
$user = auth()->user();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<header id="tg-header" class="tg-header tg-haslayout">
    @include('template.404error')


</header>

<body class="tg-home tg-homeone">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
    Header Start
  *************************************-->

        <!--************************************
    Header End
  *************************************-->

        <!--************************************
     Best Selling Start
   *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            @include('flash-message')
                            <h2><span>People’s Choice</span>Bestselling Books</h2>
                            <a class="tg-btn" href="../public/category_book.blade.php1">View All</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                            @foreach ($data as $book)
                            <div class="item">
                                <div class="tg-postbook">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <a href="./book_detail.blade.php?idBook={{$book->idBook}}">
                                                <div class="tg-frontcover"><img src="{{url('images/books')}}/{{ $book->image }}" alt="image description"></div>
                                            </a>
                                        </div>
                                    </figure>
                                    <div class="tg-postbookcontent">

                                        <ul class="tg-bookscategories">
                                            <li><a href="../public/category_book.blade.php{{ $book->idCategory }}">{{ $temp1::find($book->idCategory)->nameCategory }}</a>
                                            </li>
                                        </ul>

                                        <div class="tg-booktitle">
                                            <h3><a href="./book_detail.blade.php?idBook={{ $book->idBook }}">{{ $book->nameBook }}</a>
                                            </h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="./authordetail.blade.php?id={{ $book->idAuthor }}">{{ $book->nameAuthor }}</a></span>
                                        @for($x = 5; $x > 0; $x--)
                                        @php
                                        if($book->rate > 0.5){
                                        echo '<i class="fa fa-star"></i>';
                                        }elseif($book->rate <= 0 ){ echo '<i class="fa fa-star-o"></i>' ; }else{ echo '<i class="fa fa-star-half-o"></i>' ; } $book->rate--;
                                            @endphp
                                            @endfor
                                            <span class="tg-bookprice">
                                                <ins>{{ $book->price }}.000VND</ins>
                                                <del>{{ $book->salePrice }}.000VND</del>
                                            </span>
                                            <a class="tg-btn tg-btnstyletwo" href="{{url('/cart/add/')}}/{{$book->idBook}}">
                                                <i class="fa fa-shopping-basket"></i>
                                                <em>Add To Basket</em>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
     Best Selling End
   *************************************-->

        <!--************************************
     Featured Item Start
   *************************************-->

        <!--************************************
     Featured Item End
   *************************************-->
        <!--************************************
     New Release Start
   *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-newrelease">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="tg-sectionhead">
                                <h2><span>Taste The New Spice</span>New Release Books</h2>
                            </div>
                            <div class="tg-description">
                                <p>The latest books released in the past weeks</p>
                            </div>
                            <div class="tg-btns">
                                <a class="tg-btn tg-active" href="../public/category_book.blade.php1">View All</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="tg-newreleasebooks">
                                    @foreach ($threenewstbook as $book)
                                    <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg">
                                                <div class="tg-bookimg">
                                                    <a href="./book_detail.blade.php?idBook={{ $book->idBook }}">
                                                        <div class="tg-frontcover"><img src="{{url('images/books')}}/{{ $book->image }}" alt="image description"></div>
                                                    </a>
                                                    <a href="./book_detail.blade.php?idBook={{ $book->idBook }}">
                                                        <div class="tg-backcover"><img src="{{url('images/books')}}/{{ $book->image }}" alt="image description"></div>
                                                    </a>


                                                </div>
                                            </figure>
                                            <div class="tg-postbookcontent">
                                                <ul class="tg-bookscategories">
                                                    <li><a href="../public/category_book.blade.php{{ $book->idCategory }}">{{ $temp1::find($book->idCategory)->nameCategory }}</a>
                                                    </li>

                                                </ul>
                                                <div class="tg-booktitle">
                                                    <h3><a href="./book_detail.blade.php?idBook={{ $book->idBook }}">{{ $book->nameBook }}</a>
                                                    </h3>
                                                </div>
                                                <span class="tg-bookwriter">By: <a href="./authordetail.blade.php?id={{ $book->idAuthor }}">{{ $book->nameAuthor }}</a></span>
                                                @for($x = 5; $x > 0; $x--)
                                                @php
                                                if($book->rate > 0.5){
                                                echo '<i class="fa fa-star"></i>';
                                                }elseif($book->rate <= 0 ){ echo '<i class="fa fa-star-o"></i>' ; }else{ echo '<i class="fa fa-star-half-o"></i>' ; } $book->rate--;
                                                    @endphp
                                                    @endfor
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
     New Release End
   *************************************-->
        <!--************************************
     Collection Count Start
   *************************************-->
        <section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-04.jpg">
            <div class="tg-sectionspace tg-collectioncount tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="tg-collectioncounters" class="tg-collectioncounters">
                            <div class="tg-collectioncounter tg-drama">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-bubble"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Adventure</h2>
                                    <h3 data-from="0" data-to=" {{$countAdventure}}" data-speed="8000" data-refresh-interval="50">
                                        {{$countAdventure}}
                                    </h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-horror">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart-pulse"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Study</h2>
                                    <h3 data-from="0" data-to="{{$countStudy}}" data-speed="8000" data-refresh-interval="50">
                                        {{$countStudy}}
                                    </h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-romance">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Programming</h2>
                                    <h3 data-from="0" data-to="{{$countProramming}}" data-speed="8000" data-refresh-interval="50">
                                        {{$countProramming}}
                                    </h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-fashion">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-star"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Romance</h2>
                                    <h3 data-from="0" data-to="{{$countRomance}}" data-speed="8000" data-refresh-interval="50">
                                        {{$countRomance}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
     Collection Count End
   *************************************-->
        <!--************************************
     Picked By Author Start
   *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Some Great Books</span>Picked By Authors</h2>
                            <a class="tg-btn" href="../public/category_book.blade.php1">View All</a>
                        </div>
                    </div>
                    <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">

                        @foreach ($bookList as $item)
                        <div class="item">
                            <div class="tg-postbook">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg">
                                        <a href="./book_detail.blade.php?idBook={{ $item->idBook }}">
                                            <div class="tg-frontcover"><img src="{{url('images/books')}}/{{ $item->image }}" alt="image description"></div>
                                        </a>
                                    </div>
                                    <a href="./book_detail.blade.php?idBook={{ $item->idBook }}">
                                        <div class="tg-hovercontent">
                                            <div class="tg-description">
                                                <p>{{$item->Description}}</p>
                                            </div>
                                            <strong class="tg-bookcategory">{{ $temp1->where('id', '=',$item->idCategory)->first()->nameCategory}}</strong>
                                            <strong class="tg-bookprice">Price: {{$item->salePrice}}.000VND</strong>

                                        </div>
                                    </a>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="./book_detail.blade.php?idBook={{ $item->idBook }}">{{$item->nameBook}}</a></h3>
                                    </div>
                                    <span class="tg-bookwriter">By: <a href="./authordetail.blade.php?id={{ $item->idAuthor }}">{{ $item->nameAuthor }}</a></span>
                                    <a class="tg-btn tg-btnstyletwo" href="{{url('/cart/add/')}}/{{$item->idBook}}">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Add To Basket</em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
     Picked By Author End
   *************************************-->
        <!--************************************
     Testimonials Start
   *************************************-->
        <section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                            <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">

                            <div class="item tg-testimonial" style="text-align: center;">
                                    <figure><img src="./images/books/nghia.png" alt="image description"></figure>
                                    <q>Don’t cry because it’s over, smile because it happened </q>

                                    <div class="tg-testimonialauthor">
                                        <h3>Member</h3>
                                        <span> Nguyen Trung Nghia</span>
                                    </div>
                                </div>
                                <!-- Nghia -->
                                <div class="item tg-testimonial" style="text-align: center;">
                                    <figure><img src="./images/books/anhtestphp.jpg" alt="image description"></figure>
                                    <q >You only live once, but if you do it right, once is enough.  </q>

                                    <div class="tg-testimonialauthor">
                                        <h3>Member</h3>
                                        <span> Nguyen Thanh Duy</span>
                                    </div>
                                </div>
                                <!-- Loi -->
                                <div class="item tg-testimonial" style="text-align: center;">
                                    <figure><img src="./images/books/loi.jpg" alt="image description"></figure>
                                    <q> I’m selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can’t handle me at my worst, then you sure as hell don’t deserve me at my best.  </q>

                                    <div class="tg-testimonialauthor">
                                        <h3>Member</h3>
                                        <span> Nguyen Hong Loi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
     Testimonials End
   *************************************-->

        <!--************************************
     Call to Action Start
   *************************************-->
        <section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-06.jpg">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-calltoaction">
                                <h2>You should login</h2>
                                <h3>To receive the latest promotions
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
     Call to Action End
   *************************************-->
        <!--************************************
     Latest News Start
   *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
                            <a class="tg-btn" href="../public/category_book.blade.php1">View All</a>
                        </div>
                    </div>
                    <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">

                        @foreach ($featureArrayBook as $item)

                        <article class="item tg-post">
                            <figure><a href="./book_detail.blade.php?idBook={{ $item->idBook }}"><img src="{{url('images/books')}}/{{$item->image}}" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);"></a></li>

                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="./book_detail.blade.php?idBook={{ $item->idBook }}">{{ $item->nameBook }}</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="./authordetail.blade.php?id={{ $item->idAuthor }}">{{ $item->nameAuthor }}</a></span>
                                @for($x = 5; $x > 0; $x--)
                                @php
                                if($item->rate > 0.5){
                                echo '<i class="fa fa-star"></i>';
                                }elseif($item->rate <= 0 ){ echo '<i class="fa fa-star-o"></i>' ; }else{ echo '<i class="fa fa-star-half-o"></i>' ; } $item->rate--;
                                    @endphp
                                    @endfor
                            </div>
                        </article>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!--************************************
     Latest News End
   *************************************-->
        </main>
        <!--************************************
    Main End
  *************************************-->
        <!--************************************
    Footer Start
  *************************************-->
        @include('template.405footer')

        <!--************************************
    Footer End
  *************************************-->
    </div>
    <!--************************************
   Wrapper End
 *************************************-->
    <script src="js/vendor/jquery-library.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en">
    </script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/countTo.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/gmap3.js"></script>
    <script src="js/main.js"></script>
</body>

</html>