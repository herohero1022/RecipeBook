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
      <div class="recipe-header">
          <a href="{{ action('RecipeController@index') }}" class="header-logo">
            Recipebook
          </a>
      </div>
      <div class="edit-main-contents">
        <div class="edit-main-content">
          <div class="edit-main-content-title">
            <div class="title-box">
              <div class="recipe-title">
                {{$recipe->title}}
              </div>
              <div class="recipe-user">
                by {{$user->name}}
              </div>
              <a href="{{ action('RecipeController@recipe_edit', $recipe->id) }}" class="recipe-edit-link">編集する</a>
            </div>
          </div>
          <div class="edit-main-content-recipe">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="image" style="width: 40%; hight: auto;"/>
            <div class="material-table-box">
              <div class="material-table-text-box">
                <div class="material-table-text">
                  材料
                </div>
                <a href="{{ action('MaterialController@edit', $recipe->id) }}" class="material-edit-link">編集する</a>
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
          <div class="edit-main-content-edit">
            <div class="main-content-edit-text-box">
              <div class="main-content-edit-text">
                作り方
              </div>
              <a href="{{ action('ProcessController@edit', $recipe->id) }}" class="process-edit-link">編集する</a>
            </div>
            <div class="main-content-edit">
              @foreach($processes as $process)
              <div class="process-box">
                <div class="order-number">
                  {{$process->order}}
                </div>
                <div class="process-text">
                  {!!  nl2br($process->process) !!}
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class ="form-btn-box">
            <form method="POST" action="{{ route('recipe.preview_store') }}" class="prview-form">
              @csrf
              {{ method_field('patch') }}
              <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
              <input type="hidden" name="status" value="open">
              <button type="submit" class="edit-btn">
                レシピを公開する
              </button>
            </form>
            <form method="POST" action="{{ route('recipe.close') }}" class="prview-form">
              @csrf
              <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
              <input type="hidden" name="status" value="close">
              <button type="submit" class="edit-btn">
                レシピを非公開にする
              </button>
            </form>
            <form method="POST" action="{{ route('recipe.delete') }}" class="prview-form">
                @csrf
              <input name="_method" type="hidden" value="DELETE">
              {{ method_field('delete') }}
              <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
              <button type="submit" class="edit-btn">
                レシピを削除する
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="recipe-fotter">
      </div>
    </div>
  </body>
</html>