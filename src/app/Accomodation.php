<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Accomodation extends Model
{
    use softdeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'category_id', 'summary', 'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accomodationImgs()
    {
        return $this->hasMany(AccomodationImg::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'accomodation_id', 'user_id')->withTimestamps();
    }

    public function searchRange()
    {
        return [
            'categories' => Category::all(),
        ];
    }

    public function search($request)
    {
        // バリデーション済みのリクエストパラメーターの連想配列
        $search = [
            'category' => intval($request->category),
            'word' => $request->word,
        ];

        // リクエストパラメーターに該当するレコードの取得
        $accomodations = $this->query()
            ->when($search['category'], function ($q) use ($search){
                return $q->where('category_id', $search['category']);
            })
            ->when($search['word'], function ($q) use ($search){
                return $q->where('name', 'like', '%' . $this->escapeLike($search['word']) . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // 検索結果とページング時に検索条件を保持するための配列を値に持つ連想配列
        $searchData = [
            'accomodations' => $accomodations,
            'retentionParams' => [
                'category' => $search['category'] ?? null,
                'word' => $search['word'] ?? null,
            ],
        ];

        return $searchData;
    }

    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

}
