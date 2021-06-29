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
        background-image: url('../images/books/show.jpg');
    }
</style>

<body>
    <div class="container">
        <!-- Form thêm sản phẩm -->
        @include('manage.headerLevel2')
        <div class="container" style="margin-top: 20px; margin-bottom: 20px">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success') }}
                </div>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../book">Books</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-6 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="../author">Authors</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="../category">Category</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="../managecarts">Orders</a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="../manageusers">Users</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action='{{url('author/search')}}' method="POST">
                        @csrf
                        <input class="form-control mr-sm-2" required type="search" placeholder="Search author" name="nameAuthor" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <form action="{{route('author.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productPhoto">PublishedBooks</label>
                            <input type="number" name="publishedBooks" id="publishedBooks" class="form-control" placeholder="publishedBooks" aria-describedby="helpId" value="1" min="1" max="1000000" required>
                        </div>
                        <div class="form-group">
                            <label for="productName">Name Author</label>
                            <input type="text" name="nameAuthor" id="nameAuthor" class="form-control" placeholder="name Author" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Author description</label>
                            <textarea type="text" name="authorDes" id="authorDes" class="form-control" placeholder="Author Description" aria-describedby="helpId" required></textarea>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productName">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control" placeholder="facebook" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="productName">Twitter</label>
                            <input type="text" name="twitter" id="twitter" class="form-control" placeholder="twitter" aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Image</label>
                            <input type="file" name="authorPhoto" id="authorPhoto" class="form-control" placeholder="author Photo" aria-describedby="helpId" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Add author</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>