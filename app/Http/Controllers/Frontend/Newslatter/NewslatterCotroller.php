<?php

namespace App\Http\Controllers\Frontend\Newslatter;

use App\Http\Controllers\Controller;
use App\Model\Frontend\Newslatter;
use Illuminate\Http\Request;

class NewslatterCotroller extends Controller
{
     public function storeNewslatter(Request $request){
           $this->validate($request,[
                 'email' => ['required','unique:newslatters','max:60']
           ]);
           $data = new Newslatter();
           $data->email = $request->email;
           $data->save();
           $notification = array(
            'message' => 'Thanks for subcribing',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
         }
     }
