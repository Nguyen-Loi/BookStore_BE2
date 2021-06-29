<!doctype html>
<html class="no-js" lang="">
@php
$author=$temp::where("id","=",$_GET['id'])->first();
$arrbook = $book::where("idAuthor","=",$author->id)->limit(4)->get();

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

<body>

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			@include('template.404error')


		</header>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
			<div class="container">
				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>Authors</h1>
							<ol class="tg-breadcrumb">
								<li><a href="javascript:void(0);">home</a></li>
								<li><a href="javascript:void(0);">Authors</a></li>
								<li class="tg-active">Authors Title</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Author Detail Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
		
				<div class="container">
				@include('flash-message')
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-authordetail">
								<figure class="tg-authorimg">
									<img src="images/author/{{$author->image}}" alt="image description">
								</figure>
								<div class="tg-authorcontentdetail">
									<div class="tg-sectionhead">
										<h2><span>{{$author->publishedBooks}} Published Books</span>{{$author->nameAuthor}}</h2>
										<ul class="tg-socialicons">
											<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
											<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
											<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
											<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
											<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
										</ul>
									</div>
									<div class="tg-description">
										<p>{{$author->Description}}</p>
									</div>
									<div class="tg-booksfromauthor">
										<div class="tg-sectionhead">
											<h2>Books of {{$author->nameAuthor}}</h2>
										</div>
										<div class="row">
											@foreach ($arrbook as $item)


											<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg">
														<a href="./book_detail.blade.php?idBook={{ $item->idBook }}">
															<div class="tg-bookimg">
																<div class="tg-frontcover">
																	<img src="{{url('images/books')}}/{{$item->image}}" alt="image description">
																</div>
																<div class="tg-backcover"><img src="{{url('images/books')}}/{{$item->image}}" alt="image description"></div>
															</div>
														</a>


													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">{{$temp1::find($item->idCategory)->nameCategory}}</a></li>
														</ul>

														<div class="tg-booktitle">
															<h3><a href="./book_detail.blade.php?idBook={{ $item->idBook }}">{{ $item->nameBook }}</a>
															</h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">{{$temp::find($item->idAuthor)->nameAuthor}}</a></span>
														<span class="tg-stars"><span></span></span>
														<span class="tg-bookprice">
															<ins>{{$item->price}}.000 VND</ins>
															<del>{{$item->salePrice}}.000 VND</del>
														</span>
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Author Detail End
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
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
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