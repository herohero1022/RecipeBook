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
          <h2 class="header-contents-top-title">RecipeBook</h2>
          <form method="GET" action="{{ route('search.index') }}" class="form-box">
            <input type="text" name="keyword" placeholder="料理名か材料名を入力" class="header-contents-top-serch">
            <input type="submit" value="検索" >
            {{-- <div class="header-contents-top-serch">
              レシピを検索
              <i class="fas fa-search"></i>
            </div> --}}
          </form>
        </div>
        @auth
          <div class="header-contents-bottom">
            <a href="{{ route('recipe.new') }}">
              <div class="header-contents-bottom-regibtn">
                レシピを書く
              </div>
            </a>
            <a href="{{ route('logout') }}"
              class="header-contents-bottom-loginbtn"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        @endauth
        @guest
          <div class="header-contents-bottom">
            <a href="{{ route('register') }}">
            <div class="header-contents-bottom-regibtn">
              新規会員登録
            </div>
            </a>
            <a href="{{ route('login') }}">
            <div class="header-contents-bottom-loginbtn">
              ログイン
            </div>
            </a>
          </div>
        @endguest
      </div>
    </div>
    <div class="home-contents">
      <div class="left-contents">
      </div>
      <div class="main-contents">
        @foreach ($recipes as $recipe)
        <div class="main-content">
          <div class="main-content-image">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="image" style="width: 120px; height: 120px;"/>
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
        {{ $recipes->links() }}
      </div>
      <div class="right-contents">
        <h1>tesyto</h1>
      </div>
    </div>
  </div>
</body>
</html>