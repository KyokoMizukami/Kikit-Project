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
    <link rel="stylesheet" href="{{ asset('resources/sass/create-form.css') }}">
    <title>Document</title>
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

    <!------------------------------- main -------------------------->
    <main>
    <div class="create-form-wrap">
      <div class="panel-body">
        @if($errors->any())
        <div class="alert alert-danger" style="color:red; text-align:left; margin:0 auto; width: 15vw">
          <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
      @foreach($kikit_article_edits as $kikit_article_edit)
      <form action="{{route('article_edit_process',['article_id' => $kikit_article_edit['article_id']])}}" method="post" enctype="multipart/form-data">
      @csrf
        <label for="title">タイトル</label>
        <input type="text" name="article_title" value="{{$kikit_article_edit['article_title']}}" />
        <label for="description" name="description">本文</label>
        <textarea name="article_description"  cols="30" rows="10">{{$kikit_article_edit['article_description']}}</textarea>
        <label for="select-box1" class="label select-box1">
            <span class="label-desc">エリア</span>
        </label>
        <select id="select-box1" class="select" name="area">
          <option value="北海道">北海道</option>
          <option value="東北">東北</option>
          <option value="関東">関東</option>
          <option value="中部">中部</option>
          <option value="近畿">近畿</option>
          <option value="中国・四国">中国・四国</option>
          <option value="九州">九州</option>
          <option value="沖縄">沖縄</option>
        </select>
        <label for="select-box1" class="label select-box1"
          ><span class="label-desc">カテゴリ</span>
        </label>
        <select name="category" class="select-area">
            <option value="見る">見る</option>
            <option value="食べる">食べる</option>
            <option value="遊ぶ">遊ぶ</option>
        </select>
        <label for="address">住所</label>
        <input type="text" name="address" value="{{$kikit_article_edit['address']}}"/>
        @if(Auth::id() == 1)
        <select name="feature" class="select-area">
            <option value="0">特集対象外</option>
        @foreach($kikit_feature as $kikit_features)
            <option value="{{$kikit_features['feature_id']}}">{{$kikit_features['feature_name']}}</option>
        @endforeach
        </select>
        @endif
        <!--won't be used  -->
        <input type="hidden" name="article_img" value="a">
        <!------------------->
        <input type="submit" value="確定" id="submit" />
      </main>
      @endforeach
    </form>
    </div>
</body>
</html>