<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\AccomodationRequest;
use App\Accomodation;
use App\AccomodationImg;
use App\Category;
use App\Comment;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class AccomodationController extends Controller
{

    public function index()
    {
        $accomodations = Accomodation::with('user', 'accomodationImgs')->orderBy('id', 'desc')->paginate(10);
        $categories = Category::orderBy('id','asc')->get();
        return view('accomodations.index', ['accomodations' => $accomodations], ['categories' => $categories]);
    }

    public function show(Accomodation $accomodation)
    {
        $accomodationImgs = Accomodation::with('accomodationImgs')->get();
        //return view('accomodations.show', ['accomodation' => $accomodation]);
        return view('accomodations.show', compact('accomodation','accomodationImgs'));
    }

    public function create()
    {
        return view('accomodations.create');
    }

    public function store(AccomodationRequest $request, Accomodation $accomodation, AccomodationImg $accomodationImg)
    {
        $accomodation->user_id = Auth::id();
        $accomodation->fill($request->all());
        $accomodation->save();

        if ($request->hasFile('accomodation_img')) {
            //$filename = $request->file('accomodation_img')->getClientOriginalName();
            //$img_path = $request->file('accomodation_img')->storeAs('public/images', $filename);
            //$accomodation->accomodationImgs()->create(['img_path' => $filename]);
            $accomodation_img = $request->file('accomodation_img');
            $url = Storage::disk('s3')->putFile('pf-images', $accomodation_img, 'public');
            $accomodation->accomodationImgs()->create(['img_path' => $url]);
        }
        //dd($filename);

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

        // カテゴリーの検索範囲を定義したメソッドの戻り値を代入
        $searchRanges = $accomodation->searchRange();

        return view('accomodations.index', $searchData, $searchRanges);
    }

}
