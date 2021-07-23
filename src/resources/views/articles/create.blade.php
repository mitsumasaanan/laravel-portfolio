@extends('layouts.app')

@section('title', '記事投稿')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-pen mr-2"></i>記事投稿</h3>
                </div>
                <form>
                    <div class="card-body col-md-8 mx-auto">
                        <div class="form-group row">
                            <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                        </div>                            
                        <div class="form-group mb-4">
                            <label>記事タイトル<span class="text-danger">(※)</span></label>
                            <input class="form-control" id="title">
                            <small class="form-text text-muted">30文字以内で入力してください。</small>                           
                        </div>
                        <div class="form-group mb-4">
                            <p>カテゴリー<span class="text-danger">(※)</span></p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio">
                                    <label class="form-check-label">ラジオ1</label>
                                </div>                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio">
                                    <label class="form-check-label">ラジオ2</label>
                                </div>                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio">
                                    <label class="form-check-label">ラジオ3</label>
                                </div>                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio">
                                    <label class="form-check-label">ラジオ4</label>
                                </div>
                        </div>
                        <div class="form-group mb-4">
                            <label>記事概要<span class="text-danger">(※)</span></label>
                            <textarea class="form-control" id="summary" rows="6">記事概要</textarea>
                            <small class="form-text text-muted">30文字以上で入力してください。</small>
                        </div>
                        <div class="form-group mb-4">
                            <label>記事URL<span class="text-danger">(※)</span></label>
                            <input class="form-control">
                            <small class="form-text text-muted">Qiitaの記事のURLを入力してください。</small>                            
                        </div>                        
                        <button class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            投稿する
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4'>戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
