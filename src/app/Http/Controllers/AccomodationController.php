<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AccomodationRequest;
use App\Accomodation;
use App\Category;
use App\Comment;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class AccomodationController extends Controller
{

    public function index()
    {
        $accomodations = Accomodation::with('user')->orderBy('id', 'desc')->paginate(10);
        $categories = Category::orderBy('id','asc')->get();
        //dd($categories);
        return view('accomodations.index', ['accomodations' => $accomodations], ['categories' => $categories]);
        //return view('accomodations.index', compact($accomodations, $categories));
    }

    public function show(Accomodation $accomodation)
    {
        //$comments = $accomodation->comments;
        //return view('accomodations.show', ['accomodation' => $accomodation], ['comments' => $comments]);
        return view('accomodations.show', ['accomodation' => $accomodation]);
    }

    public function create()
    {
        return view('accomodations.create');
    }

    public function store(AccomodationRequest $request, Accomodation $accomodation)
    {
        $accomodation->user_id = Auth::id();
        $accomodation->fill($request->all());
        $accomodation->save();
        return redirect()->route('top');
    }

    public function edit(Accomodation $accomodation)
    {
        return view('accomodations.edit', ['accomodation' => $accomodation]);
    }

    public function update(AccomodationRequest $request, Accomodation $accomodation)
    {
        $accomodation->fill($request->all());
        $accomodation->save();
        return redirect()->route('top');
    }

    public function destroy(Accomodation $accomodation)
    {
        $accomodation->delete();
        return redirect()->route('top');
    }

    public function search(SearchRequest $request, Accomodation $accomodation)
    {
        // 検索結果を代入
        $searchData = $accomodation->search($request);

        // 期とカテゴリーの検索範囲を定義したメソッドの戻り値を代入
        $searchRanges = $accomodation->searchRange();

        return view('accomodations.index', $searchData, $searchRanges);
    }

}
