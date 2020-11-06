<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brands;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function brand(){
          $brands = Brands::all();
          return view('admin.categories.brand.brand',[
                'brands' => $brands
          ]);
    }
    public function addBrand(Request $request){
            $this->validate($request,[
                'brand_name' => ['required','unique:brands','max:55'],
                'brand_logo' => 'required'
            ]);
            $brand = new Brands();
            $brand->brand_name = $request->brand_name;
            $brand->brand_logo = $this->imageUpload($request);
            $brand->save();
        //    return $brand;
        if($brand){
            $notification = array(
                'message' => 'Brand Successfully Added',
                'alert_type' => 'success'
            );
            return redirect('admin/brand')->with($notification);
        }else{
            $notification = array(
                'message' => 'Brand Not Added',
                'alert_type' => 'error'
            );
            return redirect('admin/brand')->with($notification); 
        }
    }
    public function editBrand($id){
             $brand = Brands::find($id);
             return view('admin.categories.brand.edit_brand',[
                'brand' => $brand
          ]);
    }
    public function updateBrand(Request $request){
             $this->validate($request,[
                'brand_name' => ['required','unique:brands','max:55'],
             ]);
             $brand = Brands::find($request->id);
             $brand->brand_name = $request->brand_name;
           if($request->file('brand_logo')){
                 unlink($brand->brand_logo);
                 $brand->brand_logo = $this->imageUpload($request);
           }
             $brand->update();
                $notification = array(
                    'message' => 'Brand Successfully Updated',
                    'alert_type' => 'success'
                );
                return redirect()->route('brand')->with($notification);
    }
    public function deleteBrand($id){
           $brand = Brands::find($id);
           $brand->delete();
           $notification = array(
              'message' => 'Brand Successfully Deleted',
              'alert_type' => 'success'
          );
          return redirect()->back()->with($notification);
    }
    protected function imageUpload($request){
        $file = $request->file('brand_logo');
        $imageName = $file->getClientOriginalName(); // getClientOrginalName is a built function 
        $directory = 'backend/media/brandLogo/'; // file path
        $imageUrl = $directory.$imageName;
       // file upload by using intervention image package
       Image::make($file)->resize(300, 400)->save($imageUrl);
        return $imageUrl;
     }
}
