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
        @include('manage.headerLevel2')

        <div class="container" style="margin-top: 10px;">
            @include('flash-message')
            <div class="container" style="margin-bottom: 20px;">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="../book">Books</a>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
                        <form class="form-inline my-2 my-lg-0" action="../searchUser" method="get">
                            @csrf
                            <input class="form-control mr-sm-2"   required type="search" placeholder="Search user" name="nameUser" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
            <form action="../updateuser" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$users['id']}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productPhoto">Id user</label>
                            <input type="text" disabled class="form-control" placeholder="id" aria-describedby="helpId" value="1" min="1" max="1000000" value="{{$users->id}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name user" aria-describedby="helpId" value="{{$users->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email user" aria-describedby="helpId" value="{{$users->email}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone user" aria-describedby="helpId" value="{{$users->phone}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" aria-describedby="helpId" value="{{$users->address}}" required>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Created_at</label>
                            <input type="text" name="created_at" id="created_at" class="form-control" aria-describedby="helpId" value="{{$users->created_at}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Updated_at</label>
                            <input type="text" name="updated_at" id="updated_at" class="form-control" aria-describedby="helpId" value="{{$users->updated_at}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="productPhoto">Role</label>
                            <input type="number" min="0" max="1" name="role" id="role" class="form-control" aria-describedby="helpId" value="{{$users->role}}" required>
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