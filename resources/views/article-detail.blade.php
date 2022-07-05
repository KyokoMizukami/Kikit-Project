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
    <link rel="stylesheet" href="{{ asset('resources/sass/article-detail.css') }}">
    <title>Document</title>
</head>
<body>
      <!------------------------------- header -------------------------->
  <header>
        <div class="header-nav">
            <div class="header-nav-list">
                <ul>
                @if(Auth::id()== 3)
                    <li><a href="/home"><img src="../img/logo.png" alt="画像がないよ"></a></li>
                    <a class="my-navbar-item" href="{{route('logout')}}">ログイン</a>
                    <a class="my-navbar-item" href="{{route('logout')}}">会員登録</a>
                @elseif(Auth::check())
                    <li><a href="/home"><img src="../img/logo.png" alt="画像がないよ"></a></li>
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
    
      <!------------------------------- main -------------------------->

      @foreach($kikit_article_details as $kikit_article_detail)
      <main>
        <h1>{{$kikit_article_detail['article_title']}}</h1>
        <img src="../{{$kikit_article_detail['article_img']}}" >
        <p>{{$kikit_article_detail['article_description']}}</p>
        <table>
            <tr><td>{{$kikit_article_detail['category']}}</td></tr>
            <tr><td>{{$kikit_article_detail['area']}}</td></tr>
            <tr><td>{{$kikit_article_detail['address']}}</td></tr>
        </table>
      </main>
      <!------------------------------ get adderess -------------------------->
      <input id="add" type="hidden" value="{{$kikit_article_detail['address']}}">
      @endforeach

      <!--------------------------- map ----------------------------->
      <div id="map"></div>
      <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
      <script src="https://maps.googleapis.com/maps/api/js?sensor=true&language=ja&region=JP&key=AIzaSyD-poWD2W_RM71hiPwLb6rejXQrAobW5xs">
      </script>
      <script type="text/javascript">
        var map = new google.maps.Map(
        document.getElementById("map"),{
            zoom : 10,
            center : new google.maps.LatLng(0,0),
            mapTypeId : google.maps.MapTypeId.ROADMAP
        }
        );
        // ジオコーディング
        var adrs = document.getElementById("add").value; // 住所住所
        var gc = new google.maps.Geocoder();
        gc.geocode({ address : adrs }, function(results, status){
        if (status == google.maps.GeocoderStatus.OK) {
            var ll = results[0].geometry.location;
            var glat = ll.lat();
            var glng = ll.lng();
            map.setCenter(ll);
            var myLatlng = new google.maps.LatLng(glat,glng);
            var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
           
    }); 
        }else{
            alert("マップを表示できません。");
        }
        });
</script>
</body>
</html>