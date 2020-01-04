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
      <div class="process-main-contents">
        <div class="process-main-content">
          <div class="process-main-content-title">
            <div class="title-box">
              <div class="recipe-title">
                {{$recipe->title}}
              </div>
              <div class="recipe-user">
                by {{$user->name}}
              </div>
            </div>
          </div>
          <div class="process-main-content-recipe">
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
          <div class="process-main-content-process">
            <div class="main-content-process-text">
              作り方
            </div>
            <form method="POST" action="{{ route('recipe.process_store') }}" class="process-content-box">
            @csrf
              <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
              <div class="process-form-erea" id="process-form-erea">
                <div class="process-form-box">
                  <div class="process-input-box">
                    <div class="process-form-box-minus">
                      ー
                    </div>
                    <input type="hidden" name="order[]" class="input-erea-number" value="">
                    <div class="order-number">
                      1
                    </div>
                    <textarea name="process[]" rows="4" cols="80" placeholder="ここに作り方を記入してください" class="input-erea"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-box-plus" id="process-form-box-plus">
                +
              </div>
              <button type="submit" class="process-submit-btn">
                作り方を登録する
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>