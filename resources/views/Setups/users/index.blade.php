@extends('layout.app')
@section('title','| Users')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel x_panel_design">
            <div class="x_title">
                <h2>Users List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_zone"
                            title="Create New Region"><i class="fa fa-plus-circle"></i> Add New
                    </button>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-responsive table-sm" width="100%">
                    <thead>
                    <tr>
                        <th class="item_id">Id</th>
                        <th>Full name</th>
                        <th>Phone number</th>
                        <th>Region</th>
                        <th>District</th>
                        <th>Ward</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td class="item_id">{{$user->id}}</td>
                            <td class="desc_name">{{$user->first_name." ".$user->middle_name." ".$user->surname}}</td>
                            <td class="desc_name">{{$user->phone_no}}</td>
                            <td class="desc_name">{{$user->ward->district->region->name}}</td>
                            <td class="desc_name">{{$user->ward->district->name}}</td>
                            <td class="desc_name">{{$user->ward->name}}</td>
                            <td style="width: 12%">
                                <a href="{{url('users/edit/'.$user->id)}}" class="edit-btn">Edit</a> |
                                <a href="{{url('users/delete/'.$user->id)}}" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create User -->
    <div class="modal fade" tabindex="-1" role="dialog" id="create_zone" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('users/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Create User</strong></h4>
                    </div>
                   <div class="modal-body">
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
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User -->
    <div class="modal fade" role="dialog" id="edit_user" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('users/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit User</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                            value="{{$user->first_name}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control"
                                    value="{{$user->middle_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname" id="surname" class="form-control"
                                       value="{{$user->surname}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone number</label>
                                <input type="text" name="phone_no" id="phone" class="form-control"
                                       value="{{$user->phone_no}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{$user->email}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="ward">Ward</label>
                                <select class="form-control" name="ward_id" id="ward" required>
                                <option value="{{$user->ward_id}}">{{$user->ward['name']}}</option>
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
                                       value="{{$user->password}}" required>
                            </div>
                            <div class="col-md-6"></div>
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

@stop

@section('Scripts')

    <script>
        $('.edit-btn').on('click', function (e) {
            e.preventDefault();
            var dataURL = $(this).attr('href');
            $('.modal-body').load(dataURL, function () {
                $('#edit_user').modal({show: true});
            });
        });
        //For Deleting
        $(".delete-btn").click(function (e) {
            e.preventDefault();
            var RegionName = $(this).closest('tr').children('td.desc_name').text().trim();

            Swal({
                title: 'Are you sure?',
                text: RegionName + ' Will be Deleted!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
                confirmButtonColor: "#DD6B55"
            }).then((result) => {
                if (result.value) {

                    var Url = $(this).attr('href');
                    $(location).attr('href', Url);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                }
            })
        });
    </script>
@stop

