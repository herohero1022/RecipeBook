<html>
  <head>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <title>
        recipe/add
      </title>
  </head>
  <body>
    <div class="home-wrapper">
      <div class="recipe-header">
        Recipebook
      </div>
      <div class="add-main-contents">
        <div class="add-content">
          <div class="add-content-title">
            新しいレシピの登録
          </div>
          <form method="POST" action="{{ route('recipe.update') }}" enctype="multipart/form-data" class="add-content-box">
            {{ method_field('patch') }}
            @csrf
            <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
            <input type="hidden" name="user_id" value="{{$user->id}}"/>
            <div class="form-box">
              <div class="form-box-text">
                レシピのタイトル
              </div>
            <input type="text" name="title" class="input-erea" placeholder="例：鳥もも肉のさっぱり煮" value="{{$recipe->title}}">
            </div>
            <div class="form-box">
              <div class="form-box-text">
                画像のアップロード
              </div>
              <input type="file" name="image" class="add-input-image">
            </div>
            <div class="form-box">
              <div class="form-box-text">
                レシピのキャッチコピー
              </div>
            <input type="text" name="description" class="input-erea"  placeholder="例：ポン酢で煮込む優しい口当たりの味付けです" value="{{$recipe->description}}">
            </div>
            <button type="submit" class="add-submit-btn">
              編集する
            </button>
            </div>
          </form>
        </div>
        <div class="recipe-fotter">
        </div>
      </div>
    </div>
  </body>
</html>