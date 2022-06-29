<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kikit_article;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;

class CreateController extends Controller
{
    public function create(CreateData $request) {
        $kikit_article = new Kikit_article;

        $dir = 'img';
        $file_name = $request->file('article_img')->store('');
        $request->file('article_img')->storeAs('public/' . $dir, $file_name);


        $kikit_article->article_title = $request->article_title;
        $kikit_article->article_description = $request->article_description;
        $kikit_article->area = $request->area;
        $kikit_article->category = $request->category;
        $kikit_article->address = $request->address;
        $kikit_article->article_img = 'storage/' . $dir . '/' . $file_name;
        $kikit_article->user_id = Auth::id();
        
        

        $kikit_article->save();

        return redirect('/home');

    }
}
