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
          <h6 class="card-body-title">Brand Update</h6>
          
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form method="post" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body pd-25">
               <div class="form-group">
                  <label>Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" aria-describedby="brand_name" value=" {{$brand->brand_name}} " name="brand_name">
                </div>
                <div class="form-group">
                  <label>Brand Logo</label><br>
                  <img src="{{ URL::to($brand->brand_logo) }}" alt="No Logo Found" style="color: red" height="70px;" width="100px;" name="old_logo" id="old_logo">
                </div>
                <div class="form-group">
                  <label>New Brand Logo</label>
                  <input type="file" class="form-control" id="brand_logo" aria-describedby="brand_logo" name="brand_logo">
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