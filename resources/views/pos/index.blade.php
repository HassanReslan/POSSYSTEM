@extends('Layouts.master',['noSideBar' => true])
@section('page')
    {{$page}}
@stop
@section('email')
    {{$email}}
@stop
@section('content')
    @widget('Pos')
@stop
