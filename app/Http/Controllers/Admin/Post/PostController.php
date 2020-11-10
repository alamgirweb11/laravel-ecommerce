<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Model\Admin\Post;
use App\Model\Admin\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
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
    public function post(){
          $postcats = PostCategory::all();
          return view('admin.posts.add_post_form',[
              'postcats' => $postcats
          ]);
    }
    public function storePost(Request $request){
           $post = new Post();
           $post->post_category_id = $request->post_category_id;
           $post->post_title_en = $request->post_title_en;
           $post->post_title_bn = $request->post_title_bn;
           $post->post_details_en = $request->post_details_en;
           $post->post_details_bn = $request->post_details_bn;
        //  image upload
        $image = $request->post_image;
        if($image){
             $image_update= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(400,200)->save('backend/media/posts/'.$image_update);
             $post->post_image = 'backend/media/posts/'.$image_update;
        }
           $post->save();
           $notification = array(
            'message' => 'Post Successfully Added',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function allPost(){
            $posts = Post::all();
            $posts = DB::table('posts')
            ->join('post_categories','posts.post_category_id','=','post_categories.id')
            ->select('posts.*','post_categories.post_category_name_en')
            ->get();
          //  return response()->json($posts);
           return view('admin.posts.all_posts',[
               'posts' => $posts
           ]);
    }
    
    public function editPost($id){
            $post = Post::find($id);
            $postcats = PostCategory::all();
            return view('admin.posts.edit_post',[
                'post' => $post,
                'postcats' => $postcats
            ]);
    }
    public function updatePost(Request $request){
              $post = Post::find($request->id);
              $post->post_category_id = $request->post_category_id;
              $post->post_title_en = $request->post_title_en;
              $post->post_title_bn = $request->post_title_bn;
              $post->post_details_en = $request->post_details_en;
              $post->post_details_bn = $request->post_details_bn;
              $image = $request->post_image;
              $oldImage = $request->old_image;
              if($image){
                   unlink($oldImage);
                   $image_update= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                   Image::make($image)->resize(400,200)->save('backend/media/posts/'.$image_update);
                   $post->post_image = 'backend/media/posts/'.$image_update;
              }
              $post->update();
              $notification = array(
                'message' => 'Post Successfully Updated',
                'alert_type' => 'success'
            );
            return redirect()->route('all_posts')->with($notification);
    }
    // delete post
    public function deletePost($id){
             $post = Post::find($id);
             $image = $post->post_image;
             unlink($image);
             $post->delete();
             $notification = array(
                'message' => 'Post Successfully Deleted',
                'alert_type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
}
