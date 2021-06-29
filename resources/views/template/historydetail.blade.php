<?php
$user = auth()->user();
if (isset($user)) {
} else {
    return redirect()->to('./')->send();
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

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
        <!-- Banner -->
        <div style="margin-bottom:80px " class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-innerbannercontent">
                            <h1>Your cart</h1>
                            <ol class="tg-breadcrumb">
                                <li><a href="javascript:void(0);">home</a></li>
                                <li class="tg-active">Products</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *****************cart****************? -->
        <div class="container">
          
                <table class="table table-bordered" id="cart-summary">
                    <!-- TABLE HEADER START -->
                    <thead>
                        <tr>
                            <th class="cart-product">Preview</th>
                            <th class="cart-description">Name</th>
                            <th class="cart-unit text-center">Quantity</th>
                            <th class="cart_quantity text-center">Total</th>
                        </tr>
                    </thead>
                    <!-- TABLE HEADER END -->
                    <!-- TABLE BODY START -->

                    <tbody>
                        <!-- SINGLE CART_ITEM START -->
                        @foreach ($dataDetail as $item)
                        <tr>
                            <td class="cart-product">
                            <a href="./book_detail.blade.php?idBook={{ $item->idBook }}">
                                <img style="width: 100px; height: 130px; " alt="Flowers in Chania" src="{{url('images/books')}}/{{ $item->image }}">
                            </a>
                            </td>
                            <td class="cart-description">
                                <p class="product-name">{{$item->nameBook}}</p>
                            </td>
                            <td class="cart-unit">
                                <h5>{{$item->qty}}</h5>
                            </td>
                           
                            
                            <td class="cart-total">
                                <span class="price">{{$item->total}}.000VND</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  

                    <!-- TABLE FOOTER END -->
                </table>
                <a style=" margin-left: 1000px;padding-left: 30px;padding-right: 30px;font-size: 18px; margin-bottom: 90px;" href="{{url('./historycart')}}"  class="btn btn-success">Back</a>
          
           
        </div>

        <!-- ************************************* -->
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