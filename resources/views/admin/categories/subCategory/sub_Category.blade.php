@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Sub-Category Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Sub-Category List
        <a class="btn btn-dark text-light float-right" data-toggle="modal" data-target="#categoryModal">Add New</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
              <th class="wd-15p">ID</th>
              <th class="wd-15p">Sub-Category Name</th>
              <th class="wd-15p">Category Name</th>
              <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subcats as $subcat)
              <tr>
                  <td>{{ $subcat->id}}</td>
                  <td>{{ $subcat->subcategory_name }}</td>
                  <td>{{ $subcat->category_name }}</td>
                <td>
                    <a href="{{ route('edit_subCategory',['id'=>$subcat->id]) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete_sub_category',['id'=>$subcat->id]) }}" class="btn btn-danger" id="delete">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
      <!-- Modal -->
  <div id="categoryModal" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
      <div class="modal-content bd-0 tx-14">
        <div class="modal-header pd-y-20 pd-x-25">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Sub-Category</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
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
          <form action="{{ route('add_subCategory') }}" method="POST">
            @csrf
         <div class="form-group">
           <label for="categoryName">Sub-Category Name</label>
           <input type="text" class="form-control" name="subcategory_name" required autofocus>
           </div>
           <div class="form-group">
            <label for="categoryName">Category Name</label>
            <select name="category_id"class="form-control">
             @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->category_name }}</option>
             @endforeach
            </select>
            </div>
           <div class="modal-footer">
            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
          </div>
           </form>
        </div>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->
@endsection