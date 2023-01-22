@extends('Layouts.master')
@section('page')
    {{$page}}
@stop
@section('email')
    {{$email}}
@stop
@section('content')
    @widget('SupliersList')
@stop

