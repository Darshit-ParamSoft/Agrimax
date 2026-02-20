@extends('backend.layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@component('backend.common-components.breadcrumb')
@slot('pagetitle') Minible @endslot
@slot('title') UniversityMaster @endslot
@endcomponent


@endsection
@section('script')
<!-- apexcharts -->

@endsection
