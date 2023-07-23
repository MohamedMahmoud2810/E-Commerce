@extends('site.layout.layout')
@section('content')
    @if(session('message'))
        {{session('message')}}
    @endif



@endsection
