<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request ,$product_id){

        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),

               ]);
               return response()->json(['success' => 'Successfully Added On Your Wishlist' ]);
            } else{
                return response()->json(['error' => 'This Product is Already on Your Wishlist' ]);

            } 

        }else{
            return response()->json(['error' => 'At First Login into Your Account' ]);
        }

    } // End Method 


    public function AllWishlist(){

        $list = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        $Qty = wishlist::count();

        return view('frontend.wishlist.view_wishlist',compact('Qty'));
        
    }// End Method 


    public function GetWishlistProduct(){

        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        $wishQty = wishlist::count(); 

        return response()->json(['wishlist'=> $wishlist, 'wishQty' => $wishQty]);

    }// End Method

    public function WishlistRemove($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Removed item' ]);
        }// End Method

}