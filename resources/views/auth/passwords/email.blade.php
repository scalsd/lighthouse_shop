
<!doctype html>
<html lang="rus">

<head>
<title>Восстановление пароля</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!-- VENDOR CSS -->
<link rel="stylesheet" href={{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}>
<link rel="stylesheet" href={{asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css')}}>

<!-- MAIN CSS -->
<link rel="stylesheet" href={{asset('backend/assets/css/main.css')}}>
<link rel="stylesheet" href={{asset('backend/assets/css/color_skins.css')}}>
</head>

<body class="theme-gold">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                    <img src={{asset('backend/assets/images/logo.png')}} alt="logo" style="width: 200px; height: auto;">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Восстановление пароля</p>
                        </div>
                        <div class="body">
                            <p>Введите адрес своей электронной почты, чтобы получить инструкции по восстановлению пароля.</p>
                            <form class="form-auth-small" action="index.html">
                                <div class="form-group">                                    
                                    <input type="email" class="form-control" id="signin-email" placeholder="Email">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Сбросить пароль</button>
                                <div class="bottom">
                                    <span class="helper-text">Знаете свой пароль? <a href="{{ route('login') }}" style="color: #7b551c">Войти</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>

