@extends('layouts.layout')
@section('title', '宿一覧')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                @foreach ( $accomodations as $accomodation )
                    <div class="col-md-6">
                            <div class="card mb-5">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="font-weight-bold">
                                        <i class="fas fa-user-edit mr-2"></i>
                                        {{ $accomodation->user->name }}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <p class="col-md-4 text-md-right">タイトル</p>
                                        <p class="col-md-6">{{ $accomodation->name }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-md-4 text-md-right">国</p>
                                        <p class="col-md-6">{{ $accomodation->category->country }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-md-4 text-md-right">URL</p>
                                        <p class="col-md-6">
                                            <a href="{{ $accomodation->url }}" target="_blank">{{ $accomodation->url }}</a>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="col-md-4 text-md-right">投稿日時</p>
                                        <p class="col-md-6">{{ $accomodation->created_at }}</p>
                                    </div>
                                    <div class="row">
                                         <a href="{{-- {{ route('accomodations.show', ['accomdation' => $accomodation]) }} --}}" class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a> 
                                    </div>
                                </div>
                            </div>                        
                    </div>
                @endforeach    
        </div>
        <div class="col-md-4 mx-auto d-flex justify-content-center">
            {{ $accomodations->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection