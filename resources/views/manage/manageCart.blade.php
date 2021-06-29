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
        background-image: url('./images/books/show.jpg');
    }
</style>
<body>
    @include('manage.headerManage')
    <div class="container" style="margin-top: 30px">
        @include('flash-message')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="./book">Books</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                        <a class="nav-link" href="./author">Authors</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="./category">Category</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="./managecarts">Orders</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="./manageusers">Users</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="./searchorder" method="get">
                    @csrf
                    <input class="form-control mr-sm-2"   required type="search" placeholder="Search id cart" name="idCart" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="dropbtn">Filter order</button>
                    <div class="dropdown-content">
                        <a href="./managecarts">All</a>
                        <a href="./sortByPending">Pending</a>
                        <a href="./sortByTrasport">Trasporting</a>
                        <a href="./sortByConfirm">Confirmed</a>
                        <a href="./sortByCancel">Canceled</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="set" style="margin-top: 15px;">
            <table class="table">
                <thead>
                    <td>ID order</td>
                    <td>Email</td>
                    <td>Status</td>
                    <td style="width: 150px;">Created_at</td>
                    <td>Total</td>
                    <td>Detail</td>
                    <td></td>
                    {{-- create --}}
                </thead>


                @foreach ($orders as $item)
                <tr>
                    <form action="updateorder" method="POST">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        @csrf
                        <td>{{ $item->id}}</td>
                        <td><a href="{{url('/getuser')}}/{{$item->user_id}}">{{$item->email}}</a></td>
                        <td>
                            <select name="status" id="status">
                                <option value="{{ $item->status}}">{{ $item->status}}</option>
                                <option value="Transpoting">Transpot</option>
                                <option value="Confirmed">Confirm</option>
                                <option value="Canceled">Cancel</option>
                            </select>

                        </td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->total}}.000VND</td>
                        <td><a href="{{url('/detailorder')}}/{{$item->id}}">Detail</a></td>
                        <td>
                            {{-- update --}}

                            <button type="submit" class="btn btn-primary">Update</button>
                        </td>

                    </form>
                </tr>
                @endforeach
            </table>
        </div>
        <span>{{$orders->links('pagination::bootstrap-4')}}</span>
    </div>
</body>

</html>
<style>
    /* Dropdown Button */
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>