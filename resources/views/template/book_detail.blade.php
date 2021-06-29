<!doctype html>
<html class="no-js" lang="">
@php
$bookdetail=$book::where("idBook","=",$_GET['idBook'])->first();
$arrbook = $book::where("idAuthor","=",$bookdetail->idAuthor)->limit(4)->get();

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
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
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

			<div class="container">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									@include('flash-message')
									<h2><span>People’s Choice</span>Infomation book</h2>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-authordetail">
									<figure class="tg-authorimg">
										<img style="width: 200px; height: 250px" src="{{url('images/books')}}/{{$bookdetail->image}}" alt="image description">
									</figure>
									<div class="tg-authorcontentdetail">
										<div class="tg-sectionhead">
											<h2><span>Sold: {{$temp::find($bookdetail->idAuthor)->publishedBooks}} Books</span>Author: {{$temp::find($bookdetail->idAuthor)->nameAuthor}}</h2>
											<p></p>

										</div>
										<br>
										<h5>Release date: <?php
														$date = $bookdetail->created_at;
														$timestring = $date->format('d-m-Y'); 
														echo $timestring; ?></h5>
										<h3> {{$bookdetail->nameBook}}</h3>
										<div class="tg-description">
											<p>{{$bookdetail->Description}}</p>
											<br>
											<div class="price">
												<p style="font-size: 20px; font-style: normal;">Price:
													<span style="margin-left: 300px;font-size: 30px ;color: red;" class="new_price">
														<sup> {{$bookdetail->price}}.000VND</sup>
													</span>
												</p>

												<p style="font-size: 20px; font-style: normal;">Sold book:
													<span style="margin-left: 260px; font-size: 24px " class="new_price">
														<sup> {{$bookdetail->SoldBooks}} books</sup>
													</span>
												</p>
												<div class="stars">
													@for($x = 5; $x > 0; $x--)
													@php
													if($bookdetail->rate > 0.5){
													echo '<i style="font-size: 30px; color:#FD4" class="fa fa-star"></i>';
													}elseif($bookdetail->rate <= 0 ){ echo '<i style="font-size: 30px; color:#FD4" class="fa fa-star-o"></i>' ; }else{ echo '<i class="fa fa-star-half-o"></i>' ; } $bookdetail->rate--;
														@endphp
														@endfor

														<!-- add to cart -->
														<a style=" margin-left: 700px; padding: 22px;padding-left: 30px;padding-right: 30px;font-size: 18px" href="{{url('/cart/add/')}}/{{$bookdetail->idBook}}" class="btn btn-primary">Add to cart</a>


												</div>
												<div class="tg-booksfromauthor" style="margin-top: 50px;">
													<div class="tg-sectionhead">
														<h2>Related books</h2>
													</div>
													<div class="row">
														@foreach($arrbook as $item )

														<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<a href="./book_detail.blade.php?idBook={{ $item->idBook }}">
																			<div class="tg-frontcover" style="width: 90px; height: 250px"><img src="{{url('images/books')}}/{{$item->image}}" alt="image description"></div>
																			<div class="tg-backcover"><img src="{{url('images/books')}}/{{$item->image}}" alt="image description"></div>
																		</a>
																	</div>

																</figure>
																<div class="tg-postbookcontent">
																	<ul class="tg-bookscategories">
																		<li><a href="../public/category_book.blade.php{{ $item->idCategory }}">{{$temp1::find($item->idCategory)->nameCategory}}</a></li>
																	</ul>
																	<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
																	<div class="tg-booktitle">
																		<h3><a href="./book_detail.blade.php?idBook={{ $item->idBook }}">{{$item->nameBook}}</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="./authordetail.blade.php?id={{ $item->idAuthor }}">{{$temp::find($item->idAuthor)->nameAuthor}}</a></span>
																	@for($x = 5; $x > 0; $x--)
																	@php
																	if($item->rate > 0.5){
																	echo '<i class="fa fa-star"></i>';
																	}elseif($item->rate <= 0 ){ echo '<i class="fa fa-star-o"></i>' ; }else{ echo '<i class="fa fa-star-half-o"></i>' ; } $item->rate--;
																		@endphp
																		@endfor <span class="tg-bookprice">
																			<ins>{{$item->price}}.000VND</ins>
																			<del>{{$item->salePrice}}.000VND</del>
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
													<div style="margin-top: 90px" class="tg-sectionhead">
														<h2>Rating and Review</h2>
													</div>

													<!-- THEM VAO USER IDAU SAU CAI TEMPATE.UPDATE NEU CO-->
													<form method="POST" action="{{route('template.store')}}">
														@csrf
														<P>
															<input id="idBook" value="{{$bookdetail->idBook}}" type="hidden" name="idBook" hidden />
														</p>
														<div class="row">
															<div class="col-md-5">
																<input class="star star-5" id="star-5" value="5" type="radio" name="star" />
																<label class="star star-5" for="star-5"></label>
																<input class="star star-4" value="4" id="star-4" type="radio" name="star" />
																<label class="star star-4" for="star-4"></label>
																<input class="star star-3" value="3" id="star-3" type="radio" name="star" />
																<label class="star star-3" for="star-3"></label>
																<input class="star star-2" value="2" id="star-2" type="radio" name="star" />
																<label class="star star-2" for="star-2"></label>
																<input class="star star-1" value="1" id="star-1" type="radio" name="star" />
																<label class="star star-1" for="star-1"></label>
																<input size="114" id="comment" type="text" name="comment" style="text-transform: none;" required placeholder="Enter your comment" />
															</div>
															<div class="col-md-7"></div>
														</div>
														<div class="row">
															<div class="col-md-10"></div>
															<div class="col-md-2">
																<button type="submit" style="padding: 10px; padding-left: 20px; padding-right: 20px;" class="btn btn-success">Send</button>
															</div>
														</div>



													</form>
													<div class="revi">
														@foreach($review->where("idBook","=",$bookdetail->idBook) as $key )
														<div class="bodyRevi" style="margin-bottom: 20px;">
															<div class="row">
																<div class="col-md-1"><img src="./images/books/git.png" alt=""></div>
																<div class="col-md-11">
																	<h4 style="font-weight: bold;">{{$key->name}}</h4>
																</div>
															</div>
															<div class="row">
																<div class="col-md-1">
																</div>
																<div class="col-md-11">
																	@for($x = 5; $x > 0; $x--)
																	@php
																	if($key->rate > 0.5){
																	echo '<i class="fa fa-star"></i>';
																	}elseif($key->rate <= 0 ){ echo '<i class="fa fa-star-o"></i>' ; }else{ echo '<i class="fa fa-star-half-o"></i>' ; } $key->rate--;
																		@endphp
																		@endfor
																</div>
															</div>
															<div class="row">
																<div class="col-md-1"></div>
																<div class="col-md-11">
																	<h5>{{$key->comment}}</h5>
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
	<style>
		div.stars {
			width: 270px;
			display: inline-block;
		}

		input.star {
			display: none;
		}

		label.star {
			float: right;
			padding: 10px;
			font-size: 36px;
			color: #444;
			transition: all .2s;
		}

		input.star:checked~label.star:before {
			content: '\f005';
			color: #FD4;
			transition: all .25s;
		}

		input.star-5:checked~label.star:before {
			color: #FE7;
			text-shadow: 0 0 20px #952;
		}

		input.star-1:checked~label.star:before {
			color: #F62;
		}

		label.star:hover {
			transform: rotate(-15deg) scale(1.3);
		}

		label.star:before {
			content: '\f006';
			font-family: FontAwesome;
		}
	</style>
</body>

</html>