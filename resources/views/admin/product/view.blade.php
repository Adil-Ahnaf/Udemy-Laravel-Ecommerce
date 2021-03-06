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
          <h6 class="card-body-title">Product Details
            <a href="{{ route('all.product') }}" class="btn btn-success btn-sm" style="float: right;">All Product</a>
          </h6>
            <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->product_name }}</strong>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->product_code }}</strong>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->product_quantity }}</strong>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->category->category_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub-Category: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->subcategory->subcategory_name }}</strong>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand:</label>
                  <br><strong>{{ $product->brand->brand_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->product_size }}</strong>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->product_color }}</strong>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                  <br><strong>{{ $product->selling_price }}</strong>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: </label>
                  <br><p>{!! $product->product_details !!}</p>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: </label>
                  <br><strong>{{ $product->video_link }}</strong>
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label>
                  <br><img src="{{ URL::to($product->image_one) }}" style="height: 100px; width: 100px">
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two : <span class="tx-danger">*</span></label>
                  <br><img src="{{ URL::to($product->image_two) }}" style="height: 100px; width: 100px">
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three : <span class="tx-danger">*</span></label>
                  <br><img src="{{ URL::to($product->image_three) }}" style="height: 100px; width: 100px">

                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <hr>
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <label>
                  @if($product->main_slider == 1)
                    <span class="badge badge-success">Active</span>
                  @else
                    <span class="badge badge-danger">Inactive</span>
                  @endif  
                  <span>Main Slider</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label>
                  @if($product->mid_slider == 1)
                    <span class="badge badge-success">Active</span>
                  @else
                    <span class="badge badge-danger">Inactive</span>
                  @endif  
                  <span>Mid Slider</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label>
                  @if($product->hot_deal == 1)
                    <span class="badge badge-success">Active</span>
                  @else
                    <span class="badge badge-danger">Inactive</span>
                  @endif  
                  <span>Hot Deal</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label>
                  @if($product->hot_new == 1)
                    <span class="badge badge-success">Active</span>
                  @else
                    <span class="badge badge-danger">Inactive</span>
                  @endif  
                  <span>Hot New</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label>
                  @if($product->best_rated == 1)
                    <span class="badge badge-success">Active</span>
                  @else
                    <span class="badge badge-danger">Inactive</span>
                  @endif  
                  <span>Best Rated</span>
                </label>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label>
                  @if($product->trend == 1)
                    <span class="badge badge-success">Active</span>
                  @else
                    <span class="badge badge-danger">Inactive</span>
                  @endif  
                  <span>Trend Product</span>
                </label>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- form-layout -->

        </div><!-- card -->
      </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


{{-- <script type="text/javascript">
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
        .width(50)
        .height(50);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script> --}}

@endsection