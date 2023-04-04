<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Notification;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){

        $user = User::where('role','admin')->get();

        if(Session::has('coupon')){
            $total_amount =Session::get('coupon')['total_amount'];
        }else{
            $total_amount=round(Cart::total());
        }

        \Stripe\Stripe::setApiKey('sk_test_51MfpWzHRKvdjyiom5AVgpffOAVHUzLj4eu6tNsWAXHjTcHVAZlSbzQJeZBuQ2ji3qkLcbSaiySunobFb6Y4tsaG000bLLMMfv9');
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' =>  $total_amount*100,
        'currency' => 'usd',
        'description' => 'Lagora',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

        $order_id=Order::insertGetId([
            'user_id' =>Auth::id(),
            'division_id' =>$request->division_id,
            'district_id'=>$request->district_id,
            'state_id'=>$request->state_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'notes'=>$request->note,

            'payment_type'=>$charge->payment_method,
            'payment_method'=>'Stripe',
            'transaction_id'=>$charge->balance_transaction,
            'currency'=>$charge->currency,
            'amount'=>$total_amount,
            'order_number'=>$charge->metadata->order_id,
            'invoice_no'=>'LIN'.mt_rand(10000000,99999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),

            'status'=>'pending',
            'created_at'=>Carbon::now(),
        ]);

        // start send email

        $invoice = Order::findOrFail($order_id);

        $data=[
            'invoice_no' =>$invoice->invoice_no,
            'amount' =>$total_amount,
            'name' =>$invoice->name,
            'email' =>$invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        // end send email

        $carts =Cart::content();
        foreach($carts as $cart){
            OrderItem::insert([
                'order_id'=>$order_id,
                'product_id'=>$cart->id,
                'vendor_id'=>$cart->options->vendor,
                'color'=>$cart->options->color,
                'size'=>$cart->options->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),
            ]);
        }//end foreach

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array (
            'message' => 'Order Placed Successfully',
            'alert-type' => 'success' 
        );
        
        Notification::send($user, new OrderComplete($request->name));
        return redirect()->route('user.order.page')->with($notification);

        

    }//end Method

    public function CashOrder(Request $request){

        $user = User::where('role','admin')->get();

        if(Session::has('coupon')){
            $total_amount =Session::get('coupon')['total_amount'];
        }else{
            $total_amount=round(Cart::total());
        }

        $order_id=Order::insertGetId([
            'user_id' =>Auth::id(),
            'division_id' =>$request->division_id,
            'district_id'=>$request->district_id,
            'state_id'=>$request->state_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'notes'=>$request->note,

            'payment_type'=>'Cash On Delivery',
            'payment_method'=>'Cash',
            'currency'=>'Lyd',
            'amount'=>$total_amount,

            'invoice_no'=>'LIN'.mt_rand(10000000,99999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),

            'status'=>'pending',
            'created_at'=>Carbon::now(),
        ]);

        // start send email

        $invoice = Order::findOrFail($order_id);

        $data=[
            'invoice_no' =>$invoice->invoice_no,
            'amount' =>$total_amount,
            'name' =>$invoice->name,
            'email' =>$invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        // end send email

        $carts =Cart::content();
        foreach($carts as $cart){
            OrderItem::insert([
                'order_id'=>$order_id,
                'product_id'=>$cart->id,
                'vendor_id'=>$cart->options->vendor,
                'color'=>$cart->options->color,
                'size'=>$cart->options->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),
            ]);
        }//end foreach

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array (
            'message' => 'Order Placed Successfully',
            'alert-type' => 'success' 
        );

        
        Notification::send($user, new OrderComplete($request->name));
        return redirect()->route('user.order.page')->with($notification);

        

    }//end Method
}
