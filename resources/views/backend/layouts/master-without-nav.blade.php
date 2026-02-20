<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('backend.layouts.title-meta')
    @include('backend.layouts.head')
</head>

@section('body')

    <body class="authentication-bg">
    @show
    @yield('content')
    @include('backend.layouts.vendor-scripts')
</body>

</html>
