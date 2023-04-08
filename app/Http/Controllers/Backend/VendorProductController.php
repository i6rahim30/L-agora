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
use Auth;

class VendorProductController extends Controller
{
    public function VendorAllProduct(){
        $id =Auth::user()->id;
        $products = Product::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.product.vendor_product_all',compact('products'));
    }//End Method

    ///////////api version
    public function VendorAllProductapi(){
        $id =Auth::user()->id;
        $products = Product::where('vendor_id',$id)->latest()->get();
       // Return the products as a JSON response
    return response()->json(['products' => $products]);
    }//End Method
    

    public function VendorAddProduct(){
        $brands = Brand::latest()->get();
        $catagory = Category::latest()->get();
         return view('vendor.backend.product.vendor_product_add',compact('brands','catagory'));
     }//End Method
     

     public function VendorAddProductAPI(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return response()->json([
            'brands' => $brands,
            'categories' => $categories
        ]);
    }


     public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
         return json_encode($subcat);
 
     }//End Method

     public function VendorStoreProduct(Request $request){

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
            'vendor_id' =>Auth::user()->id,
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
        return redirect()->route('vendor.all.product')->with($notification);

    }//End Method


     public function VendorStoreProductAPI(Request $request){

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
            'vendor_id' =>Auth::user()->id,
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

     return response()->json(['message' => 'Product added successfully.'], 201);

    }//End Method

    

    public function VendorEditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $catagory = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
         return view('vendor.backend.product.vendor_product_edit',compact('brands','catagory','products','subcategory','multiImgs'));
    }//End Method


    public function VendorEditProductAPI($id){
        $product = Product::find($id);
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return response()->json([
            'product' => $product,
            'multi_images' => $multiImgs,
            'brands' => $brands,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ], 200);
    }//End Method

    public function VendorUpdateProduct(Request $request){

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

            'status' => 1,
            'created_at' =>Carbon::now(),

        ]);

        $notification = array (
            'message' => 'Product Details Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('vendor.all.product')->with($notification);

    }//End Method


    public function VendorUpdateProductAPI(Request $request){

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

            'status' => 1,
            'created_at' =>Carbon::now(),

        ]);
        return response()->json([
            'message' => 'Product Details Updated Successfully'
        ], 200);

    }//End Method


    

    public function VendorUpdateProductThumbnail(Request $request){
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


    public function VendorUpdateProductThumbnailAPI(Request $request){
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

      return response()->json([
        'message' => 'Product Thumbnail Updated Successfully'
    ], 200);


    }//End Method

    //multi image update    
    public function VendorUpdateProductMultiimage(Request $request){
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


    public function VendorUpdateProductMultiimageAPI(Request $request){
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
        return response()->json([
            'message' => 'Product Images Updated Successfully'
        ], 200);
        
    }//End Method

    public function VendorStoreMultiImage(Request $request){
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


    public function VendorStoreMultiImageAPI(Request $request){
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
   
    return response()->json([
        'message' => 'Image Added Successfully'
    ], 200);
   }//End Method

   public function VendorMultiImageDelete($id){
    $oldlImg =MultiImg::findOrFail($id);
    unlink($oldlImg->photo_name);

    MultiImg::findOrFail($id)->delete();
    $notification = array (
        'message' => 'Image Deleted Successfully',
        'alert-type' => 'success' 
    );
    return redirect()->back()->with($notification);
}//End Method


   public function VendorMultiImageDeleteAPI($id){
    $oldlImg =MultiImg::findOrFail($id);
    unlink($oldlImg->photo_name);

    MultiImg::findOrFail($id)->delete();

    return response()->json([
        'message' => 'Image Deleted Successfully'
    ], 200);
}//End Method

public function VendorProductInactive($id){
    Product::findOrFail($id)->update(['status' =>0]);
    $notification = array (
        'message' => 'Product DeActiveated',
        'alert-type' => 'success' 
    );
    return redirect()->back()->with($notification);
}//End Method

public function VendorProductInactiveAPI($id){
    Product::findOrFail($id)->update(['status' =>0]);
    return response()->json([
        'message' => 'Product DeActiveated'
    ], 200);
}//End Method

public function VendorProductActive($id){
    Product::findOrFail($id)->update(['status' =>1]);
    $notification = array (
        'message' => 'Product Acticated',
        'alert-type' => 'success' 
    );
    return redirect()->back()->with($notification);
}//End Method

public function VendorProductActiveAPI($id){
    Product::findOrFail($id)->update(['status' =>1]);
    return response()->json([
        'message' => 'Product Activeated'
    ], 200);
}//End Method

public function VendorDeleteProduct($id){
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


public function VendorDeleteProductAPI($id){
    $product =Product::findOrFail($id);
    unlink($product ->product_thumbnail);
    Product::findOrFail($id)->delete();

    $images =MultiImg::where('product_id',$id)->get();
    foreach($images as $img) {
        unlink($img->photo_name);
        MultiImg::where('product_id',$id)->delete();
    };
    return response()->json([
        'message' => 'Product Deleted Successfully'
    ], 200);
}//end Method
}
