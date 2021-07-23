@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center my-2">ユーザー登録</h3>
                </div>

                <div class="card-body">
                    <form>

                        <div class="form-group row">
                            <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前<span
                                    class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input class="form-control" autofocus placeholder="やんばる太朗">
                                <small>Slack名を入力してください。</small>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="term" class="col-md-4 col-form-label text-md-right">期生<span
                                    class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input class="form-control" placeholder="3">
                                <small>半角数字2桁以内で入力してください。</small>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス<span
                                    class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input class="form-control" placeholder="****@mail.com">
                                <small>今回は仮のメールアドレスを入力ください。</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード<span
                                    class="text-danger">(※)</span></label>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="********">
                                <small>半角英数字8文字以上を入力してください。</small>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認）<span
                                    class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input class="form-control" placeholder="********">
                                <small>確認のためパスワードを再度入力してください。</small>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-5">
                                <button class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection