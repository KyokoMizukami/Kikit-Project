<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Http\Requests\FeatureCreateData;

class AddFeatureController extends Controller
{
    public function addFeature(FeatureCreateData $request) {
        $feature = new Feature;

        $dir = 'img';
        $file_name = $request->file('feature_img')->store('');
        $request->file('feature_img')->storeAs('public/' . $dir, $file_name);


        $feature->feature_name = $request->feature_name;
        $feature->feature_description = $request->feature_description;     
        $feature->feature_img = 'storage/' . $dir . '/' . $file_name;

        $feature->save();

        return redirect('/home');
    }
}
