<html>
<head>
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
        <div class="main-content">
          <div class="main-content-image">
          </div>
          <div class="main-content-box">
            <div class="content-box-title">
              レシピタイトル
            </div>
            <div class="content-box-user">
              testuser
            </div>
            @foreach ($items as $item)
            <div class="content-box-text">
              {{$item->name}}
            </div>
            @endforeach
          </div>
        </div>
        <div class="main-content">
            <div class="main-content-image">
            </div>
            <div class="main-content-box">
              <div class="content-box-title">
                レシピタイトル
              </div>
              <div class="content-box-user">
                testuser
              </div>
              <div class="content-box-text">
                レシピの説明
              </div>
            </div>
          </div>
        </div>
      <div class="right-contents">
        <h1>tesyto</h1>
      </div>
    </div>
  </div>
</body>
</html>