@extends('admin.admin_layouts')
@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="#">Dashboard</a>
    <span class="breadcrumb-item active">Product Section</span>
  </nav>
  <div class="sl-pagebody">
       <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Update Product</h6>
      <p class="mg-b-20 mg-sm-b-30">Product update form</p>
      <form action="{{ route('update.product') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="form-layout">
        <div class="row mg-b-25">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" required autofocus >
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_code" value="{{ $product->product_code}}" required autofocus >
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity }}" required autofocus >
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Discount Price <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price}}"  placeholder="Discount Price">
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
              <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                <option label="Choose Category"></option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'Selected' : ''}}>{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
              <select class="form-control select2" name="subcategory_id">
                @foreach($subcats as $subcat)
                <option value="{{ $subcat->id }}" {{ $product->subcategory_id == $subcat->id ? 'Selected' : ''}}>{{ $subcat->subcategory_name }}</option>
                @endforeach
              </select>
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
              <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                <option label="Choose Brand"></option>
                 @foreach($brands as $brand)
              <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'Selected' : ''}}>{{ $brand->brand_name }}</option>
                @endforeach 
              </select>
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
              <input class="form-control" type="text" name="product_size" value="{{ $product->product_size }}" id="size" data-role="tagsinput">
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
              <input class="form-control lg-4" type="text" name="product_color" value="{{ $product->product_color }}" data-role="tagsinput" id="color" >
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price}}"  placeholder="Selling Price">
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
               <textarea class="form-control" id="summernote" name="product_details" value="">
                {{ $product->product_details }}
               </textarea>
            </div>	
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
               <input class="form-control" placeholder="video link" name="video_link" value="{{ $product->video_link}}">
            </div>	
          </div> 
        </div><!-- row -->
        <div class="row mg-b-25">
            <div class="col-lg-8">
              <label style="display:block;" >Image One (main thumbnail)<span class="tx-danger">*</span></label>
              <label class="custom-file">
              <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this);"  accept="image">
              <input type="hidden" name="old_img_one" value="{{ $product->image_one }}">
              <span class="custom-file-control"></span>
              <img src="#" style="margin-top: 44px; margin-bottom: 125px;" id="img_one" alt="Select First">
              </label>
            </div>
              <div class="col-lg-4">
                <label style="display:block;"for="">Old Image1:</label>
               <img src="{{ asset($product->image_one)}}" style="height: 100px; width:100px;" alt="Image One">
            </div>


            <div class="col-lg-8">
              <label style="display:block;">Image Two<span class="tx-danger">*</span></label>
              <label class="custom-file">
              <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" accept="image">
              <input type="hidden" name="old_img_two" value="{{ $product->image_two }}">
              <span class="custom-file-control"></span>
              <img src="#" style="margin-top: 44px; margin-bottom: 125px;" id="img_two" alt="Select First">
            </label>
            </div>
            <div class="col-lg-4">
              <label style="display:block;"for="">Old Image2:</label>
             <img src="{{ asset($product->image_two)}}" style="height: 100px; width:100px;" alt="Image Two">
          </div>

 
            <div class="col-lg-8">
              <label style="display: block" >Image Three<span class="tx-danger">*</span></label>
              <label class="custom-file">
              <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);"  accept="image">
              <input type="hidden" name="old_img_three" value="{{ $product->image_three }}">
              <span class="custom-file-control"></span>
              <img src="#" style="margin-top: 44px; margin-bottom: 125px;" id="img_three" alt="Select First">
            </label>
            </div>
            <div class="col-lg-4">
              <label style="display:block;"for="">Old Image3:</label>
             <img src="{{ asset($product->image_three)}}" style="height: 100px; width:100px;" alt="Image |Three">
          </div>

        </div> <!-- end image row -->
        <br><br>
        <div class="row">
          <div class="col-lg-4">
            <label class="ckbox">
        <input type="checkbox" name="main_slider" value="1" {{ $product->main_slider == 1 ? 'Checked' : '' }}>
        <span>Main Slider</span>
      </label>
          </div>
          <div class="col-lg-4">
            <label class="ckbox">
        <input type="checkbox" name="hot_deals" value="1" {{ $product->hot_deals == 1 ? 'Checked' : '' }}>
        <span>Hot Deal</span>
      </label>
          </div>
          <div class="col-lg-4">
            <label class="ckbox">
        <input type="checkbox" name="best_rated" value="1" {{ $product->best_rated == 1 ? 'Checked' : '' }}>
        <span>Best Rated</span>
      </label>
          </div>
          <div class="col-lg-4">
            <label class="ckbox">
        <input type="checkbox" name="trend" value="1" {{ $product->trend == 1 ? 'Checked' : '' }}>
        <span>Trend Product</span>
      </label>
          </div>
          <div class="col-lg-4">
            <label class="ckbox">
        <input type="checkbox" name="mid_slider" value="1" {{ $product->mid_slider == 1 ? 'Checked' : '' }}>
        <span>Mid Slider</span>
      </label>
          </div>
          <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="hot_new" value="1" {{ $product->hot_new == 1 ? 'Checked' : '' }}>
              <span>Hot New</span>
            </label>
          </div>

          <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="buyone_getone" value="1" {{ $product->buyone_getone == 1 ? 'Checked' : '' }}>
              <span>Buy One Get One</span>
            </label>
          </div>

        </div>
        <input type="hidden" name="id" value="{{ $product->id }}">
        <br><br><hr>
        <div class="form-layout-footer">
          <button class="btn btn-info mg-r-5" type="submit">Submit </button>
        </div><!-- form-layout-footer -->
      </div><!-- form-layout -->
      </form>
    </div><!-- card -->
   
  </div><!-- sl-pagebody --> 
</div><!-- sl-mainpanel -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
{{-- subcategory show by ajax --}}
<script type="text/javascript">
  $(document).ready(function() {
       $('select[name="category_id"]').on('change', function(){
           var category_id = $(this).val();
           if(category_id) {
            //  alert(category_id);
               $.ajax({
                  url: "{{  url('/get/subcategory/') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                   success:function(data) {
                      var d =$('select[name="subcategory_id"]').empty();
                         $.each(data, function(key, value){

                             $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                         });

                   },
                  
                });
           } 
          //  else {
          //      alert('danger');
          //  }
       });
   });
</script>
{{-- show image script --}}
{{-- for image 1 --}}
<script type="text/javascript">
	function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#img_one')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(100);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
{{-- for image 2 --}}
<script type="text/javascript">
	function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#img_two')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(100);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
{{-- for image 3 --}}
<script type="text/javascript">
	function readURL3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#img_three')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(100);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
