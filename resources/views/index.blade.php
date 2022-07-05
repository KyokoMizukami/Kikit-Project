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
    <link rel="stylesheet" href="{{ asset('resources/sass/style.css') }}">
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

    <!---------------------------- features ---------------------------->
    <main>
        <div class="featurs-content">
            <h1>おすすめ特集</h1>
            <div class="features-wrap">  
                @foreach($features as $feature)  

                <div class="feature-each">
                    <div class="feature-each-img">
                        <a href="{{route('feature_detail',['feature_id' => $feature['feature_id']])}}"><img src="{{ $feature['feature_img'] }}"></a>
                    </div>
                    <a href="{{route('feature_detail',['feature_id' => $feature['feature_id']])}}"><h2>{{ $feature['feature_name']}}</h2></a>
                </div>
                @endforeach
            </div>
        </div>
          <!---------------------------- select ---------------------------->
        <div class="select-form-wrap">
            <form class="select-form" action="{{ route('select')}}" method="post">
                @csrf
                <div class="select-box" style="display:inline-flex">    
                <label for="select-box1" class="label select-box1"><span class="label-desc">エリア選択</span> </label>
                <select id="select-box1" class="select1" name="select_area">
                    <option value="北海道">北海道</option>
                    <option value="東北">東北</option>
                    <option value="関東">関東</option>
                    <option value="中部">中部</option>
                    <option value="近畿">近畿</option>
                    <option value="中国・四国">中国・四国</option>
                    <option value="九州">九州</option>
                    <option value="沖縄">沖縄</option>
                </select>
                </div>
                <div class="select-box" style="display:inline-flex">
                <label for="select-box1" class="label select-box1"><span class="label-desc">カテゴリ</span> </label>
                <select id="select-box2" class="select2" name="select_category">
                    <option value="見る">見る</option>
                    <option value="食べる">食べる</option>
                    <option value="遊ぶ">遊ぶ</option>
                </select>
                </div> 
                <input type="submit" value="検索" id="search">       
            </form>  
        </div>
  <!---------------------------- main ---------------------------->
  <div class="main-contents-wrap">

    @foreach($kikit_articles as $kikit_article)
      <div class="main-content-each">
          <div class="main-content-each-img">
              <img src="{{ $kikit_article['article_img'] }}">
          </div>
          <div class="main-content-each-description">
            <a href="{{route('article_detail',['article_id' => $kikit_article['article_id']])}}"><h1>{{ $kikit_article['article_title']}}</h1></a>
          </div>
      </div>
    @endforeach

      
  </div>

    </main>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>