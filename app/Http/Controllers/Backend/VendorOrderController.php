<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class VendorOrderController extends Controller
{
    public function VendorOrder(){
        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return view('vendor.backend.orders.pending_orders',compact('orderitem'));
    }//end method 

    public function VendorOrderAPI(){
        $id = Auth::user()->id;
        $orderitem = OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return response()->json([
        'data' => $orderitem
    ], 200);
    }//end method 

    public function VendorReturnOrder(){
        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return view('vendor.backend.orders.return_orders',compact('orderitem'));
    }//end method 


    public function VendorReturnOrderAPI(){
        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return response()->json([
            'data' => $orderitem
        ], 200);
    }//end method 
    
    public function VendorCompleteReturnOrder(){

        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return view('vendor.backend.orders.complete_return_orders',compact('orderitem'));

    }//end method 

    public function VendorCompleteReturnOrderAPI(){

        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return response()->json([
            'data' => $orderitem
        ], 200);

    }//end method 

    public function VendorOrderDetails($order_id){

        $order =Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('vendor.backend.orders.vendor_order_details', compact('order','orderItem'));

    }//end method 

    public function VendorOrderDetailsAPI($order_id){

        $order =Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return response()->json([
        'order' => $order,
        'order_items' => $orderItem ], 200);

    }//end method 
}
