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
                    <form class="form-inline my-2 my-lg-0" action='{{url('category/search')}}' method="POST">
                        @csrf
                        <input class="form-control mr-sm-2"   required type="search" placeholder="Search category" name="nameCategory" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="container">
            <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="productName">Name Category</label>
                    <input type="text" name="nameCategory" id="nameCategory" class="form-control" placeholder="name Category" aria-describedby="helpId" value="{{$category->nameCategory}}" required>
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