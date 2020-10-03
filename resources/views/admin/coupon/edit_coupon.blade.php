@extends('admin.layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Category</a>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupon Update</h6>
          
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form method="post" action="{{ url('update/coupon/'.$coupon->id) }}">
            @csrf
            <div class="modal-body pd-25">
               <div class="form-group">
                  <label>Coupon Code</label>
                  <input type="text" class="form-control" id="coupon" aria-describedby="coupon" value=" {{$coupon->coupon}} " name="coupon">
                </div>
                <div class="form-group">
                  <label>Discount (%)</label>
                  <input type="text" class="form-control" id="discount" aria-describedby="discount" value=" {{$coupon->discount}}" name="discount">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info pd-x-20">Update</button>
            </div>
          </form>
        </div><!-- card -->
      </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection