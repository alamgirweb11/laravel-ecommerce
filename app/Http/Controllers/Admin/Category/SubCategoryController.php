<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
          /**
           * 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function subCategory(){
          $categories = DB::table('categories')->get();
        $subcats=DB::table('sub_categories')
    	       ->join('categories','sub_categories.category_id','=','categories.id')
    	       ->select('sub_categories.*','categories.category_name')
    	       ->get();
        return view('admin.categories.subCategory.sub_Category',[
            'categories' => $categories,
             'subcats' => $subcats
        ]);
    }
    public function addSubCategory(Request $request){
           $this->validate($request,[
                   'category_id' => 'required',
                   'subcategory_name' => 'required'
           ]);
           $data = new SubCategory();
           $data->category_id = $request->category_id;
           $data->subcategory_name = $request->subcategory_name;
           $data->save();
           // return $data;
           $notification = array(
            'message' => 'Sub-Category Added Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editSubCategory($id){
                 $subcat = SubCategory::find($id);
                 $categories = Category::all();
                 return view('admin.categories.subCategory.edit_sub_category',[
                     'subcat' => $subcat,
                     'categories' => $categories
                 ]);
    }
    public function updateSubCategory(Request $request){
              $subcat = SubCategory::find($request->id);
              $subcat->subcategory_name = $request->subcategory_name;
              $subcat->category_id = $request->category_id;
              $subcat->save();
              $notification = array(
                'message' => 'Sub-Category Updated Successfully',
                'alert_type' => 'success'
            );
            return redirect()->route('sub_Category')->with($notification);
    }
    public function deleteSubCategory($id){
          $subcat = SubCategory::find($id);
          $subcat->delete();
          $notification = array(
            'message' => 'Sub-Category Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
