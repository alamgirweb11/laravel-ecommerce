<?php

namespace App\Http\Controllers;

use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
     public function addWishList($id){
           $userId = Auth::id();
           $productId = $id;
          //  $checkWishList = WishList::where('user_id',$userId)->where('product_id',$productId)->first();
           $data = array(
                  'user_id' => $userId,
                  'product_id' => $productId,
           );
           $insertData = WishList::create($data);
          // if(Auth::check()){
               // if($checkWishList){
               //  $notification = array(
               //      'message' => 'This item already has your wishlist!',
               //      'alert_type' => 'error',
               //  );
               // return redirect()->back()->with($notification);
               // }else{
                    // $insertData = WishList::create($data);
                    // $notification = array(
                    //      'message' => 'This item add in your wishlist.',
                    //      'alert_type' => 'success',
                    //  );
                    //  return redirect()->back()->with($notification);
               // }
              
          // }else{
               // $notification = array(
               //      'message' => 'At First Login Your Account.',
               //      'alert_type' => 'error',
               //  ); 
               //  return redirect()->back()->with($notification);
          // }
     }
}
