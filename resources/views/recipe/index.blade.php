<html>
<head>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <title>
    home/index
  </title>
</head>
<body>
  <div class="home-wrapper">
    <div class="home-header">
      <div class="header-contents">
        <div class="header-contents-top">
          <h2 class="header-contents-top-title">RecipeBock</h2>
          <div class="header-contents-top-serch">
            レシピを検索
            <i class="fas fa-search"></i>
          </div>
        </div>
        <div class="header-contents-bottom">
          <div class="header-contents-bottom-regibtn">
            新規会員登録
          </div>
          <div class="header-contents-bottom-loginbtn">
            ログイン
          </div>
        </div>
      </div>
    </div>
    <div class="home-contents">
      <div class="left-contents">
      </div>
      <div class="main-contents">
        @foreach ($recipes as $recipe)
        <div class="main-content">
          <div class="main-content-image">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="image" style="width: 120px;"/>
          </div>
          <div class="main-content-box">
            <div class="content-box-title">
              {{$recipe->title}}
            </div>
            <div class="content-box-user">
              by {{$recipe->user->name}}
            </div>
            <div class="content-box-text">
              {{$recipe->description}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="right-contents">
        <h1>tesyto</h1>
      </div>
    </div>
  </div>
</body>
</html>