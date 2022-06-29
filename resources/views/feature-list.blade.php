<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100&family=Zen+Maru+Gothic:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/sass/my-page.css') }}">
</head>
<body>
   <!------------------------------- header -------------------------->
   <header>
        <div class="header-nav">
            <div class="header-nav-list">
                <ul>
                @if(Auth::check())
                <li><a href="/home"><img src="img/logo.png" alt="画像がないよ"></a></li>
                <li><span class="my-navbar-item">{{ Auth::user()->name }}さんようこそ！</span></li>
                <li><a href="{{route('my_page')}}">マイページ</a></li>
                <li><a href="{{route('create-form')}}">投稿</a></li>
                <li>お気に入り</li>
                @if(Auth::id() == 1)
                <li><a href="{{route('add_feature')}}">特集追加</a></li>
                <li><a href="{{route('features_list')}}">特集一覧</a></li>
                @endif
                <a href="{{route('logout')}}" class="my-navbar-item">ログアウト</a>

                @else
                    <a class="my-navbar-item" href="{{route('login')}}">ログイン</a>
                    <a class="my-navbar-item" href="{{route('register') }}">会員登録</a>
                @endif

                </ul>
            </div>
        </div>
        <img src="">
    </header>
     <!---------------------------- main ---------------------------->
     <main>
    <div class="main-contents-wrap">

    @foreach($feature_lists as $feature_list)
        <div class="main-content-each">
            <div class="main-content-each-img">
                <img src="{{ $feature_list['feature_img'] }}">
            </div>
            <div class="main-content-each-description">
                <button id="edit-button"><a href="{{route('feature_edit',['feature_id' => $feature_list['feature_id']])}}">編集</a></button>
                <button id="delete-button"><a href="{{route('feature_delete',['feature_id' => $feature_list['feature_id']])}}">削除</a></button>
                <h1 id="description">{{ $feature_list['feature_name']}}</h1></a>
            </div>
        </div>
    @endforeach
  
    </div>
    </main>

  
