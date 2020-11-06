@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Brand Update</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand Update </h6>
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
              <form action="{{ route('update_brand') }}" method="POST" enctype="multipart/form-data">
                @csrf
             <div class="form-group row">
               <label for="brandName">Brand Name</label>
               <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}" >
               </div>
            
             <div class="form-group row">
               <label for="brandLogo">Choose New Logo</label>
               <input type="file" class="form-control" name="brand_logo" value="{{ $brand->brand_logo }}" >
               </div>

             <div class="form-group row">
               <label for="brandLogo">Old Logo</label>
              <img src="{{ asset($brand->brand_logo) }}" style="height: 60px; width: 70px;" alt="Old Logo">
               </div>

            </div>
               <input type="hidden" name="id" value="{{ $brand->id }}">
              <button type="submit" class="btn btn-info pd-x-20 float-right">Update</button>
          </form>
        </div>
          </div>
        </div><!-- table-wrapper -->
      </div><!-- card -->
</div>

@endsection