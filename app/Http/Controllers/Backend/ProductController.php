<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\MultiImg;
use Image;
use Carbon\Carbon;



class ProductController extends Controller
{
    public function AllProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_all',compact('products'));
    }//End Method

    public function AddProduct(){
       $brands = Brand::latest()->get();
       $catagory = Category::latest()->get();
       $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();   
        return view('backend.product.product_add',compact('brands','catagory','activeVendor'));
    }//End Method

    public function StoreProduct(Request $request){

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thumbnail/'.$name_gen);
        $save_url='upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,

            'product_qty' =>$request->product_qty,
            'product_tages' =>$request->product_tages,
            'product_color' =>$request->product_color,
            'product_size' =>$request->product_size,

            'selling_price' =>$request->selling_price,
            'discount_price' =>$request->discount_price,
            'short_descp' =>$request->short_descp,
            'long_descp' =>$request->long_descp,
            
            'hot_deals' =>$request->hot_deals,
            'featured' =>$request->featured,
            'special_offer' =>$request->special_offer,
            'special_deals' =>$request->special_deals,

            'product_thumbnail' => $save_url,
            'vendor_id' =>$request->vendor_id,
            'status' => 1,
            'created_at' =>Carbon::now(),

        ]);

        //multi image upload ////

        $images = $request->file('multi_imgs');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        
        $uploadPath = 'upload/products/multi-image/'. $make_name;


        MultiImg::insert([
            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' =>Carbon::now(),
        ]);
    }//End For each

// End Multi image upload ////

        $notification = array (
            'message' => 'Product Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.product')->with($notification);

    }//End Method

    public function EditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $catagory = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
         return view('backend.product.product_edit',compact('brands','catagory','activeVendor','products','subcategory','multiImgs'));
    }//End Method

    public function UpdateProduct(Request $request){

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,

            'product_qty' =>$request->product_qty,
            'product_tages' =>$request->product_tages,
            'product_color' =>$request->product_color,
            'product_size' =>$request->product_size,

            'selling_price' =>$request->selling_price,
            'discount_price' =>$request->discount_price,
            'short_descp' =>$request->short_descp,
            'long_descp' =>$request->long_descp,
            
            'hot_deals' =>$request->hot_deals,
            'featured' =>$request->featured,
            'special_offer' =>$request->special_offer,
            'special_deals' =>$request->special_deals,

            'vendor_id' =>$request->vendor_id,
            'status' => 1,
            'created_at' =>Carbon::now(),

        ]);

        $notification = array (
            'message' => 'Product Details Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.product')->with($notification);

    }//End Method

    public function UpdateProductThumbnail(Request $request){
        $pro_id = $request->id;
        $oldImage= $request->old_img;

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thumbnail/'.$name_gen);
        $save_url='upload/products/thumbnail/'.$name_gen;

        if (file_exists($oldImage)) {
            unlink($oldImage);
         }
        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array (
            'message' => 'Product ThumbNail Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);


    }//End Method


    //multi image update    
    public function UpdateProductmMultiimage(Request $request){
        $imgs =$request->multi_imgs;

        foreach($imgs as $id => $img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'. $make_name;

            MultiImg::where('id',$id)->update([
                'photo_name'=> $uploadPath,
                'updated_at'=>Carbon::now(),
            ]);

        }//end foreach
        $notification = array (
            'message' => 'Product Images Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
        
    }//End Method

    public function MultiImageDelete($id){
        $oldlImg =MultiImg::findOrFail($id);
        unlink($oldlImg->photo_name);

        MultiImg::findOrFail($id)->delete();
        $notification = array (
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }//End Method

    public function StoreMultiImage(Request $request){
         //multi image upload ////
        $product_id=$request->id;
         $images = $request->file('multi_imgs');
         foreach($images as $img){
             $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
             Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
         
         $uploadPath = 'upload/products/multi-image/'. $make_name;
 
 
         MultiImg::insert([
            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' =>Carbon::now(),
         ]);
     }//End For each
     $notification = array (
        'message' => 'Image Added Successfully',
        'alert-type' => 'success' 
    );
    return redirect()->back()->with($notification);
    }//End Method

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' =>0]);
        $notification = array (
            'message' => 'Product DeActicated',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }//End Method

    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' =>1]);
        $notification = array (
            'message' => 'Product Acticated',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }//End Method

    public function DeleteProduct($id){
        $product =Product::findOrFail($id);
        unlink($product ->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images =MultiImg::where('product_id',$id)->get();
        foreach($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        };
        $notification = array (
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }//end Method

    public function ProductStock(){
        $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));   
     }//end Method
}

