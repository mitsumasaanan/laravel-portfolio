@extends('layouts.layout')
@section('title', '退会のご確認')
@section('content')

<div class="container container-hgt">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2 text-dark">
                        <i class="fas fa-user mr-2 text-dark"></i>
                        退会のご確認
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <p class="col-md-12 text-center text-dark">退会するとアカウントや投稿が全て削除されます。</p>
                        <p class="col-md-12 text-center text-dark">退会しますか？</p>
                        <div class="d-flex justify-content-center my-2 col-md-12">
                            <form action="{{ route('user.destroy', Auth::user()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">退会する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection