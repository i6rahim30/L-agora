<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDivison;
use App\Models\ShipState;
use App\Models\ShipDistricts;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Auth;
class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){

        $ship = ShipDistricts::where('division_id',$division_id)->orderby('district_name','ASC')->get();

        return json_encode($ship);

    }//end Method
    public function StateGetAjax($district_id){

        $ship = ShipState::where('district_id',$district_id)->orderby('state_name','ASC')->get();

        return json_encode($ship);

    }//end Method

    public function CheckoutStore(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['division_id'] = $request->division_id;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['district_id'] = $request->district_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['state_id'] = $request->state_id;
        $data['note'] = $request->note;
        $cartTotal = Cart::total();

        if ($request->payment_option == 'stripe') {
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }
        

    }//end Method
}
