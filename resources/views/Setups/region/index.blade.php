@extends('layout.app')
@section('title','| Regions')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel x_panel_design">
            <div class="x_title">
                <h2>Regions List</h2>
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
                        <th>Region Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td class="item_id">{{$region->id}}</td>
                            <td class="desc_name">{{$region->name}}</td>
                            <td width="25%">
                                <a href="{{url('region/edit/'.$region->id)}}"
                                   class="edit-btn">Edit</a> |
                                <a href="{{url('region/delete/'.$region->id)}}"
                                   class="delete-btn">Delete</a> |
                                <a href="{{url('district/index/'.$region->id)}}"
                                   class="btn-white">Districts</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="create_zone" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('region/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Create Region</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="control-label col-md-3 col-sm-12 col-xs-12">Region Name</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="name" name="name" class="form-control" required>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="edit_region" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">


                <form action="{{url('region/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Region</strong></h4>
                    </div>
                    <div class="modal-body">

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
                $('#edit_region').modal({show: true});
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

