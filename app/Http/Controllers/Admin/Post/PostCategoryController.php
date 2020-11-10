<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Model\Admin\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
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
    public function postCategory(){
           $postcats = PostCategory::all();
           return view('admin.post_category.post_category',[
                'postcats' => $postcats
           ]);
    }
    public function storePostCategory(Request $request){
           $this->validate($request,[
               'post_category_name_en' => 'required',
               'post_category_name_bn' => 'required',
           ]);
            $postcat = new PostCategory();
           $postcat->post_category_name_en = $request->post_category_name_en;
           $postcat->post_category_name_bn = $request->post_category_name_bn;
           $postcat->save();
           $notification = array(
            'message' => 'Post Category Successfully Added',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editPostCategory($id){
            $postcat = PostCategory::find($id);
            return view('admin.post_category.edit_post_category',[
                'postcat' => $postcat
            ]);
    }
    public function updatePostCategory(Request $request){
               $postcat = PostCategory::find($request->id);
               $postcat->post_category_name_en = $request->post_category_name_en;
               $postcat->post_category_name_bn = $request->post_category_name_bn;
               $postcat->update();
               $notification = array(
                'message' => 'Post Category Successfully Updated',
                'alert_type' => 'success'
            );
            return redirect()->route('post_category_form')->with($notification);
    }
    public function deletePostCategory($id){
               $postcat = PostCategory::find($id);
               $postcat->delete();
               $notification = array(
                'message' => 'Post Category Successfully Deleted',
                'alert_type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
}
