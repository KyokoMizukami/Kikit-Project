<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Kikit_article;

class FeatureDetailController extends Controller
{
    public function featureDetail(int $id){
        $features = new Feature;
        $kikit_articles = new Kikit_article;

        $feature_detail = $features->where('feature_id', $id)->get()->toArray();
        $kikit_articles_featured = $kikit_articles->where('featur_flg', $id)->get()->toArray();

        return view('feature-detail',[
            'feature_details' => $feature_detail,
            'kikit_articles_featureds' => $kikit_articles_featured,
        ]);



    }
}
