@extends('layouts.layout')

@section('content')

    <div class="d-flex justify-content-center center">
        <img class="welcome-img" src="{{ asset('https://anan-laravel-portfolio.s3.ap-northeast-1.amazonaws.com/pf-images/girl-1031169_1280.jpg') }}">
    </div>
    <div class="d-flex justify-content-center align-items-center welcome-message">
        <h2>旅先のおすすめの宿泊施設を共有するアプリ</br>タビログです</h2>
    </div>


@endsection