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
                        <img style="height: 200px; width: 100%; display: block;" src="{{asset('assets/img/maize1.jpg')}}" alt="Card image">
                        <ul class="list-group">
                            <li class="list-group-item">Crop Name: {{$crop->crop_name}}</li>
                            <li class="list-group-item">Farmer: {{$crop->farmer->first_name.' '.$crop->farmer->surname}}</li>
                            <li class="list-group-item">Quantity: {{$crop->quantity_remained}} {{$crop->unit->name}}</li>
                            <li class="list-group-item">Phone no: {{$crop->farmer->phone_no}}</li>
                        </ul>
                        <p><a class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_crop" href="{{url('order/create/'.$crop->id)}}">Order</a></p>
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
                        <div class="form-group">
                            <input type="hidden" name="crop_id" value="{{$crop->id}}">
                            <label for="quantity">Crop Quantity</label>
                            <input type="text" name="quantity_ordered" id="quantity" class="form-control" placeholder="Enter Crop Quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone Number</label>
                            <input type="text" name="phone_no" id="phone_no" class="form-control"placeholder="Enter Phone Number">
                        </div>
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


    
    {{-- <div class="modal fade" id="create_order">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('order/store/'.$crop->id)}}" method="post" autocomplete="off">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Create Order</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Create Order</strong></h4>
                    </div>
                    <div class="modal-body modal-edit">
                        <div class="form-group">
                            <input type="hidden" name="crop_id" value="{{$crop->id}}">
                            <label for="quantity">Crop Quantity</label>
                            <input type="text" name="quantity_ordered" id="quantity" class="form-control" placeholder="Enter Crop Quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone Number</label>
                            <input type="text" name="phone_no" id="phone_no" class="form-control"placeholder="Enter Phone Number">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> close
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- USER REGISTRATION MODAL -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('register')}}" method="post" autocomplete="off">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Farmer registration</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                       placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control"
                                       placeholder="Enter middle name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname" id="surname" class="form-control"
                                       placeholder="Enter surname" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone number</label>
                                <input type="text" name="phone_no" id="phone" class="form-control"
                                       placeholder="Enter phone number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Enter email address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="region">Region</label>
                                <select class="form-control dd_select" name="region_id" id="region" required>
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="district">District</label>
                                <select class="form-control" name="district_id" id="district" required>
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="ward">Ward</label>
                                <select class="form-control" name="ward_id" id="ward" required>
                                    <option value="">Select Ward</option>
                                    @foreach ($wards as $ward)
                                        <option value="{{$ward->id}}">{{$ward->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Enter your password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                       class="form-control" placeholder="Confirm your password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> close
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- USER LOGIN MODAL -->
    <div class="modal fade" id="userLoginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('login')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Farmer Login</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body pt-4">
                        @csrf
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lg text-primary fa-user"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lg text-primary fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.edit-btn').on('click', function (e) {
            e.preventDefault();
            var dataURL = $(this).attr('href');
            $('.modal-edit').load(dataURL, function () {
                $('#edit_crop').modal({show: true});
            });
        });
    </script>
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

        //Populating the district
        $('#region').on('change', function () {
            var regionID = $(this).val();
            alert(regionID);
            $.ajax({
                url: '{{url('/ajax/district/')}}',
                type: "GET",
                data: {region_id: regionID},
                dataType: "json",
                success: function (data) {
                    var district = $('#district');
                    district.empty();
                    district.append('<option value="">Select District</option>');
                    $.each(data, function (key, value) {
                        $('#district').append('<option value="' + key + '">' + value + '</option>');
                    });

                }
            });
        });

        //Populating Wards
        $('#district').on('change', function () {
            var districtID = $(this).val();

            alert(districtID);
            $.ajax({
                url: '{{url('/ajax/ward/')}}',
                type: "GET",
                data: {district_id: districtID},
                dataType: "json",
                success: function (data) {
                    var ward_id = $('#ward');
                    ward_id.empty();
                    ward_id.append('<option value="">Select Ward</option>');
                    $.each(data, function (key, value) {
                        $('#ward').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

    </script>
</section>
</body>
</html>
