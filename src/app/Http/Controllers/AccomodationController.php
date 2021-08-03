<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accomodation;

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
}
