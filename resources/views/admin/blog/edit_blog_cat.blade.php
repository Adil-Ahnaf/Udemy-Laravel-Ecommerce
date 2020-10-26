@extends('admin.layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Blog</a>
      </nav>

      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Blog Category Update</h6>
          
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form method="post" action="{{ url('update/blog/category/'.$category->id) }}">
            @csrf
            <div class="modal-body pd-25">
               <div class="form-group">
                  <label>Category Name English</label>
                  <input type="text" class="form-control" id="category_name_en" aria-describedby="category_name_en" value=" {{$category->category_name_en}} " name="category_name_en">
                </div>
                <div class="form-group">
                  <label>Category Name Bangla</label>
                  <input type="text" class="form-control" id="category_name_bn" aria-describedby="category_name_bn" value=" {{$category->category_name_bn}} " name="category_name_bn">
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