<?php

namespace App\Http\Controllers;

use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WishListController extends Controller
{
     public function addWishList($id){
           $userId = Auth::id();
           $productId = $id;
           $checkWishList = WishList::where('user_id',$userId)->where('product_id',$productId)->first();
           $data = array(
                  'user_id' => $userId,
                  'product_id' => $productId,
           );
            if(Auth::check()){
               if($checkWishList){
                  // $notification = array(
                  //        'message' => 'Product already added in your wishlist!',
                  //        'alert-type' => 'error'
                  // );
                  // return response()->json()->with($notification);
                  $notification = array(
                        'message' => 'Product Successfully Added',
                        'alert_type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                  // return response()->json(['error'=>'Product already added in your wishlist!']);
                }else{
                      $insertData = WishList::create($data);
                  //     return response()->json(['success'=>'Product successfully added in wishlist.']);
                  $notification = array(
                        'message' => 'Product successfully added in wishlist.',
                        'alert-type' => 'success'
                 );
              return response()->json()->with($notification);
                }
              
         }else{
            //    return response()->json(['error'=>'At first login your account!']);
            $notification = array(
                  'message' => 'At first login your account!',
                  'alert-type' => 'info'
           );
        return Redirect()->back()->with($notification);
           }
     }
}
