<html>
  <head>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <title>
        recipe/add
      </title>
  </head>
  <body>
      <form method="POST" action="{{ route('recipe.store') }}" enctype="multipart/form-data">
      @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}"/>
        <input type="file" name="image">
        <input type="text" name="title">
        <input type="text" name="description">
        <button type="submit">
            アップロード
        </button>
      </form>
      <?php
      Debugbar::addMessage($user);
      ?>
      @foreach($recipes as $recipe)
        <div>
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="image" style="width: 30%; height: auto;"/>
        </div>
      @endforeach
  </body>
</html>