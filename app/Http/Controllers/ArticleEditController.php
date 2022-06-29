<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kikit_article;
use App\Models\Feature;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;

class ArticleEditController extends Controller
{
    public function edit(int $id) {
        $kikit_article = new Kikit_article;
        $kikit_feature = new Feature;
        $kikit_article_edit = $kikit_article->where('article_id', $id)->get()->toArray();
        $kikit_feature_array = $kikit_feature->get()->toArray();

        return view('article-edit',[
            'kikit_article_edits' => $kikit_article_edit,
            'kikit_feature' => $kikit_feature_array,
        ]);
    }

    public function editprocess(int $id,CreateData $request) {
        $kikit_article = new Kikit_article;
        $kikit_article_update = $kikit_article->where('article_id',$id)->first();
        

        $kikit_article_update->article_title = $request->article_title;
        $kikit_article_update->article_description = $request->article_description;
        $kikit_article_update->area = $request->area;
        $kikit_article_update->category = $request->category;
        $kikit_article_update->address = $request->address;
        // $kikit_article_update->user_id = Auth::id();

        if(Auth::id()==1){
            $kikit_article_update->featur_flg = $request->feature;
        }
        $kikit_article_update->save();

        $user_id = Auth::id();

        $mypage_article = $kikit_article->where('user_id',$user_id)->get()->toArray();

        return redirect('/my_page');
    }
}
