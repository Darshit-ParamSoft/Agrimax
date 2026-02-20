@extends('backend.layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@component('backend.common-components.breadcrumb')
@slot('pagetitle') Minible @endslot
@slot('title') RoleMaster @endslot
@endcomponent




@endsection
@section('script')
<!-- apexcharts -->

@endsection
