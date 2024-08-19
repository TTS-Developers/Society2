@extends('superadmin.layout.master')
@section('main-content')

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <!--end breadcrumb-->
            <hr>
            <div class="row gap-4">
                <div class="col-md-12 card">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin-top: 10px">Admin Managment</h3>
                        <a href="{{ route('add.superadmin') }}" class="btn btn-danger" style="margin-left: 86%;">Add
                            Admin User</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{--                                    <th>Access</th>--}}
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    <tr>
                                        {{-- <td> <img src="{{ asset($item->profile_photo_path) }}">  </td>--}}
                                        <td><img src="{{ asset('upload/admin_images/' . $item->profile_photo_path) }}"
                                                 style="width: 50px; height: 50px;"></td>
                                        <td>{{ $item->name }}  </td>
                                        <td>{{ $item->email  }}  </td>
                                        {{-- <td width="40%">--}}
                                        {{-- @if($item->brand == 1)--}}
                                        {{-- <span class="badge badge-primary">Brand</span>--}}
                                        {{-- @else--}}
                                        {{-- @endif--}}
                                        {{-- @if($item->category == 1)--}}
                                        {{-- <span class="badge badge-success">Category</span>--}}
                                        {{-- @else--}}
                                        {{--@endif--}}
                                        {{--@if($item->product == 1)--}}
                                        {{--<span class="badge badge-danger">Product</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->slider == 1)--}}
                                        {{--<span class="badge badge-warning">Slider</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->coupons == 1)--}}
                                        {{--<span class="badge badge-secondary">Coupons</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->shipping == 1)--}}
                                        {{--<span class="badge badge-info">Shipping</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->blog == 1)--}}
                                        {{--<span class="badge badge-light">Blog</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->setting == 1)--}}
                                        {{--<span class="badge badge-dark">Setting</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->returnorder == 1)--}}
                                        {{--<span class="badge badge-danger-light">Return Order</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->review == 1)--}}
                                        {{--<span class="badge badge-info-light">Review</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->orders == 1)--}}
                                        {{--<span class="badge badge-primary-light">Orders</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->stock == 1)--}}
                                        {{--<span class="badge badge-">Stock</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->reports == 1)--}}
                                        {{--<span class="badge badge-primary">Repoorts</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->alluser == 1)--}}
                                        {{--<span class="badge badge-primary">All User</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--@if($item->adminuserrole == 1)--}}
                                        {{--<span class="badge badge-primary">Admin UserRole</span>--}}
                                        {{--@else--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                        <td width="25%">
                                            <a href="{{ route('edit.superadmin',$item->id) }}" class="btn btn-info"
                                               title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                            <a href="{{ route('delete.superadmin',$item->id) }}" class="btn btn-danger"
                                               title="Delete Management Member">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection