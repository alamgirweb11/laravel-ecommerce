@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Post Category Update</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Category Update </h6>
        <div class="table-wrapper">
             {{-- show error message for sql query --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class="modal-body pd-25">
              <form action="{{ route('update.post_category') }}" method="POST">
                @csrf
             <div class="form-group row">
               <label for="categoryName">Post Category Name English</label>
               <input type="text" class="form-control" name="post_category_name_en" value="{{ $postcat->post_category_name_en }}" >
               </div>
             <div class="form-group row">
               <label for="categoryName">Post Category Name Bangla</label>
               <input type="text" class="form-control" name="post_category_name_bn" value="{{ $postcat->post_category_name_bn }}" >
               </div>
               <input type="hidden" name="id" value="{{ $postcat->id }}">
              <button type="submit" class="btn btn-info pd-x-20 float-right">Update</button>
          </form>
        </div>
          </div>
        </div><!-- table-wrapper -->
      </div><!-- card -->
</div>

@endsection