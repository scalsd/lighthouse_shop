
<!doctype html>
<html lang="rus">

<head>
<title>Авторизация</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="stylesheet" href={{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}>
<link rel="stylesheet" href={{asset('backend/assets/vendor/bootstrap/css/custom.css')}}>
<link rel="stylesheet" href={{asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css')}}>

<link rel="stylesheet" href={{asset('backend/assets/css/main.css')}}>
<link rel="stylesheet" href={{asset('backend/assets/css/color_skins.css')}}>
</head>

<body class="theme-gold">
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src={{asset('backend/assets/images/logo.png')}} alt="logo" style="width: 200px; height: auto;">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Вход в аккаунт</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="signin-email" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('auth.failed') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Пароль</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="signin-password" placeholder="Пароль">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('auth.password') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Войти</button>
                                <div class="bottom">
                                    <span>Еще нет аккаунта? <a href="{{route("register")}}" style="color: #7b551c">Зарегистрироваться</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
