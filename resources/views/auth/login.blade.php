<html>
  <head>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <title>
        recipe/add
      </title>
  </head>
  <body>
    <div class="recipe-wrapper">
      <div class="register-contents">
        <div class="recipe-header">
          <a href="{{ action('RecipeController@index') }}" class="header-logo">
            Recipebook
          </a>
        </div>
        <div class="register-main">
          <div class="register-main-content">
            <div class="register-main-content-text">
              ログイン情報の入力
            </div>
            <div class="form-box">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <div class="form-controll-text">
                    メールアドレス
                  </div>
                  <input id="email" type="email" class="input-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="form-controll-text">
                    パスワード
                  </div>
                  <input id="password" type="password" class="input-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button type="submit" class="register-btn">
                  ログイン
                </button>
                <a href="{{ url('login/github') }}">
                  <div class="github-btn">
                    GitHubアカウントでログイン
                  </div>
                </a>
              </form>
            </div>
          </div>
        </div>
        <div class="register-footer">
        </div>
      </div>
    </div>
  </body>
</html>