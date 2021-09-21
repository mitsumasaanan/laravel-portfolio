@extends('layouts.layout')
@section('title', 'お気に入りの宿')
@push('css')
    <link href="{{ asset('css/sub.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="container container-hgt">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @include('user.myinfo')
            @include('user.tabs')

                @if($favorite_accomodations->isEmpty())

                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-6 text-dark">
                                    保存した宿はありません。
                                </p>
                            </div>
                        </div>
                    </div>

                @else

                    @foreach($favorite_accomodations as $favorite_accomodation)
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-4 text-md-right text-dark">タイトル</p>
                                <p class="col-md-6 text-dark">
                                    {{ $favorite_accomodation->name }}
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right text-dark">URL</p>
                                <p class="col-md-6">
                                    <a href="{{ $favorite_accomodation->url }}" target="_blank" rel="noopener noreferrer">{{ $favorite_accomodation->url }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                @endif
        </div>
    </div>
</div>

@endsection