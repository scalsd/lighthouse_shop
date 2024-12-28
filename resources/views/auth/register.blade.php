<!doctype html>
<html lang="rus">

<head>
    <title>Регистрация</title>
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
                            <p class="lead">Регистрация</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST" action="{{ route('user.register.post') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="register-name" class="control-label sr-only">Имя</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus id="register-name" placeholder="Имя">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="register-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required id="register-email" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="register-password" class="control-label sr-only">Пароль</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="register-password" placeholder="Пароль">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="register-password-confirm" class="control-label sr-only">Подтверждение пароля</label>
                                    <input type="password" class="form-control" name="password_confirmation" required id="register-password-confirm" placeholder="Подтверждение пароля">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Зарегистрироваться</button>
                                <div class="bottom">
                                    <span>Уже есть аккаунт? <a href="{{route("login")}}" style="color: #7b551c">Войти</a></span>
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
