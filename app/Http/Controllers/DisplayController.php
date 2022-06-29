<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kikit_article;
use App\Models\Feature;

class DisplayController extends Controller
{

    // =================================== Display Features ============================
    // =================================== Display Articles ============================
    public function displayAll() {
        $kikit_article = new Kikit_article;
        $kikit_article_all = $kikit_article->all()->toArray();

        $features = new Feature;
        $features_all = $features->all()->toArray();

        return view('index',[
            'kikit_articles' => $kikit_article_all,
            'features' => $features_all,
        ]);
    }

    public function displaySelect(Request $request) {
        $kikit_article = new Kikit_article;
        $select_area = $request->select_area;
        $select_category = $request->select_category;

        $kikit_article_select = $kikit_article->where('area',$select_area)->where('category',$select_category)->get()->toArray();

        return view('index',[
            'kikit_articles' => $kikit_article_select,
        ]);
    }

    
}
