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

        <!-- Xuất thông báo -->
        @include('manage.headerLevel2')
        <div class="container">
            <div class="he" style="margin-top: 20px; margin-bottom: 30px;">
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
                            <input class="form-control mr-sm-2"   required type="search" placeholder="Search author" name="nameAuthor" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
            <table class="table">
                <thead>
                    <td>ID</td>
                    <td style="width: 50px;">Author Photo</td>
                    <td>Author Name</td>
                    {{-- create --}}
                </thead>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id }}</td>
                    <td><img src="{{url('images/author')}}/{{$item->image}}" class="img-fluid" alt="..."></td>
                    <td>{{ $item->nameAuthor}}</td>
                    <td>
                        {{-- update --}}

                        <form action='{{route('author.edit',$item->id)}}' method="GET">
                            <button type="submit" class="btn btn-info">Update </button>
                        </form>

                        {{-- delete --}}
                        <form action="{{route('author.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>