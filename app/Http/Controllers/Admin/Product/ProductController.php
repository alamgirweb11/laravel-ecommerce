<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brands;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\SubCategory;
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
            $products = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->get();
         // return response()->json($products);
         return view('admin.product.all_product',[
            'products' => $products
         ]);
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
   // deactive product
   public function deactiveProduct($id){
          $product = Product::find($id);
          $product->status = 2;
          $product->save();
          $notification = array(
            'message' => 'Product Successfully Deactived',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
   }
   //  active product
   public function activeProduct($id){
          $product = Product::find($id);
          $product->status = 1;
          $product->save();
          $notification = array(
            'message' => 'Product Successfully Actived',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
   }
   // delete product
   public function deleteProduct($id){
           $product = Product::find($id);
           $image1 = $product->image_one;
           $image2 = $product->image_two;
           $image3 = $product->image_three;
           unlink($image1);
           unlink($image2);
           unlink($image3);
           $product->delete();
           $notification = array(
            'message' => 'Product Successfully Deleted',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
   }
   // view product
   public function viewProduct($id){
      $product = DB::table('products')
      ->join('categories','products.category_id','=','categories.id')
      ->join('brands','products.brand_id','=','brands.id')
      ->join('sub_categories','products.subcategory_id','=','sub_categories.id')
      ->select('products.*','categories.category_name','brands.brand_name','sub_categories.subcategory_name')
       ->where('products.id',$id)->first();
      // print_r($products);
       return view('admin.product.view_product',[
          'product' => $product
       ]);
   }
   // product edit form show
   public function editProduct($id){
            $product = Product::find($id);
            $categories = Category::all();
            $brands = Brands::all();
            $subcats = SubCategory::all();
            // return response()->json($product);
             return view('admin.product.edit_product',[
                'product' => $product,
                'categories' => $categories,
                'brands' => $brands,
                'subcats' => $subcats
             ]);
   }
   // update prouduct 
   public function updateProduct(Request $request){
               // echo "Work Fine";
               $product = Product::find($request->id);
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
               // image update
               // catch the hidden data for delete from directory
               $old_img_one = $request->old_img_one;
               $old_img_two = $request->old_img_two;
               $old_img_three = $request->old_img_three;
               // catch the file input name for update image
               $image_one = $request->image_one;
               $image_two = $request->image_two;
               $image_three = $request->image_three;
               if($image_one){
                      unlink($old_img_one);
                      $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                      Image::make($image_one)->resize(300,300)->save('backend/media/products/'.$image_one_name);
                      $product->image_one = 'backend/media/products/'.$image_one_name;
               }
               if($image_two){
                  unlink($old_img_two);
                  $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                   Image::make($image_two)->resize(300,300)->save('backend/media/products/'.$image_two_name);
                   $product->image_two = 'backend/media/products/'.$image_two_name;
               }
              if($image_three){
                 unlink($old_img_three);
                  $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                  Image::make($image_three)->resize(300,300)->save('backend/media/products/'.$image_three_name);
                   $product->image_three = 'backend/media/products/'.$image_three_name;               
              }
               $product->update();
                  $notification = array(
                     'message' => 'Product Successfully Updated',
                     'alert_type' => 'success'
                 );
                 return redirect()->route('all_product')->with($notification);       
   }
}
