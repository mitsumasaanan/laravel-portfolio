<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AccomodationRequest;
use App\Accomodation;
use App\User;
use App\Http\Controllers\Controller;

class AccomodationController extends Controller
{
    public function index()
    {
        $accomodations = Accomodation::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('accomodations.index', ['accomodations' => $accomodations]);
    }

    //public function show(Accomodation $accomodation)
    //{
    //    return view('accomodations.show', ['accomodation' => $accomodation]);
    //}

    //public function show(Article $accomodation)
    //{
    //    return view('accomodations.show', ['article' => $article]);
    //}

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
}
