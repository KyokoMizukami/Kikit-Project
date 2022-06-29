<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kikit_article;

class ArticleDeleteController extends Controller
{
    public function delete(int $id) {
        $kikit_article = new Kikit_article;
        $kikit_article_edit = $kikit_article->where('article_id', $id)->delete();

        return redirect('/my_page');
    }
}
