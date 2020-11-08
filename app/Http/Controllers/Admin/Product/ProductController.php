<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
          /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addProduct(){
          $categories = DB::table('categories')->get();
          $brands = DB::table('brands')->get();
          return view('admin.product.add_product',[
                'categories' => $categories,
                'brands' => $brands
          ]);
    }
    
    public function allProduct(){
            // echo 'done';  
    }
//  collect subcategory by ajax
    public function subCategory($category_id){
             $subCat = DB::table('sub_categories')->where('category_id',$category_id)->get();
             return json_encode($subCat);
    }
//  store product 
   public function storeProduct(Request $request){
           $product = new Product();
           $product->category_id = $request->category_id;
           $product->subcategory_id = $request->subcategory_id;
           $product->brand_id = $request->brand_id;
           $product->product_name = $request->product_name;
           $product->product_code = $request->product_code;
           $product->product_quantity = $request->product_quantity;
           $product->product_details = $request->product_details;
           $product->product_color = $request->product_color;
           $product-> product_size= $request->product_size;
           $product->selling_price = $request->selling_price;
           $product->discount_price = $request->discount_price;
           $product->video_link = $request->video_link;
           $product->main_slider = $request->main_slider;
           $product->hot_deals = $request->hot_deals;
           $product->best_rated = $request->best_rated;
           $product->mid_slider = $request->mid_slider;
           $product->hot_new = $request->hot_new;
           $product->trend = $request->trend;
           $product->buyone_getone = $request->buyone_getone;
           $product->status = 1;
         // return $product;
         $image_one = $request->image_one;
         $image_two = $request->image_two;
         $image_three = $request->image_three;
      //     multiple image upload
         if($image_one && $image_two && $image_three){
            //     image one
               // hexdec(uniqid()) method use for create unique file name
               $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
               Image::make($image_one)->resize(300,300)->save('backend/media/products/'.$image_one_name);
               $product->image_one = 'backend/media/products/'.$image_one_name;
             // image two
               $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
               Image::make($image_two)->resize(300,300)->save('backend/media/products/'.$image_two_name);
               $product->image_two = 'backend/media/products/'.$image_two_name;
            // image three
               $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
               Image::make($image_three)->resize(300,300)->save('backend/media/products/'.$image_three_name);
               $product->image_three = 'backend/media/products/'.$image_three_name;
        
         }
         $product->save();
         $notification = array(
            'message' => 'Product Successfully Added',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
   }
}
