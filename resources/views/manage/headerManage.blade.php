@section('head')
<?php
$user = auth()->user();
if (isset($user)) {
    $role = $user->role;
    if ($role == 0) {
        return redirect()->to('./')->send();
    }
} else {
    return redirect()->to('./')->send();
}


?>

<div class="tg-middlecontainer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-10"> <strong class="tg-logo"><a href="index.blade.php"><img src="images/logo.png" alt="company name here"></a></strong></div>
                    <div class="col-md-2">
                        <?php
                        if (isset($user)) { ?>
                            <a href="./dashboard"><img width="50px" height="50px" src="./images/books/git.png" alt="image description"></a>
                            <select name="formal" onchange="javascript:handleSelect(this)">
                                <option value="#">{{$user->name}}</option>
                                <option value="dashboard">Profile</option>
                                <option value="logout">Logout</option>
                            </select>

                            <script type="text/javascript">
                                function handleSelect(elm) {
                                    window.location = elm.value;
                                }
                            </script>
                        <?php

                        } else {
                        ?>
                            <a href="{{url('/login')}}"><img width="50px" height="50px" src="./images/books/git.png" alt="image description"></a>
                        <?php
                            echo 'Login';
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


</div>

@show