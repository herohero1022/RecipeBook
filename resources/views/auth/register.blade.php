<html>
  <head>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <title>
        recipe/add
      </title>
  </head>
  <body>
    <div class="home-wrapper">
      <div class="register-contents">
        <div class="recipe-header">
          <a href="{{ action('RecipeController@index') }}" class="header-logo">
            Recipebook
          </a>
        </div>
        <div class="register-main">
          <div class="register-main-content">
            <div class="register-main-content-text">
              新規会員登録
            </div>
            <div class="form-box">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <div class="form-controll-text">
                    ニックネーム
                  </div>
                  <input id="name" type="text" class="input-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="form-controll-text">
                    メールアドレス
                  </div>
                  <input id="email" type="email" class="input-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                  <input id="password" type="password" class="input-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="form-controll-text">
                    パスワード 再入力
                  </div>
                  <input id="password-confirm" type="password" class="input-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="register-btn">
                  登録する
                </button>
                <a href="{{ url('login/github') }}">
                  <div class="github-btn">
                    GitHubアカウントで登録
                  </div>
                </a>
                <a href="{{ url('login/github') }}">
                <div class="google-btn">
                    Googleアカウントで登録
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