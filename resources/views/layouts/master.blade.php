{{ session()->get('email') }}
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">-->
    
    <link rel="stylesheet" href="{{asset('asset/css/adminnav.css')}}">
    <script  src="{{asset('asset/js/popper.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" />
    <script src="{{asset('asset/js/jquery.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet"  href="{{asset('asset/fontawesome-free-6.2.1-web/css/fontawesome.min.css')}}" />
    <script src="{{asset('asset/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap3-typeahead.min.js')}}"></script>
    <script src="{{asset('asset/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/js/dataTables.bootstrap4.min.js')}}"></script>
    <!--<link rel="stylesheet" href="{{asset('asset/css/bootstrap.4.5.2.css')}}" />-->
    <link rel="stylesheet" href="{{asset('asset/css/dataTables.bootstrap4.min.css')}}" />
    <link href="{{asset('asset/css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('asset/js/select2.min.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}"> 
    


</head>
<body style="">
@section('Header')
    @widget('Header')
@show

@section('Navbar')
    @widget('Navbar')
@show

<?php $w  = ( isset($noSideBar) ? 'w-100' : '' );?>
<div class="container-fluid master-class" style="overflow-y:auto">
    <div class="row">
        <div class="col-12" >
            @yield('content')
        </div>
    </div>
</div>
<script src="{{asset('asset/js/jslib.js')}}"></script>
</body>
</html>
