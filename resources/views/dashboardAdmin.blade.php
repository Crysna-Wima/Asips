@extends('layout.tablesuser')
@section('tablesuser')

<h1 class="text-center" style="color: rgb(52, 8, 214); margin-top: 20px; margin-bottom: 20px">HI, Welcome Back 
    <strong style="color: rgb(4, 4, 133)">{{ Auth::user()->name }}</strong></h1>
@endsection