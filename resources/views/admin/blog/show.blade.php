@extends('admin.layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Post</a>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">
          Post List
          <a href="{{ route('add.post') }}" class="btn btn-success btn-sm" style="float: right;">Add New</a>
      	  </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Post Title</th>
                  <th class="wd-15p">Post Category</th>
                   <th class="wd-15p">Post Image</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($post as $key=>$row)
                <tr>
                  <td> {{$key +1}} </td>
                  <td> {{$row->post_title_en}} </td>
                  <td> {{$row->category_name_en}} </td>
                  <td> <img src="{{ URL::to($row->post_image) }}" alt="No Image Found" height="70px;" width="80px;"> </td>
                  <td>
                  	<a href="{{ URL::to('edit/post/'.$row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  	<a href="{{ URL::to('delete/post/'.$row->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
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

@endsection