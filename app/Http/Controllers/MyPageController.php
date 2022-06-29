<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kikit_article;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function toMyPage(){
        $article = new Kikit_article;
        $user_id = Auth::id();

        if($user_id == 1) {
            $mypage_article = $article->all()->toArray();
        }else{
            $mypage_article = $article->where('user_id',$user_id)->get()->toArray();
        }

        return view('my-page',[
            'mypage_article' => $mypage_article,
        ]);
    }
}
