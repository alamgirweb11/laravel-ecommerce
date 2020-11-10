@extends('admin.admin_layouts')
@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="#">Dashboard</a>
    <span class="breadcrumb-item active">Post Section</span>
  </nav>
  <div class="sl-pagebody">
       <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Update Post</h6>
      <p class="mg-b-20 mg-sm-b-30">Edit post form</p>
      <form action="{{ route('update_post') }} " method="post" enctype="multipart/form-data">
        @csrf
      <div class="form-layout">
        <div class="row mg-b-25">
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Post Title English: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="post_title_en" value="{{ $post->post_title_en }}" required autofocus >
            </div>
          </div><!-- col-4 -->
         
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Post Title Bangla: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="post_title_bn"  value="{{ $post->post_title_bn }}" required autofocus >
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Post Category: <span class="tx-danger">*</span></label>
              <select class="form-control select2" data-placeholder="Choose Category" name="post_category_id">
                <option label="Choose Category"></option>
                @foreach($postcats as $postcat)
              <option value="{{ $postcat->id }}" {{ $post->post_category_id == $postcat->id ? 'selected' : '' }}>{{ $postcat->post_category_name_en }}</option>
                @endforeach
              </select>
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">Post Details English<span class="tx-danger">*</span></label>
               <textarea class="form-control" id="summernote" name="post_details_en" >
                 {{ $post->post_details_en}}
               </textarea>
            </div>	
          </div>
          
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">Post Details Bangla<span class="tx-danger">*</span></label>
               <textarea class="form-control" id="summernote1" name="post_details_bn">
                {{ $post->post_details_bn}}
               </textarea>
            </div>	
          </div>

          <div class="col-lg-4">
            <label style="display: block">Post Image<span class="tx-danger">*</span></label>
            <label class="custom-file">
            <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" required="" accept="image">
            <input type="hidden" name="old_image" value="{{ $post->post_image }}">
            <span class="custom-file-control"></span>
            <img style=" margin-right: 35px;" src="#" id="image" >
            </label>
          </div>
          <div class="col">
            <label style="display:block;"for="">Old Image:</label>
           <img src="{{ asset($post->post_image)}}" style="height: 100px; width:100px;" alt="Empty">
        </div>
        </div><!-- row -->
        </div>
        <input type="hidden" name="id" value="{{ $post->id }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
{{-- show image script --}}
{{-- for image --}}
<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(100)
                  .height(100);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
