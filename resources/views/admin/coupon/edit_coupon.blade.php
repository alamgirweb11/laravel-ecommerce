@extends('admin.admin_layouts')
@section('admin_content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Coupon Update</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Coupon Update </h6>
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
              <form action="{{ route('update_coupon') }}" method="POST">
                @csrf
             <div class="form-group">
               <label for="couponCode">Coupon Code</label>
               <input type="text" class="form-control" name="coupon" value="{{ $coupon->coupon }}" >
               </div>
             <div class="form-group">
               <label for="couponDiscount">Coupon Discount(%)</label>
               <input type="text" class="form-control" name="discount" value="{{ $coupon->discount }}" >
               </div>
               <input type="hidden" name="id" value="{{ $coupon->id }}">
              <button type="submit" class="btn btn-info pd-x-20 float-right">Update</button>
          </form>
        </div>
          </div>
        </div><!-- table-wrapper -->
      </div><!-- card -->
</div>

@endsection