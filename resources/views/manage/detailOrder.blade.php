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
    @include('manage.headerLevel2')
    <div class="container" style="margin-top: 30px">
        @include('flash-message')
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
                <form class="form-inline my-2 my-lg-0" action="../searchorder" method="get">
                    @csrf
                    <input class="form-control mr-sm-2"   required   type="search" placeholder="Search id cart" name="idCart" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="data" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-8">
                    <h5>Orders_id: {{$orders[0]->orders_id}}</h5>
                    <h5>Email: {{$orders[0]->email}}</h5>
                    <h5>Name: {{$orders[0]->name}}</h5>
                    <h5>Phone number: {{$orders[0]->phone}}</h5>
                </div>
                <div class="col-md-4">
                    <h5>Address: {{$orders[0]->address}}</h5>
                    <h5>Created_at: {{$orders[0]->created_at}}</h5>
                    <h5>Status: {{$orders[0]->status}}</h5>
                    <h5>Total + ( 30k): {{$orders[0]->total+30}}.000VND</h5>
                </div>

            </div>

        </div>
        <div class="set" style="margin-top: 15px;">
            <table class="table">
                <thead>
                    <td>Preview</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td></td>
                    {{-- create --}}
                </thead>


                @foreach ($orders as $item)
                <tr>
                    <td><a href="{{route('book.edit',$item->idBook)}}"><img width="60" height="80" src="{{url('images/books')}}/{{$item->image}}" class="img-fluid" alt="..."></a></td>
                    <td>{{ $item->nameBook}}</td>
                    <td>{{ $item->price}}.000VND</td>
                    <td>{{$item->qty}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>