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
							<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" style="color: white">Entrar</label>
							<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" style="color: white">Cadastrar</label>
							<form class="login-form" name="tab-1" method="POST" action="<?php echo base_url('app/dashboard')?>">
								<div class="sign-in-htm">
									<div class="group">
										<label  type="email" for="user" class="label">Usuario/Email</label>
										<input name="txt_auth_email" id="user" type="text" class="input">
									</div>
									<div class="group">
										<label for="pass" class="label">Senha</label>
										<input name="txt_auth_password" id="pass" type="password" class="input" data-type="password">
									</div>
									<div class="group">
										<input id="check" type="checkbox" class="check" checked>
										<label for="check"><span class="icon"></span> Mantenha-me conectado</label>
									</div>
									<div class="group">
										<input type="submit" class="button" value="Entrar">
									</div>
									<div class="hr"></div>
									<div class="foot-lnk">
										<a href="#">Esqueceu a senha?</a>
									</div>
								</div>

							<form class="login-form" name="tab-2" method="POST" action="<?php echo base_url('app/dashboard') ?>">
								<div class="sign-up-htm">
									<div class="group">
										<label for="user" class="label">Nome</label>
										<input id="user" type="text" class="input">
									</div>
									<div class="group">
										<label for="user" class="label">Sobrenome</label>
										<input id="user" type="text" class="input">
									</div>
									<div class="group">
										<label for="pass" class="label">Senha</label>
										<input id="pass" type="password" class="input" data-type="password">
									</div>
									<div class="group">
										<label for="pass" class="label">Repita a senha</label>
										<input id="pass" type="password" class="input" data-type="password">
									</div>
									<div class="group">
										<label for="pass" class="label">Endereço de Email</label>
										<input id="pass" type="text" class="input">
									</div>
									<div class="group">
										<input type="submit" class="button" value="Inscrever-se">
									</div>
									<div class="hr"></div>
									<div class="foot-lnk">
										<label for="tab-1">Já é membro?</label>
									</div>
								</div>
							</form>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="site-footer">
		<nav>
			<ul>
				<li><a href="<?= base_url('site/quem_somos') ?>">Quem Somos</a></li>
				<li><a href="#">Mapa do Site</a></li>
				<li><a href="#">Serviços</a></li>
			</ul>
		</nav>
		<div class="line"></div>
		<div class="test-page"> Powered By: <b>dotCREATIVE</b> </div>
		<p class="ml-5 pt-2 company">ACES Community</p>
		<p class="ml-5 company">&copy 2020</p>


	</footer>

</div>
</body>
</html>
