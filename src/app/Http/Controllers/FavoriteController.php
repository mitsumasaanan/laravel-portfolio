<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Accomodation;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function store($id)
    {
        Auth::user()->favorite($id);
        return back();
    }

    public function destroy($id)
    {
        Auth::user()->unfavorite($id);
        return back();
    }

    /*public function favorite()
    {
        $user = Auth::user();
        //$accomodations = 
        //if ($user->favorites->isEmpty()) return back();
        if ($user->favorites->isEmpty()){
            return back();
        }else{
            $favorites = $user->favorites();
            //dd($favorites);
            //$accomodations = Accomodation::with('user')->orderBy('id', 'desc')->paginate(10);
            //$favAccomodations = Accomodation::with('user')->find($accomodtion_id);
            return view('user.favorite', compact('user', 'favorites'));
        }
    }*/
}
