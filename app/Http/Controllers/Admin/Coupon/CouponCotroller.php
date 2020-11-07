<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Model\Admin\Coupon;
use Illuminate\Http\Request;

class CouponCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function Coupon(){
        $coupons = Coupon::all();
        return view('admin.coupon.coupon',[
             'coupons' => $coupons
        ]);
    }
    public function storeCoupon(Request $request){
              $this->validate($request,[
                  'coupon' => ['required','unique:coupons','max:55'],
                  'discount' => ['required']
              ]);
              $coupon = new Coupon();
              $coupon->coupon = $request->coupon;
              $coupon->discount = $request->discount;
              $coupon->save();
              $notification = array(
                'message' => 'Coupon Code Added Successfully',
                'alert_type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
    public function editCoupon($id){
             $coupon = Coupon::find($id);
             return view('admin.coupon.edit_coupon',[
                  'coupon' => $coupon
             ]);
    }
    public function updateCoupon(Request $request){
                 $this->validate($request,[
                        'coupon' => 'required',
                        'discount' => 'required',
                 ]);
                 $coupon = Coupon::find($request->id);
                 $coupon->coupon = $request->coupon;
                 $coupon->discount = $request->discount;
                 $coupon->update();
                 $notification = array(
                    'message' => 'Coupon Code Successfully Updated',
                    'alert_type' => 'success'
                );
                return redirect()->route('admin.coupon')->with($notification);
    }
    public function deleteCoupon($id){
            $coupon = Coupon::find($id);
            $coupon->delete();
            $notification = array(
                'message' => 'Coupon Code Successfully Deleted',
                'alert_type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
}
