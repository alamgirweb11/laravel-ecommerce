<?php

namespace App\Http\Controllers\Admin\Newslatter;

use App\Http\Controllers\Controller;
use App\Model\Frontend\Newslatter;
use Illuminate\Http\Request;

class NewslatterController extends Controller
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
    public function showNewslatter(){
             $newslatters = Newslatter::all();
             return view('admin.newslatter.newslatter',[
                  'newslatters' => $newslatters
             ]);
    }
    public function deleteNewslatter($id){
               $data = Newslatter::find($id);
               $data->delete();
               $notification = array(
                'message' => 'Subcriber Successfully Deleted',
                'alert_type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
}
