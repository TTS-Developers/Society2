@extends('superadmin.layout.master')
@section('main-content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-wrapper">
    <div class="page-content">

        <div class="box-body">
<div class="row">
<div class="col">
<form method="post" action="{{ route('admin.role.update') }}" enctype="multipart/form-data" >
@csrf

<input type="hidden" name="id" value="{{ $user->id }}">
<input type="hidden" name="old_image" value="{{ $user->profile_photo_path }}">



<div class="row">
<div class="col-12">

    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <h5>Admin User Name  <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" > </div>
            </div>

        </div> <!-- end cold md 6 -->



        <div class="col-md-6">

            <div class="form-group">
                <h5>Admin Email  <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" > </div>
            </div>

        </div> <!-- end cold md 6 -->

    </div>	<!-- end row 	 -->




    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <h5>Admin User Phone  <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" > </div>
            </div>

        </div> <!-- end cold md 6 -->





    </div>	<!-- end row 	 -->







    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <h5>Admin User Image <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
            </div>
        </div><!-- end cold md 6 -->

        <div class="col-md-6">
            <img id="showImage" src="{{ asset('upload/admin_images/' . $user->profile_photo_path) }}" style="width: 100px; height: 100px;">

        </div><!-- end cold md 6 -->
    </div><!-- end row 	 -->



    <hr>



{{--    <div class="row">--}}

{{--        <div class="col-md-4">--}}
{{--            <div class="form-group">--}}

{{--                <div class="controls">--}}
{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $admin->brand == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_2">Brand</label>--}}
{{--                    </fieldset>--}}
{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_3" name="category" value="1" {{ $admin->category == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_3">Category</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_4" name="product" value="1" {{ $admin->product == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_4">Product</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $admin->slider == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_5">Slider</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $admin->coupons == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_6">Coupons</label>--}}
{{--                    </fieldset>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



{{--        <div class="col-md-4">--}}
{{--            <div class="form-group">--}}

{{--                <div class="controls">--}}
{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_7" name="shipping" value="1" {{ $admin->shipping == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_7">Shipping</label>--}}
{{--                    </fieldset>--}}
{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $admin->blog == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_8">Blog</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $admin->setting == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_9">Setting</label>--}}
{{--                    </fieldset>--}}


{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_10" name="returnorder" value="1" {{ $admin->returnorder == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_10">Return Order</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_11" name="review" value="1" {{ $admin->review == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_11">	Review</label>--}}
{{--                    </fieldset>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}




{{--        <div class="col-md-4">--}}
{{--            <div class="form-group">--}}

{{--                <div class="controls">--}}
{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $admin->orders == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_12">Orders</label>--}}
{{--                    </fieldset>--}}
{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $admin->stock == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_13">Stock</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $admin->reports == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_14">Reports</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_15" name="alluser" value="1" {{ $admin->alluser == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_15">Alluser</label>--}}
{{--                    </fieldset>--}}

{{--                    <fieldset>--}}
{{--                        <input type="checkbox" id="checkbox_16" name="adminuserrole" value="1" {{ $admin->adminuserrole == 1 ? 'checked' : '' }}>--}}
{{--                        <label for="checkbox_16">Adminuserrole</label>--}}
{{--                    </fieldset>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}





    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Admin User">
    </div>
</form>

</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

    </div>
    </div>
  </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection