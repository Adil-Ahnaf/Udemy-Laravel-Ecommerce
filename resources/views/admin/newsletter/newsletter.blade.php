@extends('admin.layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Newsletter</a>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">
            Subscribers List
            <a href="" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target="#modaldemo1">All Delete</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Subscriber Email</th>
                  <th class="wd-15p">Subscribe Time</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($sub as $key=>$row)
                <tr>
                  <td><input type="checkbox" name=""> {{$key +1}} </td>
                  <td> {{$row->email}} </td>
                  <td> {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                  <td>
                  	<a href="{{ URL::to('delete/subscribe/'.$row->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection