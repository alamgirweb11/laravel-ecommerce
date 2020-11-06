<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function category(){
           $categories = Category::all();
           return view('admin.categories.category.category',[
               'categories' => $categories
           ]);
    }
    public function storeCategory(Request $request){
          $this->validate($request,[
                'category_name' => ['required','unique:categories','max:55'],
          ]);
          $data = new Category();
          $data->category_name = $request->category_name;
          $data->save();
         // return $data;
         $notification = array(
             'message' => 'Category Added Successfully',
             'alert_type' => 'success'
         );
         return redirect()->back()->with($notification);
    }

    public function editCategory($id){
           $category = Category::find($id);
           return view('admin.categories.category.edit_category',[
                'category' => $category
           ]);
    }
    public function updateCategory(Request $request){
              $this->validate($request,[
                'category_name' => ['required','string']
              ]);
            $category = Category::find($request->id);
            $category->category_name = $request->category_name;
            $category->save();
    $notification = array(
        'message' => 'Category Successfully Updated',
        'alert_type' => 'success'
    );
    return redirect()->route('category')->with($notification);
     }

     public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        $notification = array(
          'message' => 'Category Successfully Deleted',
          'alert_type' => 'success'
      );
      return redirect()->route('category')->with($notification);
  }
}
