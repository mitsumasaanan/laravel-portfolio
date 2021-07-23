@extends('layouts.app')

@section('title', 'ユーザー情報編集')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>ユーザー情報編集</h3>
                </div>

                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前<span
                                    class="text-danger">(※)</span>
                            </label>
                            <div class="col-md-6">
                                <input id="name" class="form-control">
                                <small>Slack名を入力してください。</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="term" class="col-md-4 col-form-label text-md-right">期生<span
                                    class="text-danger">(※)</span>
                            </label>

                            <div class="col-md-6">
                                <input id="term" class="form-control">
                                <small>半角数字2桁以内で入力してください。</small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス<span
                                    class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input id="email" class="form-control">
                                <small>今回は仮のメールアドレスを入力ください。</small>
                            </div>
                        </div>

                        <div class="row mt-4 align-items-center">
                            <p class="col-md-4 text-md-right">パスワード</p>
                            <p class="col-md-6">
                                パスワードは変更できません
                            </p>
                        </div>

                        <button class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            更新する
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4'>戻る</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
