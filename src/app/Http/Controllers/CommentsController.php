<?php

namespace App\Http\Controllers;

use App\Accomodation;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)   
    {
        $comment->fill($request->all())->save();
        $accomodation = Accomodation::find($request->accomodation_id);
        return redirect()->route('accomodations.show', compact('accomodation'));
    }
}
