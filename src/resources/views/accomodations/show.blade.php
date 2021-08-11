@extends('layouts.layout')
@section('title', '宿詳細')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>宿詳細 <i class="fa fa-plane-departure"></i></h3>
                    </div>
                    
                    <div class="card-body col-md-8 mx-auto">
                        <div class="card-body">
                            <div class="row mb-2">
                                <p class="text-md-right col-md-4">名前</p>
                                <p class="col-md-7">{{ $accomodation->user->name }}</p>
                            </div>
                            <div class="row mb-2">
                                <p class="text-md-right col-md-4">タイトル</p>
                                <p class="col-md-7">{{ $accomodation->name }}</p>
                            </div>
                            <div class="row mb-2">
                                <p class="text-md-right col-md-4">国</p>
                                <p class="col-md-7">{{ $accomodation->category->country }}</p>
                            </div>
                            <div class="row mb-2">
                                <p class="text-md-right col-md-4">宿概要</p>
                                <p class="col-md-7">{{ $accomodation->summary }}</p>
                            </div>
                            <div class="row mb-2">
                                <p class="text-md-right col-md-4">URL</p>
                                <a class="col-md-7" href="{{ $accomodation->url }}">{{ $accomodation->url }}</a>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                            <a class="btn btn-secondary col-md-3 py-2 mx-1 mb-4" href="{{ route('top') }}">戻る</a>
                            @if(Auth::id() == $accomodation->user->id)
                                <a class="btn btn-success col-md-3 py-2 mx-1 mb-4" href="{{ route('accomodations.edit', ['accomodation' => $accomodation]) }}"><i class="far fa-edit"></i>編集</a>
                                <form method="POST" action="{{ route('accomodations.destroy', ['accomodation' => $accomodation]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger col-12 py-2 mx-1 mb-4" type="submit">
                                        <i class="far fa-trash-alt"></i>削除
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card-body">
                            <h5>コメント</h5>
                            <form method="POST" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="mt-3"> 
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="accomodation_id" value="{{ $accomodation->id }}">
                                    <label for="comment"></label>
                                        <textarea
                                            id="comment"
                                            type="text"
                                            name="comment"
                                            class="form-control"
                                            rows="5">{{ old('comment') }}</textarea>
                                </div>
                                <div class="text-danger">
                                    <p>{{ $errors->first('comment') }}</p>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                    コメントする
                                    </button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="border-bottom p-2">
                            <h3>コメント</h3>
                        </div>
                        
                        @forelse($accomodation->comments as $comment)
                            <p>{{ $comment->user->name }}</p>
                            <p>{{ $comment->comment }}</p>
                            <p>{{ $comment->created_at }}</p>
                            <hr>
                        @empty
                            <p>コメントはありません</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')