@extends('superadmin.layout.master')
@section('page-title')
    {{_('Allotments')}}
@endsection
@section('main-content')
<div class="page-wrapper">
    <div class="page-content">
        @include('superadmin.allotments.table')
    </div>
</div>
@endsection
