<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function show()
    {
        //ログイン認証済みのユーザー情報取得
        $auth = Auth::user();
        //記事投稿データ取得 ： N+1問題解決->投稿日時が新しい順に記事を並び替え->ページネーション
        $accomodations = Accomodation::with('user')->orderBy('created_at', 'desc')->paginate(10);
        //view表示 [$authにユーザー情報のデータを渡す $accomodationsに記事投稿データを渡す]
        return view('user.mypage', ['auth' => $auth, 'accomodations' => $accomodations]);
    }

    /*public function favorite()
    {
        $auth = Auth::user();
        $accomodations = Accomodation::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('user.favorite', ['auth' => $auth, 'accomodations' => $accomodations]);
    }*/

    /*public function favorite($id){
        $user = new User;
        $user = User::find($id);

        $accomodations = $user->accomodations()->get();
        dd($accomodations);

        if ($accomodations->isEmpty()) {
            return view('user.favorite', compact('user', 'accomodations'));
        }
    }*/

    public function favorite($id)
    {
        $user = User::find($id);
        //$favorites = $user->favorites()->paginate(9);
        
        $auth = Auth::user($id);
        /*$data = [
            'user' => $user,
            'users' => $favorites,
        ];*/

        if ($user->favorites->isEmpty()) {
            return view('user.favorite', compact('user', 'auth'));
        } else {
            
            foreach ($user->favorites as $favorite) {
                $accomodationId = $favorite->id;
            }
            //dd($accomodationId);
            $favorite_accomodations = Accomodation::where('user_id', $user->id)->get();
            //dd($favorite_accomodations);
            return view('user.favorite', compact('user', 'favorite_accomodations', 'auth'));
        }       

        //$data += $this->counts($user);
        //$auth = Auth::user($id);
        //return view('user.favorite', $data);
        //return view('user.favorite', compact('auth', 'data'));
    }
}