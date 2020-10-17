@extends('admin.layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Product</a>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">
          Product List
          <a href="{{ route('add.product') }}" class="btn btn-success btn-sm" style="float: right;">Add Product</a>
      	  </h6>
          {{-- <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($category as $key=>$row)
                <tr>
                  <td> {{$key +1}} </td>
                  <td> {{$row->category_name}} </td>
                  <td>
                  	<a href="{{ URL::to('edit/category/'.$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  	<a href="{{ URL::to('delete/category/'.$row->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper --> --}}
        </div><!-- card -->
      </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection