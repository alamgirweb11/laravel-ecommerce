@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Products Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Products List</h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Product Id</th>
                <th class="wd-15p">Name</th>
                <th class="wd-15p">Category</th>
                <th class="wd-15p">Brand</th>
                <th class="wd-15p">Image</th>
                <th class="wd-15p">Price</th>
                <th class="wd-15p">Quantity</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->brand_name }}</td>
                <td><img src="{{ asset($product->image_one) }}" style="height: 50px; width:50px" alt="Image"></td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->product_quantity }}</td>
                <td>
                    @if($product->status == 1)
                    <span class="badge badge-success" style="padding: 10px; font-size:14px">Active</span>
                    @else 
                    <span class="badge badge-warning" style="padding: 10px; font-size:14px">Deactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('edit.product',['id'=>$product->id]) }}" class="btn btn-info"><i class="fa fa-edit" title="Edit"></i></a>
                    <a href="{{ route('view.product',['id'=>$product->id]) }}" class="btn btn-dark"><i class="fa fa-eye" title="View"></i></a>
                    <a href="{{ route('delete.product',['id'=>$product->id]) }}" class="btn btn-danger" id="delete"><i class=" fa fa-trash" title="Delete"></i></a>
                    @if($product->status == 1)
                    <a href="{{ route('deactive.product',['id'=>$product->id]) }}" class="btn btn-success"><i class=" fa fa-thumbs-up" title="Deactive"></i></a>
                    @else
                    <a href="{{ route('active.product',['id'=>$product->id]) }}" class="btn btn-warning"><i class=" fa fa-thumbs-down" title="Active"></i></a>
                    @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
@endsection