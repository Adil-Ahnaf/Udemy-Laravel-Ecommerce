@extends('admin.layouts')

<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Home</a>
        <a class="breadcrumb-item" href="index.html">Product</a>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product Information
            <a href="{{ route('all.product') }}" class="btn btn-success btn-sm" style="float: right;">All Product</a>
          </h6>

          <form method="post" action="{{ url('update/product/info/'.$product->id) }}">
            @csrf
            <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity }}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" onclick="show_subcat(this.value)" required="">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" <?php 
                        if ($row->id == $product->category_id) {
                          echo "Selected";
                        }
                        ?> >{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub-Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="subcategory_id" required="">
                    @foreach($subcategory as $row)
                    <option value="{{ $row->id }}" <?php 
                        if ($row->id == $product->subcategory_id) {
                          echo "Selected";
                        }
                        ?> >{{ $row->subcategory_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand:</label>
                  <select class="form-control select2" name="brand_id">
                    <option label="Choose Brand"></option>
                    @foreach($brand as $row)
                    <option value="{{ $row->id }}" <?php 
                        if ($row->id == $product->brand_id) {
                          echo "Selected";
                        }
                        ?> >{{ $row->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput" value="{{ $product->product_size }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput" value="{{ $product->product_color }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label">Video Link: </label>
                  <input class="form-control" type="url" name="video_link"placeholder="https://example.com" pattern="https://.*" size="500" value="{{ $product->video_link }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discount Price: </label>
                  <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: </label>
                  <textarea class="form-control" name="product_details" id="summernote">
                    {{ $product->product_details }}
                  </textarea>
                  
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="main_slider" value="1" 
                    <?php
                      if ($product->main_slider == 1) {
                         echo "Checked";
                       } 
                    ?> >
                  <span>Main Slider</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="mid_slider" value="1"
                    <?php
                      if ($product->mid_slider == 1) {
                         echo "Checked";
                       } 
                    ?> >
                  <span>Mid Slider</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_deal" value="1"
                    <?php
                      if ($product->hot_deal == 1) {
                         echo "Checked";
                       } 
                    ?> >
                  <span>Hot Deal</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_new" value="1"
                    <?php
                      if ($product->hot_new == 1) {
                         echo "Checked";
                       } 
                    ?> >
                  <span>Hot New</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="best_rated" value="1"
                    <?php
                      if ($product->best_rated == 1) {
                         echo "Checked";
                       } 
                    ?> >
                  <span>Best Rated</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="trend" value="1"
                    <?php
                      if ($product->trend == 1) {
                         echo "Checked";
                       } 
                    ?> >
                  <span>Trend Product</span>
                </label>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Product</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </form>
          </div><!-- form-layout -->
        </div><!-- card -->
      </div>





      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product Images</h6>

          <form method="post" action="{{url('update/product/image/'.$product->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">New Image One (Main Thumbnail) : <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this)" aria-describedby="image_one">
                    <span class="custom-file-control"></span>
                    <img src="#" id="one">
                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">New Image Two : <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this)">
                    <span class="custom-file-control"></span>
                    <img src="#" id="two">
                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">New Image Three : <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this)">
                    <span class="custom-file-control"></span>
                    <img src="#" id="three">
                  </label>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <br><br>
            <hr>
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <label class="form-control-label">Current Image One :</label><br>
                <img src="{{URL::to($product->image_one)}}" style="height: 80px; width: 80px">
              </div>
              <div class="col-lg-4">
                <label class="form-control-label">Current Image Two </label><br>
                <img src="{{URL::to($product->image_two)}}" style="height: 80px; width: 80px">
              </div>
              <div class="col-lg-4">
                <label class="form-control-label">Current Image Three :</label><br>
                <img src="{{URL::to($product->image_three)}}" style="height: 80px; width: 80px">
              </div>
              
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Image</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div>
      </div>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
     $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>

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

<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection