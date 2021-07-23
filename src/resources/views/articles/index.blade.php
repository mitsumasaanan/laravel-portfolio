@extends('layouts.app')

@section('title', '記事一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                // 共同開発時はDBから取得した記事データを一覧表示させてください
                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="font-weight-bold">
                                <i class="fas fa-user-edit mr-2"></i>ゆーたろー
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-4 text-md-right">期生</p>
                                <p class="col-md-6">1期生</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">タイトル</p>
                                <p class="col-md-6">【Laravel】artisanコマンドでやりたいこと、ここで見つかる</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">URL</p>
                                <p class="col-md-6">
                                    <a href="https://qiita.com/shimotaroo/items/6a909797e0139517b1bd" target="_blank">https://qiita.com/shimotaroo/items/6a909797e0139517b1bd</a>
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">投稿日時</p>
                                <p class="col-md-6">2020-06-22</p>
                            </div>
                            <form>
                                <div class="row">
                                    <a class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="font-weight-bold">
                                <i class="fas fa-user-edit mr-2"></i>りょうた
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-4 text-md-right">期生</p>
                                <p class="col-md-6">2期生</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">タイトル</p>
                                <p class="col-md-6">実務未経験者が初めての共同開発経験をまとめてみた</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">URL</p>
                                <p class="col-md-6">
                                    <a href="https://qiita.com/ryota100100/items/6b48f38b34d1cebaac0a" target="_blank">https://qiita.com/ryota100100/items/6b48f38b34d1cebaac0a</a>
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">投稿日時</p>
                                <p class="col-md-6">2020-06-19</p>
                            </div>
                            <form>
                                <div class="row">
                                    <a class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="font-weight-bold">
                                <i class="fas fa-user-edit mr-2"></i>ジーコ
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-4 text-md-right">期生</p>
                                <p class="col-md-6">3期生</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">タイトル</p>
                                <p class="col-md-6">新人3ヶ月エンジニアが学んだPHP関数</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">URL</p>
                                <p class="col-md-6">
                                    <a href="https://qiita.com/shimotaroo/items/6a909797e0139517b1bd" target="_blank">https://qiita.com/ziko7110/items/fec679e282209aed420e</a>
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">投稿日時</p>
                                <p class="col-md-6">2020-06-18</p>
                            </div>
                            <form>
                                <div class="row">
                                    <a class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="font-weight-bold">
                                <i class="fas fa-user-edit mr-2"></i>ゆーたろー
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-4 text-md-right">期生</p>
                                <p class="col-md-6">1期生</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">タイトル</p>
                                <p class="col-md-6">絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜前編〜</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">URL</p>
                                <p class="col-md-6">
                                    <a href="https://qiita.com/shimotaroo/items/29f7878b01ee4b99b951" target="_blank">https://qiita.com/shimotaroo/items/29f7878b01ee4b99b951</a>
                                </p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">投稿日時</p>
                                <p class="col-md-6">2020-06-17</p>
                            </div>
                            <form>
                                <div class="row">
                                    <a class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection