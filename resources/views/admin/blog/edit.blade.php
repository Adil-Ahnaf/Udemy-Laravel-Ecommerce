@extends('admin.layouts')

<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Post</a>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Post
            <a href="{{ route('all.post') }}" class="btn btn-success btn-sm" style="float: right;">All Post</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Post Update Form</p>

          <form method="post" action="{{ url('update/post/'.$post->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (English): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en" required="" value="{{$post->post_title_en}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title (Bangla): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn" required=""
                  value="{{$post->post_title_bn}}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Blog Category:</label>
                  <select class="form-control select2" name="category_id" required="">
                    <option label="Choose Category"></option>
                    @foreach($post_cat as $row)
                    <option value="{{ $row->id }}"
                      <?php 
                        if ($row->id == $post->category_id) {
                          echo "Selected";
                        }
                        ?> >{{ $row->category_name_en }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Post Details (English): </label>
                  <textarea class="form-control" name="post_details_en" id="summernote">
                  {{$post->post_details_en}} </textarea>
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (Bangla): </label>
                  <textarea class="form-control" name="post_details_bn" id="summernote1">
                  {{$post->post_details_bn}} </textarea>
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Current Post Image: </label><br>
                  <img src="{{ URL::to($post->post_image) }}" style="height: 150px; width: 200px">
                  <input type="hidden" name="old_post_image" value="{{$post->post_image}}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">New Post Image: <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this)" aria-describedby="post_image">
                    <span class="custom-file-control"></span>
                    <img src="#" id="one">
                  </label>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Post</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->

          </form>

        </div><!-- card -->
      </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection