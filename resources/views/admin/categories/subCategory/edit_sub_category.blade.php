@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Sub-Category Update</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Sub-Category Update </h6>
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
              <form action="{{ route('update_sub_category') }}" method="POST">
                @csrf
             <div class="form-group">
               <label for="subCategoryName">Sub-Category Name</label>
               <input type="text" class="form-control" name="subcategory_name" value="{{ $subcat->subcategory_name }}" autofocus>
               </div>
               <div class="form-group">
                <label for="categoryName">Category Name</label>
                <select name="category_id"class="form-control">
                 @foreach ($categories as $category)
                     <option value="{{ $category->id }}" {{ $category->id == $subcat->category_id ? 'selected' : '' }}>
                      {{ $category->category_name }}</option>
                 @endforeach
                </select>
                </div>
               <input type="hidden" name="id" value="{{ $subcat->id }}">
              <button type="submit" class="btn btn-info pd-x-20 float-right">Update</button>
          </form>
        </div>
          </div>
        </div><!-- table-wrapper -->
      </div><!-- card -->
</div>

@endsection