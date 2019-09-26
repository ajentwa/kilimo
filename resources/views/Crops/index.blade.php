@extends('layout.app')
@section('title','| Crops')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel x_panel_design">
            <div class="x_title">
                <h2>Crops List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_zone"
                            title="Create New Crop"><i class="fa fa-plus-circle"></i> Add New
                    </button>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-responsive table-sm" width="100%">
                    <thead>
                    <tr>
                        <th class="item_id">Id</th>
                        <th>Crop Name</th>
                        <th>Crop Quantity</th>
                        <th>Crop Unit</th>
                        <th>Crop Year</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($crops as $crop)
                        <tr>
                            <td class="item_id">{{$crop->id}}</td>
                            <td class="desc_name">{{$crop->crop_name}}</td>
                            <td>{{$crop->quantity_remained}}</td>
                            <td>{{$crop->unit->name}}</td>
                            <td>{{$crop->year->name}}</td>
                            <td style="width:14%">
                                <a href="{{url('crop/edit/'.$crop->id)}}" class="edit-btn">Edit</a> |
                                <a href="{{url('crop/delete/'.$crop->id)}}" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" role="dialog" id="create_zone" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('crop/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Create Crop</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="name" class="control-label">Crop Name</label>
                                <input type="text" id="name" name="crop_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label for="quantity" class="control-label">Crop Quantity</label>
                                <input type="text" id="quantity" name="quantity" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label" for="unit">Crop Unit</label>
                                <select class="form-control dd_select" name="unit_id" id="unit" required style="width: 100%">
                                    <option value="">---</option>
                                    @foreach ($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
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

    <!-- Edit Modal -->
    <div class="modal fade" role="dialog" id="edit_crop" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('crop/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Crop</strong></h4>
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

@stop

@section('Scripts')

    <script>
        $('.edit-btn').on('click', function (e) {
            e.preventDefault();
            var dataURL = $(this).attr('href');
            $('.modal-edit').load(dataURL, function () {
                $('#edit_crop').modal({show: true});
            });
        });

        $('#edit_crop').on('shown.bs.modal',function () {
           $('.dd_select').select2();
        });

        //For Deleting
        $(".delete-btn").click(function (e) {
            e.preventDefault();
            var CropName = $(this).closest('tr').children('td.desc_name').text().trim();

            Swal({
                title: 'Are you sure?',
                text: CropName + ' Will be Deleted!',
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

