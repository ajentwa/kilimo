<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\LogActivity;
use App\Models\Orders\Order;
use App\Models\Crops\Crop;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('is_approved',false)->get();

        return view('Orders.index', compact('orders'));

    }

    public function confirmedOrders()
    {
        $orders = Order::where('is_approved',true)->get();

        return view('Orders.confirmed', compact('orders'));
    }

    public function store()
    {
        $data = Input::all();

        Order::create($data);

        //log user Activity
        $varData = "Crop Id = " . $data['crop_id'] . "Quantity Ordered = " . $data['quantity_ordered'] . "Phone Number = " . $data['phone_no'];
        $varAction = "Inserted Order , " . $varData;
        LogActivity::addToLog('Insert', $varAction);

        return Redirect::back()->with('success', 'Order Successfully Created');
    }

    public function confirm($id)
    {
        $order = Order::find($id);

        $order->is_approved = 1;

        $order->update();

        $crop = Crop::find($order->crop->id);

        $crop->quantity_remained -= $order->quantity_ordered;

        $crop->update();

        //log user Activity
        $varData = "Crop Name = " . $order->crop->crop_name . " Quantity Ordered = " . $order->quantity_ordered . "Phone Number = " . $order->phone_no;
        $varAction = "Confirm Order where, ID =" . $order->id . " " . $varData;
        LogActivity::addToLog('Update', $varAction);

        return Redirect::back()->with('success', 'Order Successfully Confirmed!');
    }

    public function create($id)
    {
        $crop_id = $id;

        return view('Orders.create', compact('crop_id'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
