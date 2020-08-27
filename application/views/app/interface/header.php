<!-- header.php -->
<nav class="navbar navbar-expand-md navbar-light bg-light shadow  ">
	<div class="container " style="margin-left: 0">
		<a class="navbar-brand" href="#"><img src="<?= base_url('assets/images/logo.png'); ?>" style="width: 150px;"
											  alt="Logo"></a>
		<button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div
				class="collapse navbar-collapse" id="navcol-1">
			<ul class="nav navbar-nav">
				<li class="nav-item" role="presentation">
					<a class="btn btn-link border-0" href="#">
						<span class="d-none d-sm-none d-md-block">
							<img src="<?= base_url('public/images/icons-home.png') ?>">
						</span>
						<span class="d-sm-block d-md-none">Home</span>
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a href="/" class="btn btn-link border-0">
						<span class="d-none d-sm-none d-md-block">
							<img src="<?= base_url('public/images/icons-alerts.png') ?>">
							<sub><span class="badge badge-pill badge-danger badge-with-icon">123</span></sub>
						</span>
						<span class="d-sm-block d-md-none">Alerta</span>
					</a>
				</li>
				<li class="nav-item" role="presentation">
					<a href="/" class="btn btn-link border-0">
						<span class="d-none d-sm-none d-md-block">
							<img src="<?= base_url('public/images/icons-mail.png') ?>">
							<sub><span class="badge badge-pill badge-danger badge-with-icon">123</span></sub>
						</span>
						<span class="d-sm-block d-md-none">Email</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!---->
	<!--	<form class="form-inline ml-auto">-->
	<!---->
	<!--		<div class="input-group">-->
	<!--			<input type="text" class="form-control" placeholder="Busca" aria-label="Search" aria-describedby="search">-->
	<!--			<div class="input-group-append">-->
	<!--				<a href="#" class="btn btn-info"><i class="fas fa-search"></i></a>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</form>-->

	<ul class="navbar-nav d-none d-sm-none d-md-block">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="profile_dropdown" role="button" data-toggle="dropdown"
			   aria-haspopup="true" aria-expanded="false">
        <span class="fa-stack fa-1x">
			<img src="<?= base_url('public/images/icons-user.png') ?>">
        </span>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile_dropdown">
				<a class="dropdown-item" href="#">
					<i class="fas fa-home"></i> Home
				</a>
				<a class="dropdown-item" href="#">
					<i class="fas fa-user"></i> Perfil
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">
					<i class="fas fa-cog"></i> Configuração
				</a>
				<hr>
				<div class="toggle-container">
					<h6>Modo escuro</h6>
					<input type="checkbox" id="switch" name="theme"/><label for="switch"></label>
				</div>

				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">
					<i class="fas fa-sign-out-alt"></i> Sair
				</a>

			</div>
		</li>
	</ul>

</nav>
