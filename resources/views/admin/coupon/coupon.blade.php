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
          <h6 class="card-body-title">
          Coupon List
          <a href="" class="btn btn-success btn-sm" style="float: right;" data-toggle="modal" data-target="#modaldemo1">Add New</a>
      	  </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Coupon Code</th>
                  <th class="wd-15p">Discount</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($coupon as $key=>$row)
                <tr>
                  <td> {{$key +1}} </td>
                  <td> {{$row->coupon}} </td>
                  <td> {{$row->discount}}%</td>
                  <td>
                  	<a href="{{ URL::to('edit/coupon/'.$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  	<a href="{{ URL::to('delete/coupon/'.$row->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

 <!-- BASIC MODAL -->
<div id="modaldemo1" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
    	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

      <form method="post" action="{{ route('store.coupons') }}">
      	@csrf
      <div class="modal-header pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupon Add</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-25">
         <div class="form-group">
  		    <label>Coupon Code</label>
  		    <input type="text" class="form-control" id="coupon" aria-describedby="coupon" placeholder="Coupon Code" name="coupon">
  		  </div>
        <div class="form-group">
          <label>Discount (%)</label>
          <input type="number" class="form-control" id="discount" aria-describedby="discount" placeholder="Discount" name="discount">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info pd-x-20">Add</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection