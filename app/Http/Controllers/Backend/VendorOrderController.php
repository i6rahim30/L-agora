<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use DB;

class VendorOrderController extends Controller
{
    public function VendorOrder(){
        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return view('vendor.backend.orders.pending_orders',compact('orderitem'));
    }//end method 

    public function VendorReturnOrder(){
        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return view('vendor.backend.orders.return_orders',compact('orderitem'));

    }
    
    public function VendorCompleteReturnOrder(){

        $id = Auth::user()->id;
        $orderitem =OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return view('vendor.backend.orders.complete_return_orders',compact('orderitem'));

    }

    public function VendorOrderDetails($order_id){

        $order =Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('vendor.backend.orders.vendor_order_details', compact('order','orderItem'));

    }
    
    public function PendingToConfirm($order_id){

        $product =OrderItem::where('order_id', $order_id)->get();
            foreach($product as $item){
                Product::where('id',$item->product_id)->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
            }
        Order::findOrFail($order_id)->update([
            'status' => 'confirmed',
        ]);

        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }//end Method
}
