@extends('layouts.layout')
@section('title', '宿一覧')

@section('content')
<div class="d-flex justify-content-center center">
        <img class="welcome-img" src="{{ asset('https://anan-laravel-portfolio.s3.ap-northeast-1.amazonaws.com/pf-images/girl-1031169_1280.jpg') }}">
</div>
<div class="d-flex justify-content-center align-items-center welcome-message">
    <h2>旅先のおすすめの宿泊施設を共有するアプリ</br>タビログです</h2>
</div>
<div class="mt-5 container container-expanded">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div>
                    <h2 class="h2 text-center">About</h2>
                    <hr class="hr--small">
                </div>
            </div>
        </div>
        <div class="row d-flex flex-wrap my-5">
            <div class="col-md-6">
                <img src="{{ asset('https://anan-laravel-portfolio.s3.ap-northeast-1.amazonaws.com/pf-images/andrea-davis-NngNVT74o6s-unsplash.jpg') }}" style="width: 100%;">
            </div>
            <div class="d-flex align-items-center col-md-6">
                <p class="section-message">旅先のお気に入りのホテルやホステルを登録して、友達とシェアしてみませんか？</p>
            </div>
        </div>
        <div class="row d-flex flex-wrap my-5">
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('https://anan-laravel-portfolio.s3.ap-northeast-1.amazonaws.com/pf-images/backpack-1149544_640.jpg') }}" style="width: 100%;">
            </div>
            <div class="d-flex align-items-center col-md-6 order-md-1">
                <p class="section-message">コメント機能も活用して、友人と交流してみましょう。</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div>
                <h2 class="h2 text-center">Accomodations</h2>
                <hr class="hr--small">
            </div>
            <div class="d-flex col-md-9 justify-content-center container mt-5 sticky-search">
                <div class="row col-md-8 justify-content-center mb-5">
                    <form class="d-flex" action="{{ route('accomodations.search') }}">
                        <select name="category" id="category" class="form-control" style="border-radius: 0.25rem 0 0 0.25rem;">
                            <option value=''></option>
                            @foreach($categories as $category)
                                @if($category->id === ($retentionParams['category'] ?? ''))
                                    <option value="{{ $category->id }}" selected>{{ $category->country }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->country }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input placeholder="フリーワード" type="text" name="word" id="word" maxlength="100" class="form-control" value="{{-- {{ $retentionParams['word'] ?? '' }} --}}" style="border-radius: unset">
                        <button type="submit" class="btn base-bg text-white d-block mx-auto" style="border-radius: 0 0.25rem 0.25rem 0; border: 1px solid #ced4da;"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            @if( count($accomodations)>0 )
                {{ count($accomodations) }}件の宿があります。
            @else
                検索条件に一致する宿はありません。
            @endif
            <div class="row">
                @foreach ( $accomodations as $accomodation )
                    <div class="col-md-12">
                        <div class="card mb-5">
                            <div class="card-header d-flex base-bg justify-content-between align-items-center">
                                <div class="font-weight-bold">
                                    <i class="fas fa-user-circle mr-2"></i>
                                    {{ $accomodation->user->name }}
                                </div>
                                <div class="d-flex justify-content-end">
                                    @if(Auth::id() == $accomodation->user->id)
                                    <a class="btn btn-secondary rounded-pill" href="{{ route('accomodations.edit', ['accomodation' => $accomodation]) }}">編集<i class="far fa-edit"></i></a>
                                        <form method="POST" action="{{ route('accomodations.destroy', ['accomodation' => $accomodation]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger rounded-pill mx-1" type="submit">
                                                削除<i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
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
                            </div>
                            <div class="row card-body">
                                <div class="col-md-6">
                                    @forelse ($accomodation->accomodationImgs as $accomodationImg)
                                    <img class="show-img" src="{{ asset('https://anan-laravel-portfolio.s3.ap-northeast-1.amazonaws.com/'.$accomodationImg->img_path) }}">
                                    @empty
                                    <img class="d-block mx-auto show-img2" src="{{ asset('https://anan-laravel-portfolio.s3.ap-northeast-1.amazonaws.com/pf-images/no-image-grey.jpeg') }}">
                                    @endforelse
                                </div>
                                <div class="col-md-6">
                                    <p><i class="fa fa-hotel"></i> {{ $accomodation->name }}</p>
                                    <p><i class="fa fa-globe"></i> {{ $accomodation->category->country }}</p>
                                    <p>投稿日：{{ $accomodation->created_at }}</p>    
                                </div>
                                <a href="{{ route('accomodations.show', ['accomodation' => $accomodation]) }}" class="btn base-bg text-white col-md-4 mx-auto mt-3">詳細を見る</a> 
                            </div>
                        </div>                        
                    </div>
                @endforeach    
            </div>
            <div class="col-md-4 mx-auto d-flex justify-content-center mb-5">
                {{ $accomodations->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection