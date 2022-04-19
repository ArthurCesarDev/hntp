<!DOCTYPE html>
<html lang="en">
<head>
	<title>Medida Certa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

<link rel="stylesheet" href="{{url('assets/css/login_1.css')}}"/>
  <link rel="stylesheet" href="{{url('assets/css/login.css')}}"/>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" class="login100-form validate-form">

        @csrf
					<span class="login100-form-title p-b-26">
						Medida Certa
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Loja"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button value="login" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
          @if ($error)
         <div class="error">{{$error}}</div>
          @endif

					<div class="text-center p-t-115">
						<span class="txt1">
						Ainda não tem cadastro? 
						</span>

						<a class="txt2" href="{{url('admin/')}}">
							Cadastra-se
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	


</body>
</html>