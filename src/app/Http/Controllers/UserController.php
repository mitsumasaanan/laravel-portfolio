<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Accomodation;
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

    public function favorite($id)
    {
        $user = User::find($id);
        $auth = Auth::user($id);
        
            //そのユーザーのお気に入り済み宿を格納
            $favorite_accomodations = $user->favorites;
            
            return view('user.favorite', compact('user', 'favorite_accomodations', 'auth'));
         
    }

    public function destroy(User $user)
    {
        $user->delete();
        return view('/');
    }

    public function delete_confirm()
    {
        return view('user.delete_confirm');
    }

}