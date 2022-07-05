<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureEditController extends Controller
{
    public function displayFeatures(){
        $features = new Feature;

        $feature_lists = $features->all()->toArray();

        return view('feature-list',[
            'feature_lists' => $feature_lists,
        ]);

    }

    public function featureEdit(int $id) {
        $features = new Feature;
        $feature_edit = $features->where('feature_id', $id)->get()->toArray();

        return view('feature-edit',[
            'feature_edits' => $feature_edit,
        ]);
    }

    public function featureEditProcess(int $id, Request $request) {
        $features = new Feature;
        $feature_update = $features->where('feature_id',$id)->first();
        

        $feature_update->feature_name = $request->feature_name;
        $feature_update->feature_description = $request->feature_description;

        $feature_update->save();

        return redirect('/features_list');
    }

    public function featureDelete(int $id) {
        $features = new Feature;
        $feature_edit = $features->where('feature_id', $id)->delete();
    
        return redirect('/features_list');
    }
}

