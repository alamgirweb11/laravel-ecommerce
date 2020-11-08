<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
