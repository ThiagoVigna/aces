<!DOCTYPE HTML>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">

</head>

<body>
<div class=" cotn_principal">

	<div class="container">
		<div class="texto1">
			<h1>A maior comunidade de<br>inglês do Brasil</h1>
		</div>
		<div class="texto2">
			<p>Cadastre-se e participe da maior comunidade de inglês do Brasil. Conheça gente interessante,<br> aprimore
				seu inglês e amplie seu <i>networking.</i></p>
		</div>
		<div class="seta">
			<p>
				<a href="#" class="btn btn-link text-white">
					SAIBA MAIS <i class="fas fa-arrow-right"></i>
				</a>
			</p>
			<div>
				<ul>
					<li>
						<div><a href="<?php /*echo base_url('quem_somos') */ ?>"> Teste </a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="login-wrap">
		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
				In</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
			<div class="login-form">
				<div class="sign-in-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="user" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pass" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Keep me Signed in</label>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign In">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">Forgot Password?</a>

					</div>

				</div>
				<div class="sign-up-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="user" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pass" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<label for="pass" class="label">Repeat Password</label>
						<input id="pass" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<label for="pass" class="label">Email Address</label>
						<input id="pass" type="text" class="input">
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign Up">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<label for="tab-1">Already Member?</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/js/index.js') ?>"></script>
<script src="https://kit.fontawesome.com/2d8a6015e9.js"></script>

</body>
</html>
