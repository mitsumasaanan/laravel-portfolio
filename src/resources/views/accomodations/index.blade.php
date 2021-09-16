@extends('layouts.layout')
@section('title', '宿一覧')

@section('content')
<div class="d-flex justify-content-center center">
        <img class="welcome-img" src="{{ asset('https://anan-laravel-portfolio.s3.ap-northeast-1.amazonaws.com/pf-images/girl-1031169_1280.jpg') }}">
</div>
<div class="d-flex justify-content-center align-items-center welcome-message">
    <h2>旅先のおすすめの宿泊施設を共有するアプリ</br>タビログです</h2>
</div>
<div class="container container-expanded">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row justify-content-center my-4">
                <form action="{{ route('accomodations.search') }}">
                    <div class="form-group form-inline">
                        <label for="category" class="mr-4 pr-3 col-form-label">カテゴリー</label>
                        <select name="category" id="category" class="form-control">
                            <option value=""></option>
                            @foreach($categories as $category)
                                @if($category->id === ($retentionParams['category'] ?? ''))
                                    <option value="{{ $category->id }}" selected>{{ $category->country }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->country }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-inline">
                        <label for="word" class="mr-4 col-form-label">フリーワード</label>
                        <input type="text" name="word" id="word" maxlength="100" class="form-control" value="{{-- {{ $retentionParams['word'] ?? '' }} --}}">
                    </div>
                    <button type="submit" class="btn base-bg text-white d-block mx-auto mt-4">検索する</button>
                </form>
            </div>
            <div>
                <h2 class="h2 text-center">Accomodations</h2>
                <hr class="hr--small">
            </div>
            @if( count($accomodations)>0 )
                {{ count($accomodations) }}件の検索結果がありました。
            @else
                検索条件に一致する宿はありません。
            @endif
            <div class="row">
                @foreach ( $accomodations as $accomodation )
                    <div class="col-md-6">
                        <div class="card mb-5">
                            <div class="card-header d-flex base-bg justify-content-between align-items-center">
                                <div class="font-weight-bold">
                                    <i class="fas fa-user-circle mr-2"></i>
                                    {{ $accomodation->user->name }}
                                </div>
                                @if(Auth::id() == $accomodation->user->id)
                                <div class="d-flex justify-content-around">
                                    <a class="btn btn-secondary rounded-pill" href="{{ route('accomodations.edit', ['accomodation' => $accomodation]) }}"><i class="far fa-edit"></i> 編集</a>
                                    <form method="POST" action="{{ route('accomodations.destroy', ['accomodation' => $accomodation]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger rounded-pill mx-1" type="submit">
                                            <i class="far fa-trash-alt"></i> 削除
                                        </button>
                                    </form>
                                </div>
                                @endif
                                @if(Auth::user())
                                    @if(Auth::user()->is_favorite($accomodation->id))
                                        <form method="POST" action="{{ route('unfavorite', $accomodation->id) }}">
                                            @csrf
                                            <input type="submit" value="保存済み" class="btn btn-secondary rounded-pill">
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('favorite', $accomodation->id) }}">
                                            @csrf
                                            <input type="submit" value="保存する" class="btn text-white btn-info rounded-pill">
                                        </form>
                                    @endif
                                @endif
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
                                    <a href="{{ route('accomodations.show', ['accomodation' => $accomodation]) }}" class="btn base-bg text-white col-md-4 mx-auto">詳細を見る</a> 
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
</div>

@endsection