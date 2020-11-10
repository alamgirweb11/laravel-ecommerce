@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="#">Dashboard</a>
    <span class="breadcrumb-item active">Product Section</span>
  </nav>
  <div class="sl-pagebody">
       <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title pb-2">Product Details</h6>
      <div class="form-layout">
        <div class="row mg-b-25">
             <table class="table table-responsive table-hover">
                <tr> <th>Product Name</th> <td>{{ $product->product_name }}</td></tr>
                <tr> <th>Category</th> <td>{{ $product->category_name }}</td></tr>
                <tr> <th>Sub-Category</th> <td>{{ $product->subcategory_name }}</td></tr>
                <tr> <th>Brand</th> <td>{{ $product->brand_name }}</td></tr>
                <tr> <th>Size</th> <td>{{ $product->product_size }}</td></tr>
                <tr> <th>Color</th> <td>{{ $product->product_color }}</td></tr>
                <tr> <th>Selling Price</th> <td>{{ $product->selling_price}}</td></tr>
                <tr> <th>Discount Price</th> <td>{{ $product->discount_price}}</td></tr>
                <tr> <th>Quantity</th> <td>{{ $product->product_quantity }}</td></tr>
                <tr> <th>Details</th> <td>{{ $product->product_details }}</td></tr>
                <tr> <th>Image-1</th> <td><img src="{{ asset($product->image_one) }}" style="height:100px; width:100px;" alt="Image One"></td></tr>
                <tr> <th>Image-2</th> <td><img src="{{ asset($product->image_two) }}" style="height:100px; width:100px;" alt="Image Two"></td></tr>
                <tr> <th>Image-3</th> <td><img src="{{ asset($product->image_three) }}" style="height:100px; width:100px;" alt="Image Three"></td></tr>
                <tr> <th>Hot-deals</th> <td>{{ $product->hot_deals == 1 ? 'Active' : 'Deactive' }}</td></tr>
                <tr> <th>Main-Slider</th> <td>{{ $product->main_slider == 1 ? 'Active' : 'Deactive' }}</td></tr>
                <tr> <th>Mid-Slider</th> <td>{{ $product->mid_slider == 1 ? 'Active' : 'Deactive' }}</td></tr>
                <tr> <th>Trend</th> <td>{{ $product->trend == 1 ? 'Active' : 'Deactive' }}</td></tr>
                <tr> <th>Best-rated</th> <td>{{ $product->best_rated == 1 ? 'Active' : 'Deactive' }}</td></tr>
                <tr> <th>Hot-new</th> <td>{{ $product->hot_new == 1 ? 'Active' : 'Deactive' }}</td></tr>
                <tr> <th>Buy One Get One</th> <td>{{ $product->buyone_getone == 1 ? 'Active' : 'Deactive' }}</td></tr>
             </table>
          </div>
    </div><!-- card -->
   
  </div><!-- sl-pagebody --> 
</div><!-- sl-mainpanel -->

@endsection
