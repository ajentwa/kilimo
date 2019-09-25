@extends('layout.app')
@section('title','| Confirmed Orders')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel x_panel_design">
            <div class="x_title">
                <h2>Confirmed Orders List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-responsive table-sm" width="100%">
                    <thead>
                    <tr>
                        <th class="item_id">Id</th>
                        <th>Crop Name</th>
                        <th>Quantity Ordered</th>
                        <th>Phone Number</th>
                        <th>Confirmed Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="item_id">{{$order->id}}</td>
                            <td class="desc_name">{{$order->crop->crop_name}}</td>
                            <td>{{$order->quantity_ordered}}</td>
                            <td>{{$order->phone_no}}</td>
                            <td>{{date('d M Y',strtotime($order->created_at))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
