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
           $checkWishList = WishList::where('user_id',$userId)->where('product_id',$productId)->first();
           $data = array(
                  'user_id' => $userId,
                  'product_id' => $productId,
           );
            if(Auth::check()){
               if($checkWishList){
               return response()->json(['error'=>'Product already added in your wishlist!']);
                }else{
                      $insertData = WishList::create($data);
                      return response()->json(['success'=>'Product successfully added in wishlist.']);
                }
              
         }else{
               return response()->json(['error'=>'At first login your account!']);
           }
     }
}
