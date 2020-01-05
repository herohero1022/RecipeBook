<html>
  <head>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <title>
        recipe/add
      </title>
  </head>
  <body>
    <div class="recipe-wrapper">
      <div class="recipe-header">
        Recipebook
      </div>
      <div class="add-main-contents">
        <div class="add-content">
          <div class="add-content-title">
            新しいレシピの登録
          </div>
          <form method="POST" action="{{ route('recipe.store') }}" enctype="multipart/form-data" class="add-content-box">
            @csrf
            <input type="hidden" name="status" value="close"/>
            <input type="hidden" name="user_id" value="{{$user->id}}"/>
            <div class="form-box">
              <div class="form-box-text">
                レシピのタイトル
              </div>
              <input type="text" name="title" class="input-erea" placeholder="例：鳥もも肉のさっぱり煮">
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
              <input type="text" name="description" class="input-erea"  placeholder="例：ポン酢で煮込む優しい口当たりの味付けです">
            </div>
            <button type="submit" class="add-submit-btn">
              材料の入力に進む
            </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>