@extends('layouts.layout')
@section('title', 'マイページ')
@section('content')

<div class="container container-hgt">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @include('user.myinfo')

            @include('user.tabs')
            @include('user.mypost')
            
        </div>
    </div>
</div>

@endsection