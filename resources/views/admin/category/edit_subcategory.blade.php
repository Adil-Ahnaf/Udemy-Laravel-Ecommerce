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
          <h6 class="card-body-title">Sub-Category Update</h6>
          
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form method="post" action="{{ url('update/sub-category/'.$subcategory->id) }}">
            @csrf
            <div class="modal-body pd-25">
               <div class="form-group">
                  <label>Sub-Category Name</label>
                  <input type="text" class="form-control" id="subcategory_name" aria-describedby="subcategory_name" value=" {{$subcategory->subcategory_name}} " name="subcategory_name">
                </div>
                <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-control" name="category_id" id="category_id">
                    @foreach($category as $row)
                    <option value="{{$row->id}}" 
                      <?php
                        if($row->id == $subcategory->category_id){
                          echo "Selected";
                        } 
                      ?> > 
                      {{$row->category_name}} 
                    </option>
                    @endforeach
                  </select>
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