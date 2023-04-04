<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use DB;

class ReturnController extends Controller
{
    public function ReturnRequest(){
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.return_order.return_request',compact('orders'));
    }//end method
    
    public function ReturnRequestApprove($order_id){
        
        $product =OrderItem::where('order_id', $order_id)->get();
            foreach($product as $item){
                Product::where('id',$item->product_id)->update(['product_qty' => DB::raw('product_qty+'.$item->qty)]);
            }
        $orders = Order::where('id',$order_id)->update([
            'return_order' => 2,
        ]);
        $notification = array (
            'message' => 'Order Returned Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }//end method
    
    public function CompleteReturnRequest(){
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('backend.return_order.complete_return_request',compact('orders'));
    }//end method
    
}
