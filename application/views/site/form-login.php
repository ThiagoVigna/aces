<!DOCTYPE HTML>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<title><?php if ( isset($titulo) ) {
			echo $titulo;
		} ?></title>

	<!--<link rel="stylesheet" type="text/css" href="<?php /*echo base_url('assets/css/style.css') */ ?>">-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">


	<script src="<?php echo base_url('assets/js/index.js') ?>"></script>
	<script src="https://kit.fontawesome.com/2d8a6015e9.js"></script>
</head>
<body id="container-imagem">
<div class="cotn_principal col-12">
	<div class="row mr-2">
		<div class="col-md-1"></div>
		<div class=" col-md-6 pad text-uppercase">
			<h1 class="text-white">A maior comunidade de inglês do Brasil</h1>
			<p class="text-white">Cadastre-se e participe da maior comunidade de inglês do Brasil.
				Conheça gente interessante, aprimore seu inglês e amplie seu <i> networking.</i></p>
			<p>
				<a href="/" class="btn btn-link text-white">
					SAIBA MAIS <i class="fas fa-arrow-right"></i>
				</a>
			</p>
		</div>
		<div class="col-md-3">
			<div class="modal-static">
				<div class="pt-5">
					<div class="login-wrap">
						<div class="login-html">
							<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" style="color: white">Sign
								In</label>
							<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" style="color: white">Sign
								Up</label>
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
										<a href="#">Forgot Password?</a>
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
										<label for="tab-1" class="foot-lnk">Already Member?</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="site-footer">
		<nav>
			<ul>
				<li><a href="#">Quem Somos</a></li>
				<li><a href="#">Mapa do Site</a></li>
				<li><a href="#">Serviços</a></li>
			</ul>
		</nav>
		<div class="line"></div>
		<div class="test-page"> Powered By: <b>dotCREATIVE</b> </div>
		<p class="ml-5 pt-2 company">ACES Comunity</p>
		<p class="ml-5 company">&copy 2020</p>


	</footer>

</div>
</body>
</html>
