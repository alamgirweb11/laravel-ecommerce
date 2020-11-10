@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Posts Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Posts List</h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Post Id</th>
                <th class="wd-15p">Post Category</th>
                <th class="wd-15p">Post Title</th>
                <th class="wd-15p">Image</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->post_category_name_en }}</td>
                <td>{{ $post->post_title_en }}</td>
                <td><img src="{{ asset($post->post_image) }}" style="height: 50px; width:50px" alt="Image"></td>
                <td>
                     <a href="{{ route('edit_post',['id'=>$post->id]) }}" class="btn btn-info"><i class="fa fa-edit" title="Edit"></i></a>
                    <a href="{{ route('delete_post',['id'=>$post->id]) }}" class="btn btn-danger" id="delete"><i class=" fa fa-trash" title="Delete"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
@endsection