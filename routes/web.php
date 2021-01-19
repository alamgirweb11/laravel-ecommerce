<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
        return view('frontend.pages.home');
});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@authLogin')->name('auth.login');
Route::get('/home', 'HomeController@authRegister')->name('auth.register');
Route::get('/profile', 'HomeController@userProfile')->name('user.profile');
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
// admin==============
// product section start
Route::get('admin/add/product','Admin\Product\ProductController@addProduct')->name('add_product');
Route::get('admin/all/product','Admin\Product\ProductController@allProduct')->name('all_product');
Route::post('admin/store/product','Admin\Product\ProductController@storeProduct')->name('store_product');
Route::get('deactive/product/{id}','Admin\Product\ProductController@deactiveProduct')->name('deactive.product');
Route::get('active/product/{id}','Admin\Product\ProductController@activeProduct')->name('active.product');
Route::get('delete/product/{id}','Admin\Product\ProductController@deleteProduct')->name('delete.product');
Route::get('view/product/{id}','Admin\Product\ProductController@viewProduct')->name('view.product');
Route::get('edit/product/{id}','Admin\Product\ProductController@editProduct')->name('edit.product');
Route::post('update/product','Admin\Product\ProductController@updateProduct')->name('update.product');
// get sub-category by ajax
Route::get('get/subcategory/{category_id}','Admin\Product\ProductController@subCategory');
// admin===========
// post category section 
Route::get('admin/post_category','Admin\Post\PostCategoryController@postCategory')->name('post_category_form');
Route::post('admin/add/post_category','Admin\Post\PostCategoryController@storePostCategory')->name('store.post_category');
Route::get('admin/edit/post_category/{id}','Admin\Post\PostCategoryController@editPostCategory')->name('edit_post_category');
Route::post('admin/update/post_category','Admin\Post\PostCategoryController@updatePostCategory')->name('update.post_category');
Route::get('admin/delete/post_category/{id}','Admin\Post\PostCategoryController@deletePostCategory')->name('delete_post_category');
// admin============
// post section 
Route::get('admin/post','Admin\Post\PostController@post')->name('add_post_form');
Route::post('admin/add/post','Admin\Post\PostController@storePost')->name('store.post');
Route::get('admin/all/post','Admin\Post\PostController@allPost')->name('all_posts');
Route::get('admin/edit/post/{id}','Admin\Post\PostController@editPost')->name('edit_post');
Route::post('admin/update/post','Admin\Post\PostController@updatePost')->name('update_post');
Route::get('admin/delete/post/{id}','Admin\Post\PostController@deletePost')->name('delete_post');


//  frontend============
// newslatter section start
Route::post('store/newslatter','Frontend\Newslatter\NewslatterCotroller@storeNewslatter')->name('store.newslatter');
// wishlist 
Route::get('add/wishlist/{id}', 'WishListController@addWishList');