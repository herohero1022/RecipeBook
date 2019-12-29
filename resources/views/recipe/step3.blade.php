<html>
  <head>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <script src="{{ asset('js/app.js') }}" defer></script>
      <title>
        recipe/add
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
      <div class="prosess-main-contents">
        <div class="prosess-main-content">
          <div class="prosess-main-content-title">
            <div class="title-box">
              <div class="recipe-title">
                {{$recipe->title}}
              </div>
              <div class="recipe-user">
                by {{$user->name}}
              </div>
            </div>
          </div>
          <div class="prosess-main-content-recipe">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="image" style="width: 40%; hight: auto;"/>
            <div class="material-table-box">
              <div class="material-table-text">
                材料
              </div>
              <table class="material-table">
                @foreach($materials as $material)
                <tr>
                  <td>{{$material->ingredients}}</td>
                  <td>{{$material->quantity}}</td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          <div class="prosess-main-content-prosess">
            <div class="main-content-prosess-text">
              作り方
            </div>
            <form method="POST" action="{{ route('recipe.prosess_store') }}" class="prosess-content-box">
            @csrf
              <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
              <div class="prosess-form-erea" id="prosess-form-erea">
                <div class="prosess-form-box">
                  <div class="prosess-input-box">
                    <div class="prosess-form-box-minus">
                      ー
                    </div>
                    <input type="hidden" name="order[]" class="input-erea-number">
                    <div class="order-number">
                      1
                    </div>
                    <textarea name="proess" rows="4" cols="80" placeholder="ここに作り方を記入してください" class="input-erea"></textarea>
                    {{-- <input type="texterea" name="prosess[]" placeholder="例：鳥もも肉" class="input-erea"> --}}
                  </div>
                </div>
              </div>
              <div class="form-box-plus" id="prosess-form-box-plus">
                +
              </div>
              <button type="submit" class="prosess-submit-btn">
                作り方を登録する
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>