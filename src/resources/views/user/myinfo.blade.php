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
            @unless (Auth::id() == 4)
            <a class="btn btn-info text-white col-md-2" href="{{ route('user.edit', Auth::user()) }}" role="button">編集</a>
            @endunless
        </div>
    </div>
</div>