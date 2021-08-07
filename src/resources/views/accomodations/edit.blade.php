@extends('layouts.layout')
@section('title', '宿情報編集')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3><i class="fas fa-pen"></i>宿情報編集</h3>
                </div>
                <div class="card-body col-md-8 mx-auto">
            
                    <form method="POST" action="{{ route('accomodations.update', ['accomodation' => $accomodation]) }}">
                        @csrf
                        @method('PUT')
                            <div class="form-group row" >
                                <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です</p>
                            </div>
                            <div class="form-group">
                                <label for="name">
                                    タイトル<span class="text-danger">(※)</span>
                                </label>
                                <input 
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    value="{{ old('name') ?? $accomodation->name }}"
                                    placeholder="記事タイトル"
                                    autofocus
                                >
                                <div class="text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                                <p class="small text-muted">30字以内で入力してください。</p>
                            </div>
                            <div class="form-group">
                                <label for="category">
                                    国<span class="text-danger">(※)</span>
                                </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="category1" value="1" {{ old('category_id', $accomodation->category_id) == 1 ? 'checked': '' }}/>
                                    <label class="form-check-label" for="category1">マレーシア</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="category2" value="2" {{ old('category_id', $accomodation->category_id) == 2 ? 'checked': ''}}/>
                                    <label class="form-check-label" for="category2">タイ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="category3" value="3" {{ old('category_id', $accomodation->category_id) == 3 ? 'checked': '' }}/>
                                    <label class="form-check-label" for="category3">ベトナム</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="category4" value="4" {{ old('category_id', $accomodation->category_id) == 4 ? 'checked': '' }}/>
                                    <label class="form-check-label" for="category4">シンガポール</label>
                                </div>
                                <div class="text-danger">
                                    {{ $errors->first('category_id') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="summary">
                                    宿概要<span class="text-danger">(※)</span>
                                </label>
                                
                                <textarea 
                                    name="summary" 
                                    id="" 
                                    cols="50" 
                                    rows="6"
                                    class="form-control"
                                    placeholder="記事概要"
                                    >{{ old('summary') ?? $accomodation->summary }}</textarea>
                                <div class="text-danger">
                                    {{ $errors->first('summary') }}
                                </div>
                                <p class="small text-muted">30字以内で入力してください。</p>                              
                            </div>
                            
                            <div class="form-group">
                                <label for="url">
                                    地図URL<span class="text-danger">(※)</span>
                                </label>
                                
                                <input 
                                    name="url"
                                    type="text"
                                    class="form-control"
                                    value="{{ old('url') ?? $accomodation->url }}"
                                    placeholder="記事URL"
                                >
                            <div class="text-danger">
                                {{ $errors->first('url') }}
                            </div>
                                <p class="small text-muted">Qiita記事のURLを入力してください。</p>                          
                            </div>
                                
                            <input 
                            type="submit" 
                            class="btn btn-block btn-success mt-5 form-control col-md-4 mx-auto"
                            value="更新する"
                            >
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')