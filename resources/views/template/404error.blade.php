@section('head')
<?php
$user = auth()->user();
if (isset($user)) {
    $role = $user->role;
    $id = $user->id;
    if ($role == 1) {
        return redirect()->to('./book')->send();
    }
}


?>

<div class="tg-middlecontainer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <strong class="tg-logo"><a href="index.blade.php"><img src="images/logo.png" alt="company name here"></a></strong>

                <div class="tg-searchbox">
                    <form class="tg-formtheme tg-formsearch" method="GET" action="search">
                        <fieldset>
                            <input type="text" name="search" required class="typeahead form-control" placeholder="Search by title book, author,...">
                            <button type="submit"><i class="icon-magnifier"></i></button>
                        </fieldset>


                    </form>

                </div>

                <div class="" style=" margin-top: -30px;margin-left: 1000px;">


                    <?php
                    if (isset($user)) { ?>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $user->name; ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{url('/profile')}}{{$id}}"> Profile</a><br>
                                <a class="dropdown-item" href="{{url('/historycart')}}"> History cart</a> <br>
                                <a class="dropdown-item" href="{{url('/logout')}}"> Logout</a>
                            </div>
                        </div>
                        <a href="{{url('/profile')}}"><img width="50px" height="50px" src="./images/books/git.png" alt="image description"></a>

                    <?php

                    } else {
                    ?>
                        <select name="formal" onchange="javascript:handleSelect(this)">
                            <option value="./">Hello</option>
                            <option value="login">Login</option>
                            <option value="register">Register</option>
                        </select>

                        <script type="text/javascript">
                            function handleSelect(elm) {
                                window.location = elm.value;
                            }
                        </script>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="tg-navigationarea">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <nav id="tg-nav" class="tg-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                        <ul>
                            <li class="menu-item-has-children">
                                <a href="../public/category_book.blade.php1">All Categories</a>
                                <div class="mega-menu">
                                    <ul class="tg-themetabnav" role="tablist">
                                        @foreach ($allcategory as $item)
                                        <li class="menu-item-has-children-123" style="margin-left: 20px;">
                                            <a href="../public/category_book.blade.php{{ $item->id }}">{{$item->nameCategory}}</a>

                                        </li>
                                        @endforeach



                                    </ul>

                                </div>
                            </li>
                            <li class="menu-item-has-children-123" style="margin-left: 20px;">
                                <a href="index.blade.php">Home</a>

                            </li>
                            <li class="menu-item-has-children-123" style="margin-left: 20px;">
                                <a href="authors.blade.php">Authors</a>

                            </li>
                            <li style="margin-left: 20px;"><a href="./topSell">Best selling</a></li>

                            <li style="margin-left: 20px;"><a href="contactus.blade.php">Contact</a></li>

                            <li style="margin-left: 120px;"><a href="cart.blade.php"><span class="tg-themebadge">3</span>
                                    <i class="icon-cart"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
@show