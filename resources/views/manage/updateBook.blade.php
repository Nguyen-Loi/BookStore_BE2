<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
    body {
        background-image: url('../../images/books/show.jpg');
    }
</style>
<body>
    <div class="container">
        <!-- Form thêm sản phẩm -->
        @include('manage.headerLevel3')
        <div class="container" style="margin-top: 20px;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../../book">Books</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="../../author">Authors</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="../../category">Category</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="../../managecarts">Orders</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="../../manageusers">Users</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action='{{url('book/search')}}' method="POST">
                    @csrf
                    <input class="form-control mr-sm-2"   required type="search" placeholder="Search book" name="nameBook" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                </div>
            </nav>
        </div>
        <div class="container">
            <form method="POST" action="{{route('book.update',$oldBook->idBook)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- id to update --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productName">Name book</label>
                            <input value="{{$oldBook->nameBook}}" type="text" name="bookName" id="bookName" class="form-control" placeholder="Name Book" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Book description</label>
                            <textarea type="text" name="bookDes" id="bookDes" class="form-control" placeholder="Book Description" aria-describedby="helpId" required>{{$oldBook->Description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <select name="author" id="author">
                                @foreach ($authors as $author)
                                @if ($oldBook->idAuthor == $author->id)
                                <option selected value="{{$author->id}}">{{$author->nameAuthor}}</option>
                                @else
                                <option value="{{$author->id}}">{{$author->nameAuthor}}</option>
                                @endif;
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories">Category</label>
                            <select name="categories" id="categories">
                                @foreach ($categories as $cate)
                                @if ($oldBook->idCategory == $cate->id)
                                <option selected value="{{$cate->id}}">{{$cate->nameCategory}}</option>
                                @else
                                <option value="{{$cate->id}}">{{$cate->nameCategory}}</option>
                                @endif;
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Book price</label>
                            <input value="{{$oldBook->price}}" type="number" name="bookPrice" id="bookPrice" class="form-control" placeholder="book Price" aria-describedby="helpId" value="1000" required>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Sale price</label>
                            <input value="{{$oldBook->salePrice}}" type="number" name="salePrice" id="salePrice" class="form-control" placeholder="sale Price" aria-describedby="helpId" value="1000" required>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="productPhoto">Rate</label>
                            <input value="{{$oldBook->rate}}" type="number" name="bookRate" id="bookRate" class="form-control" placeholder="Rate" aria-describedby="helpId" min="1" max="5" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Book Sold</label>
                            <input value="{{$oldBook->SoldBooks}}" type="number" name="bookSold" id="bookSold" class="form-control" placeholder="BookSold" aria-describedby="helpId" min="1" max="100000" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Quantity</label>
                            <input value="{{$oldBook->Quantity}}" type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" aria-describedby="helpId" min="1" max="1000" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Feature</label>
                            <input value="{{$oldBook->Feature}}" type="number" name="feature" id="feature" class="form-control" placeholder="Feature" aria-describedby="helpId" min="0" max="1" value="0" required>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Book Image</label>
                            <input type="file" name="bookPhoto" id="bookPhoto" class="form-control" aria-describedby="helpId" value="{{url('images/books')}}/{{$oldBook->image}}.jpg" required>
                            <img src="{{url('images/books')}}/{{$oldBook->image}}" width="150">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>