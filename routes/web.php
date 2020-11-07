<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
        return view('frontend.pages.home');
});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// admin======
// category section start
Route::get('admin/category','Admin\Category\CategoryController@category')->name('category');
Route::post('admin/store/category','Admin\Category\CategoryController@storeCategory')->name('store.category');
Route::get('admin/edit/{id}','Admin\Category\CategoryController@editCategory')->name('edit_category');
Route::post('admin/category','Admin\Category\CategoryController@updateCategory')->name('update_category');
Route::get('admin/delete/category/{id}','Admin\Category\CategoryController@deleteCategory')->name('delete_category');
// category setion end


// admin ====
// sub category section start
Route::get('admin/subcat','Admin\Category\SubCategoryController@subCategory')->name('sub_Category');
Route::post('admin/add/subcat','Admin\Category\SubCategoryController@addSubCategory')->name('add_subCategory');
Route::get('admin/edit/subcat/{id}','Admin\Category\SubCategoryController@editSubCategory')->name('edit_subCategory');
Route::post('admin/update/subcat','Admin\Category\SubCategoryController@updateSubCategory')->name('update_sub_category');
Route::get('admin/delete/subcat/{id}','Admin\Category\SubCategoryController@deleteSubCategory')->name('delete_sub_category');


// admin====
// brand section start
Route::get('admin/brand','Admin\Category\BrandController@brand')->name('brand');
Route::post('admin/add/brand','Admin\Category\BrandController@addBrand')->name('add_brand');
Route::get('admin/edit/brand/{id}','Admin\Category\BrandController@editBrand')->name('edit_brand');
Route::post('admin/brand','Admin\Category\BrandController@updateBrand')->name('update_brand');
Route::get('admin/delete/{id}','Admin\Category\BrandController@deleteBrand')->name('delete_brand');

// admin=== 
// coupon section strat
Route::get('admin/coupon','Admin\Coupon\CouponCotroller@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon','Admin\Coupon\CouponCotroller@storeCoupon')->name('store.coupon');
Route::get('admin/edit/coupon/{id}','Admin\Coupon\CouponCotroller@editCoupon')->name('edit_coupon');
Route::post('admin/update/coupon','Admin\Coupon\CouponCotroller@updateCoupon')->name('update_coupon');
Route::get('admin/delete/coupon/{id}','Admin\Coupon\CouponCotroller@deleteCoupon')->name('delete_coupon');

// admin =============
// newslatter section start
Route::get('admin/newslatter','Admin\Newslatter\NewslatterController@showNewslatter')->name('admin.newslatter');
Route::get('admin/delete/newslatter/{id}','Admin\Newslatter\NewslatterController@deleteNewslatter')->name('delete_newslatter');


//  frontend============
// newslatter section start
Route::post('store/newslatter','Frontend\Newslatter\NewslatterCotroller@storeNewslatter')->name('store.newslatter');