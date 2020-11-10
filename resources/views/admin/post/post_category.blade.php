@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Post Category Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Category List
        <a class="btn btn-dark text-light float-right" data-toggle="modal" data-target="#postCategoryModal">Add New</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Id</th>
                <th class="wd-15p">Category Name English</th>
                <th class="wd-15p">Category Name Bangla</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($postcats as $postcat)
              <tr>
                <td>{{ $postcat->id }}</td>
                <td>{{ $postcat->post_category_name_en }}</td>
                <td>{{ $postcat->post_category_name_bn }}</td>
                <td>
                    <a href="{{ route('edit_post_category',['id'=>$postcat->id]) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete_post_category',['id'=>$postcat->id]) }}" class="btn btn-danger" id="delete">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
      <!-- Modal -->
  <div id="postCategoryModal" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
      <div class="modal-content bd-0 tx-14">
        <div class="modal-header pd-y-20 pd-x-25">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Category</h6>
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
          <form action="{{ route('store.post_category') }}" method="POST">
            @csrf
            <div class="form-group row">
            <label for="categoryName">Post Category Name English</label>
            <input type="text" class="form-control" name="post_category_name_en" required autofocus >
            </div>
            <div class="form-group row">
            <label for="categoryName">Post Category Name Bangla</label>
            <input type="text" class="form-control" name="post_category_name_bn" required autofocus>
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