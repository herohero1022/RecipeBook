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
        Recipebook
      </div>
      <div class="show-main-contents">
        <div class="show-main-content">
          <div class="show-main-content-title">
            <div class="title-box">
              <div class="recipe-title">
                {{$recipe->title}}
              </div>
              <div class="recipe-user">
                by {{$user->name}}
              </div>
            </div>
          </div>
          <div class="show-main-content-recipe">
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
          <div class="show-main-content-show">
            <div class="main-content-show-text">
              作り方
            </div>
            <div class="main-content-show">
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
          @if($recipe->user_id == $currentuser->id)
            <a href="{{ action('RecipeController@edit', $recipe->id) }}" class="show-btn">編集する</a>
          @endif
        </div>
      </div>
      <div class="recipe-fotter">
      </div>
    </div>
  </body>
</html>