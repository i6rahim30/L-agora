<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Auth;

class ReviewController extends Controller
{
   public function StoreReview(Request $request){
        $product = $request->product_id;
        $vendor = $request->hvendor_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->quality,
            'vendor_id' => $vendor,
            'created_at' => Carbon::now(),
        ]);
        $notification = array (
            'message' => 'Review Submitted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
   }//end method


   public function PendingReview(){
    $review = Review::where('status',0)->latest()->get();
    return view('backend.review.pending_review',compact('review'));
   }//end method

   public function ReviewApprove($id){
    Review::where('id',$id)->update([
        'status' => 1,
    ]);
    $notification = array (
        'message' => 'Review Approved Successfully',
        'alert-type' => 'success' 
    );
    return redirect()->back()->with($notification);
    }//end method

    public function PublishedReview(){
        $review = Review::where('status',1)->latest()->get();
        return view('backend.review.published_review',compact('review'));
    }//end method

    public function ReviewDelete($id){
        Review::where('id',$id)->delete();
            $notification = array (
                'message' => 'Review Deleted Successfully',
                'alert-type' => 'success' 
            );
            return redirect()->back()->with($notification);
    }//end method


    public function VendorAllReview(){
            $id = Auth::user()->id;
            $review = Review::where('status',1)->where('vendor_id',$id)->orderBy('id','DESC')->get();
            return view('vendor.backend.review.approve_review',compact('review'));
    }//end method


    public function VendorAllReviewAPI(){
            $id = Auth::user()->id;
            $review = Review::where('status',1)->where('vendor_id',$id)->orderBy('id','DESC')->get();
            return response()->json([
                'data' => $review
            ], 200);
    }//end method


}
