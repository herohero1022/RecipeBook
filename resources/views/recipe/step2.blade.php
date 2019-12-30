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
      <div class="material-main-contents">
          <div class="material-content">
            <div class="material-content-title">
              材料の登録
            </div>
            <form method="POST" action="{{ route('recipe.material_store') }}" class="material-content-box">
              @csrf
              <div class="material-content-box-top">
                <div class="content-box-ingredients">
                  材料・調味料
                </div>
                <div class="content-box-quantity">
                  分量
                </div>
              </div>
              <div class="material-form-erea" id="material-form-erea">
                <div class="material-form-box">
                  <input type="hidden" name="recipe_id" value="{{$recipe_id}}"/>
                  <div class="material-input-box">
                    <input type="text" name="ingredients[]" placeholder="例：鳥もも肉" class="input-erea">
                    <input type="text" name="quantity[]" placeholder="例：250g" class="input-erea">
                    <div class="form-box-minus">
                      ー
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-box-plus" id="material-form-box-plus">
                +
              </div>
              <button type="submit" class="material-submit-btn">
                作り方の入力に進む
              </button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </body>
</html>