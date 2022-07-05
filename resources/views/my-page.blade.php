<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100&family=Zen+Maru+Gothic:wght@500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('resources/sass/my-page.css') }}">
    <title>Document</title>
</head>
<body>
    <!------------------------------- header -------------------------->
  <header>
        <div class="header-nav">
            <div class="header-nav-list">
                <ul>
                @if(Auth::id()== 3)
                    <li><a href="/home"><img src="img/logo.png" alt="画像がないよ"></a></li>
                    <a class="my-navbar-item" href="{{route('logout')}}">ログイン</a>
                    <a class="my-navbar-item" href="{{route('logout')}}">会員登録</a>
                @elseif(Auth::check())
                    <li><a href="/home"><img src="img/logo.png" alt="画像がないよ"></a></li>
                    <li><span class="my-navbar-item">{{ Auth::user()->name }}さんようこそ！</span></li>
                    <li><a href="{{route('my_page')}}">マイページ</a></li>
                    <li><a href="{{route('create-form')}}">投稿</a></li>
                    @if(Auth::id() == 1)
                        <li><a href="{{route('add_feature')}}">特集追加</a></li>
                        <li><a href="{{route('features_list')}}">特集一覧</a></li>
                    @endif
                        <a href="{{route('logout')}}" class="my-navbar-item" style="padding-left:20px;">ログアウト</a>
                @endif

                </ul>
            </div>
        </div>
        <img src="">
    </header>

    <!------------------------------ main ----------------------------->
    <main>
      <div class="top-contents">
      <h2>My Page</h2>
        <table>
            <tr>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td>{{ Auth::user()->email }}</td>
            </tr>
        </table>
      </div>
        <div class="main-contents-wrap">
            @foreach($mypage_article as $mypage_articles)
            <div class="main-content-each">
                <div class="main-content-each-img">
                    <img src="{{ $mypage_articles['article_img'] }}">
                </div>
                <div class="main-content-each-description">
                    <button id="edit-button"><a href="{{route('article_edit',['article_id' => $mypage_articles['article_id']])}}">編集</a></button>
                    <button id="delete-button"><a href="{{route('article_delete',['article_id' => $mypage_articles['article_id']])}}">削除</a></button>
                    <a href="{{route('article_detail',['article_id' => $mypage_articles['article_id']])}}"><h1 id="description">{{ $mypage_articles['article_title'] }}</h1></a>
                </div>
            </div>
            @endforeach
        </div>
    </main>
    </body>