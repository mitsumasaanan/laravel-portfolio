@extends('layouts.layout')
@section('title', 'お気に入りの宿')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            {{-- @include('user.myinfo') --}}
            @include('user.tabs')
            {{-- {{ $favorite_accomodations }} --}}
                {{-- @php dd($favorite_accomodations) @endphp --}}
                @foreach($favorite_accomodations as $favorite_accomodation)
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <p class="col-md-4 text-md-right text-dark">タイトル</p>
                            <p class="col-md-6 text-dark">
                                {{-- @php dd($favorite_accomodation) @endphp --}}
                                {{ $favorite_accomodation->name }}
                            </p>
                        </div>
                        <div class="row">
                            <p class="col-md-4 text-md-right text-dark">URL</p>
                            <p class="col-md-6 text-dark">
                                {{ $favorite_accomodation->url }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>

@endsection