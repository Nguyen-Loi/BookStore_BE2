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
                            <h1>History order your book</h1>
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
            <div class="newBody" style="  margin-top: 590px">
                @include('flash-message')
            </div>

        </div>
        <div class="container" style="margin-bottom: 190px">
            @if($count!="0")

            <table class="table table-bordered" id="cart-summary">
                <!-- TABLE HEADER START -->
                <thead>
                    <tr>
                        <th class="cart-product">Id order</th>
                        <th class="cart-description">Status</th>
                        <th class="cart-unit text-center">Total</th>
                        <th class="cart_quantity text-center">Time</th>
                        <th class="cart_quantity text-center">Detail</th>
                        <th class="cart_quantity text-center">Cancel</th>
                    </tr>
                </thead>
                <!-- TABLE HEADER END -->
                <!-- TABLE BODY START -->

                <tbody>
                    <!-- SINGLE CART_ITEM START -->
                    @foreach ($order as $item)


                    <tr>
                        <form action="updateorderuser" method="POST">
                            <input type="hidden" name="idO" value="{{$item->id}}">
                            @csrf
                            <td class="cart-product">
                                <h5>{{$item->id}}</h5>
                            </td>
                            <td class="cart-description">
                                <p class="product-name">{{$item->status}}</p>
                            </td>
                            <td class="cart-unit">
                                <h5>{{$item->total}}.000VND</h5>
                            </td>
                            <td class="cart_quantity text-center">
                                <div class="quantity">
                                    <div class="quantity-input">
                                        <h5>{{$item->created_at}}</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-unit">
                                <a href="./historydetail{{$item->id}}">Oder detail</a>
                            </td>
                            <td class="cart-unit">
                                <button type="submit" class="btn btn-primary">❌</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
                <span>{{$order->links('pagination::bootstrap-4')}}</span>

                <!-- TABLE FOOTER END -->
            </table>


            @else
            <div class="row">
                <div class="col-md-2 col-md-offset-5 top25">
                    <img src="./images/books/git.png" class="img-response" />
                    <br><br>
                    <p style="text-align:center">Nothing in the bag<br><br>
                        <a href="{{url('./')}}" class="btn btn-fill btn-primary">Continue Shopping</a>
                    </p>

                </div>
            </div>
            @endif
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