{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name')}}</title>
    <link rel="stylesheet" href="{{ asset('Assets/vendor/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/css/custom.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    {{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}

</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    @include('includes.navbarDashboard')

    <div class="main-container">
        @include('includes.sidebarDashboard')

        @yield('content')
    </div>
</div>
<script src="{{ asset('Assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('Assets/vendor/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('Assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('Assets/js/carbon.js') }}"></script>
<script src="{{ asset('Assets/js/demo.js') }}"></script>
<script src="{{ asset('Assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Assets/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('Assets/js/bootstrap-datepicker.min.js') }}"></script>

@stack('scripts')
</body>
</html>



{{--@endsection--}}
