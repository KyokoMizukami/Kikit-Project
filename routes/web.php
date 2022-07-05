<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Route::group(['middleware' => 'auth'],function(){

    // Route::get('/', function () {
    //     return view('index');
    // });
    // ----------------------------------------------- Display -----------------------------------
    Route::get('/home',[App\Http\Controllers\DisplayController::class,'displayAll']);
    Route::post('/',[App\Http\Controllers\DisplayController::class,'displaySelect'])->name('select');

    // ----------------------------------------------- Auth --------------------------------------

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/logout', [App\Http\Controllers\HomeController::class,'logout'])->name('logout');

    // ----------------------------------------------- Create --------------------------------------
    Route::get('/create-form', function(){
        return view('create-form');
    })->name('create-form');

    Route::post('/create-form', [App\Http\Controllers\CreateController::class, 'create'])->name('create');

    // ---------------------------------------------- Detail --------------------------------------
    Route::get('/article-detail/{article_id}', [App\Http\Controllers\ArticleDetailController::class, 'detail'])->name('article_detail');

    // ---------------------------------------------- Edit ------------------------------------------
    Route::get('/article-edit/{article_id}', [App\Http\Controllers\ArticleEditController::class, 'edit'])->name('article_edit');

    Route::post('/article-edit-process/{article_id}', [App\Http\Controllers\ArticleEditController::class, 'editprocess'])->name('article_edit_process');

    // ---------------------------------------------- Delete -------------------------------------------

    Route::get('/article-delete/{article_id}',[App\Http\Controllers\ArticleDeleteController::class, 'delete'])->name('article_delete');

    // ---------------------------------------------- Add Feature --------------------------------------
    Route::get('/add_feature', function(){
        return view('add-feature');
    })->name('add_feature');

    Route::post('/add_feature',[App\Http\Controllers\AddFeatureController::class, 'addFeature']);

    // --------------------------------------------- My Page -------------------------------------------
    Route::get('/my_page', [App\Http\Controllers\MyPageController::class, 'toMyPage'])->name('my_page');

    // --------------------------------------------- Feature Detail -------------------------------------------
    Route::get('/feature/{feature_id}', [App\Http\Controllers\FeatureDetailController::class, 'featureDetail'])->name('feature_detail');

    // --------------------------------------------- Display Feature -------------------------------------------
    Route::get('/features_list', [App\Http\Controllers\FeatureEditController::class, 'displayFeatures'])->name('features_list');

    // --------------------------------------------- Edit Feature -------------------------------------------
    Route::get('/feature_edit/{feature_id}', [App\Http\Controllers\FeatureEditController::class, 'featureEdit'])->name('feature_edit');

    Route::post('/feature_edit_process/{feature_id}', [App\Http\Controllers\FeatureEditController::class, 'featureEditProcess'])->name('feature_edit_process');

    // --------------------------------------------- Delete Feature -------------------------------------------
    Route::get('/feature_delete/{feature_id}',[App\Http\Controllers\FeatureEditController::class, 'featureDelete'])->name('feature_delete');
// });

    Route::get('/guest', [App\Http\Controllers\Auth\LoginController::class,'guestLogin'])->name('login.guest');

    


