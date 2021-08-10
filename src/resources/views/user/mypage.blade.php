@extends('layouts.layout')
@section('title', 'マイページ')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2 text-dark">
                        <i class="fas fa-user mr-2 text-dark"></i>
                        マイページ
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <p class="col-md-4 text-md-right text-dark">名前</p>
                        <p class="col-md-6 text-dark">
                            {{ $auth->name }}
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-md-4 text-md-right text-dark">メールアドレス</p>
                        <p class="col-md-6 text-dark">
                            {{ $auth->email }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-center my-2">
                        <a class="btn btn-secondary col-md-2 mr-2" href="/" role="button">戻る</a>
                        <a class="btn btn-success col-md-2" href="{{ route('user.edit', Auth::user()) }}" role="button">編集</a>
                    </div>
                </div>
            </div>

            <h3 class="text-center mb-4 text-dark">自分の投稿</h3>

            @foreach($auth->accomodations as $accomodation)
            <div class="card mb-5">
                <div class="card-header align-items-center d-flex justify-content-between">
                    <span class="text-dark"><i class="fas fa-user-edit mr-2 text-dark"></i>投稿日時：{{ $accomodation->created_at->format('Y-m-d')}}</span>
                    @if(Auth::id() == $accomodation->user->id)
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-secondary text-white mr-1 rounded-pill" href="{{ route('accomodations.edit', ['accomodation' => $accomodation]) }}" role="button"><i class="far fa-edit mr-1"></i>編集</a>
                            <form method="POST" action="{{ route('accomodations.destroy', ['accomodation' => $accomodation]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white deleteBtn rounded-pill mx-1" id="delete-btn" data-delete-target="記事"><i class="far fa-trash-alt mr-1"></i>削除</button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        <p class="col-md-4 text-md-right text-dark">タイトル</p>
                        <p class="col-md-6 text-dark">
                            {{ $accomodation->name }}
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-md-4 text-md-right text-dark">URL</p>
                        <p class="col-md-6">
                            <a href="{{ $accomodation->url }}" target="_blank" rel="noopener noreferrer">{{ $accomodation->url }}</a>
                        </p>
                    </div>
                        <div class="row">
                            <a href="{{ route('accomodations.show', ['accomodation' => $accomodation]) }}" class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                        </div>
                </div>
            </div>
            @endforeach
        <div class="col-md-4 mx-auto d-flex justify-content-center">
            {{ $accomodations->links('pagination::bootstrap-4') }}
        </div>
        </div>
    </div>
</div>

@endsection