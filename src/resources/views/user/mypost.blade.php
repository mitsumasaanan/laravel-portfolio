@if($auth->accomodations->isEmpty())

    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <p class="col-md-6 text-dark">
                    投稿した宿はありません。
                </p>
            </div>
        </div>
    </div>

@else
    
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
                    <a href="{{ route('accomodations.show', ['accomodation' => $accomodation]) }}" class="btn btn-info text-white col-md-4 mx-auto">詳細を見る</a>
                </div>
        </div>
    </div>
    @endforeach

@endif

    <div class="col-md-4 mx-auto d-flex justify-content-center">
        {{ $accomodations->links('pagination::bootstrap-4') }}
    </div>