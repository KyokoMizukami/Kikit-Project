<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kikit_article;

class ArticleDetailController extends Controller
{
    public function detail(int $id) {
        $kikit_article = new Kikit_article;
        $kikit_article_detail = $kikit_article->where('article_id', $id)->get()->toArray();
        $kikit_article_address = $kikit_article->where('article_id', $id)->value('address');

        return view('article-detail',[
            'kikit_article_details' => $kikit_article_detail,
        ]);
    }

}
