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
        $orders = Order::all();

        return view('Orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $data = Input::all();

        $order_exist = Order::where('phone_no', $data['phone_no'])->first();

        if (!$order_exist) {

            Order::create($data);

            //log user Activity
            $varData = "Crop Id = " . $data['crop_id']."Quantity Ordered = " . $data['quantity_ordered']."Phone Number = " . $data['phone_no'];
            $varAction = "Inserted Order , " . $varData;
            LogActivity::addToLog('Insert', $varAction);

            return Redirect::back()->with('success', 'Order Successfully Created');
        } else {
            return Redirect::back()->with('errors', 'Order Already Exist');
        }
    }

    public function confirm($id)
    {
        $data = Input::all();

        $order = Order::find($id);

        $order_exist = Order::where('quantity_ordered', $order->quantity_ordered)->where('is_approved', '!=', '0')->first();

        if (!$order_exist) {

            $order->is_approved = 1;

            $order->update($data);

            $crop = Crop::find($order->crop->id);

            $crop->quantity_remained -= $order->quantity_ordered;

            $crop->update($data);

        

            //log user Activity
            $varData = "Crop Name = " . $order->crop->crop_name." Quantity Ordered = " . $order->quantity_ordered."Phone Number = " . $order->phone_no;
            $varAction = "Confirm Order where, ID =" . $order->id . " " . $varData;
            LogActivity::addToLog('Update', $varAction);

            return Redirect::back()->with('success', 'Order Successfully Confirmed!');
        }else {
            return Redirect::back()->with('errors', 'Order Already Confirmed!');
        }
    }

    public function create($id)
    {
        $order = Order::find($id);

        return view('Orders.index', compact('order'));
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
