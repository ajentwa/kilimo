<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kilimo</title>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<section id="topnavbar" class=" bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a class="navbar-brand text-warning text-capitalize" href="{{url('/')}}"> kilimo.com</a>
            </div>
            <div class="col-md-6 pt-2">
                <form action="">
                    <div class="input-group search_form">
                                <span class="input-group-btn first_btn">
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                                                type="button">Products</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">maize</a>
                                            <a class="dropdown-item" href="#">maize</a>
                                            <a class="dropdown-item" href="#">maize</a>
                                            <a class="dropdown-item" href="#">maize</a>
                                        </div>
                                    </div>
                                </span>
                        <input type="text" class="form-control" placeholder="What are you looking for...">
                        <span class="input-group-btn second_btn">
                                    <button type="button" class="btn btn-warning text-white">Search</button>
                                </span>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <ul class="nav pt-0 mt-0">
                    <li class="nav-item">
                        <a href="login.html" class="nav-link text-dark"><i class="fa fa-fw fa-user fa-myuser"></i>
                            <small class="d-inline-block">Sign in<br>Join Free</small></a>
                    </li>
                    <li class="nav-item">
                        <a href="login.html" class="nav-link text-dark"><i class="fa fa-fw fa-book"></i> <br><small>Order</small></a>
                    </li>
                    <li class="nav-item">
                        <a href="login.html" class="nav-link text-dark"><i class="fa fa-fw fa-heart"></i> <br><small>Favourite</small></a>
                    </li>
                    <li class="nav-item">
                        <a href="login.html" class="nav-link text-dark"><i class="fa fa-fw fa-shopping-cart"></i>
                            <br><small>Cart</small></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-sm navbar-light bg-white menu">
    <div class="container-fluid">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav2"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNav2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-reorder"></i> Categories
                    </a>
                    <div class="dropdown-menu">
                        <a href="profile.html" class="dropdown-item">
                            <i class="fa fa-gear"></i> Food Products
                        </a>
                        <a href="settings.html" class="dropdown-item">
                            <i class="fa fa-gear"></i> Selling Product
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#addUserModal" href="#">| &nbsp; Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#userLoginModal" href="#">Login</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Membership
                    </a>
                    <div class="dropdown-menu">
                        <a href="profile.html" class="dropdown-item">
                            <i class="fa fa-gear"></i> kilimo
                        </a>
                        <a href="settings.html" class="dropdown-item">
                            <i class="fa fa-gear"></i> kilimo
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item pl-2"><a class="nav-link" href="{{url('crops_details')}}">Get the Crops</a></li>
                <li class="nav-item pr-2"><a class="nav-link" href="#">|&nbsp; English</a></li>
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        USD
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-gear"></i> kilimo
                        </a>
                        <a href="s#" class="dropdown-item">
                            <i class="fa fa-gear"></i> kilimo
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- MAIN -->
<section id="main">

    @include('layout.errors')
    @include('layout.success')

    <div class="container-fluid bg-white text-dark py-3 my-3">
        <div class="row">
            @foreach ($crops as $crop)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img style="height: 200px; width: 100%; display: block;"
                             src="{{asset('assets/img/maize1.jpg')}}" alt="Card image">
                        <ul class="list-group">
                            <li class="list-group-item">Crop Name: {{$crop->crop_name}}</li>
                            <li class="list-group-item">
                                Farmer: {{$crop->farmer->first_name.' '.$crop->farmer->surname}}</li>
                            <li class="list-group-item">
                                Quantity: {{$crop->quantity_remained}} {{$crop->unit->name}}</li>
                            <li class="list-group-item">Phone no: {{$crop->farmer->phone_no}}</li>
                        </ul>
                        <p><a class="btn btn-primary btn-block" href="{{url('order/create/'.$crop->id)}}">Order</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- CREATE ORDER -->
    <div class="modal fade" role="dialog" id="edit_crop" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('order/store')}}" method="post">
                    @csrf
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Create Order</strong></h4>
                    </div>
                    <div class="modal-body modal-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function clearMsg() {
            $('.msg').hide();
        }
        $(window).load(function () {
            setTimeout(clearMsg, 3000);
        });
    </script>
    <script>
        $('.btn-block').on('click', function (e) {
            e.preventDefault();
            const dataURL = $(this).attr('href');
            $('.modal-edit').load(dataURL, function () {
                $('#edit_crop').modal({show: true});
            });
        });
    </script>
</section>
</body>
</html>
