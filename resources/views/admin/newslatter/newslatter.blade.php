@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Newslatter Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Newslatter List
        <a class="btn btn-danger text-light float-right">All Delete</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Id</th>
                <th class="wd-15p">Subcriber Email</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($newslatters as $newslatter)
              <tr>
                <td>{{ $newslatter->id }}</td>
                <td>{{ $newslatter->email }}</td>
                <td>
                    <a href="{{ route('delete_newslatter',['id'=>$newslatter->id]) }}" class="btn btn-danger" id="delete">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
@endsection