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
    <body>

    <!---------------------------------- main --------------------------------------->
    <div class="panel-body">
        @if($errors->any())
        <div class="alert alert-danger" style="color:red; text-align:left; margin:0 auto; width: 20vw">
          <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    @foreach($feature_edits as $feature_edit)
      <form action="{{route('feature_edit_process',['feature_id' => $feature_edit['feature_id']])}}" method="post" enctype="multipart/form-data">
      @csrf
      <main>
        <label for="title">タイトル</label>
        <input type="text" name="feature_name" value="{{$feature_edit['feature_name']}}" />
        <label for="description" name="feature_description">本文</label>
        <textarea name="feature_description"  cols="30" rows="10">{{$feature_edit['feature_description']}}</textarea>
        <!-- won't be used  -->
        <input type="hidden" name="feature_img" value="a">
        <!--------------------->
        <input type="submit" value="確定" id="submit" />
      </main>
    @endforeach
     </form>
</body>
</html>