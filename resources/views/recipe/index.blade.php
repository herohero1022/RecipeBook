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
            <input type="text" name="keyword" placeholder="料理名を入力" class="header-contents-top-serch">
            <input type="submit" value="検索" class="search-btn">
          </form>
        </div>
        @auth
          <div class="header-contents-bottom">
            <div class="username">
              こんにちは！{{$currentuser->name}}さん
            </div>
            <a href="{{ route('recipe.new') }}" class="header-btn">
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
            <a href="{{ route('register') }}" class="header-btn">
            <div class="header-contents-bottom-regibtn">
              新規会員登録
            </div>
            </a>
            <a href="{{ route('login') }}" class="header-btn">
            <div class="header-contents-bottom-loginbtn">
              ログイン
            </div>
            </a>
          </div>
        @endguest
      </div>
    </div>
    <div class="home-contents">
      <div class="main-contents">
        <div class="main-contents-text">
          レシピの一覧
        </div>
        @foreach ($recipes as $recipe)
        <div class="main-content">
          <div class="main-content-image">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="image" style="width: 150px; height: 150px;"/>
          </div>
          <div class="main-content-box">
            <a href="{{ action('RecipeController@show', $recipe->id) }}" class="recipe-show-link">
              <div class="content-box-title">
                {{$recipe->title}}
              </div>
            </a>
            <div class="content-box-user">
              by {{$recipe->user->name}}
            </div>
            <div class="content-box-text">
              {!!  nl2br($recipe->description) !!}
            </div>
            <div class="content-box-ingredients">
              <div class="ingredients-box-text">
                材料：
              </div>
              <div class="ingredients-box">
                @foreach($recipe->materials as $material)
                  <div class="ingredients">
                    {{$material->ingredients}}
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="link-box">
          {{ $recipes->links() }}
        </div>
      </div>
      <div class="right-contents">
        <div class="right-contents-text">
          最新レシピ
        </div>
        @foreach ($new_recipes as $new_recipe)
        <div class="right-content">
          <div class="right-content-image">
            <img src="{{ asset('storage/' . $new_recipe->image) }}" alt="image" style="width: 100px; height: 100px;"/>
          </div>
          <div class="right-content-box">
            <a href="{{ action('RecipeController@show', $new_recipe->id) }}" class="recipe-show-link">
              <div class="content-right-box-title">
                {{$new_recipe->title}}
              </div>
            </a>
            <div class="content-box-user">
              by {{$new_recipe->user->name}}
            </div>
            <div class="content-box-text">
              {!!  nl2br($new_recipe->description) !!}
            </div>
          </div>
        </div>
        @if ($loop->index == 8)
          @break
        @endif
        @endforeach
      </div>
    </div>
  </div>
</body>
</html>