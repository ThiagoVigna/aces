<!-- header.php -->
<nav class="navbar navbar-expand navbar-light bg-light shadow">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item pt-0">
			<a class="nav-link active" href="#"><i class="fas fa-home h2 text-dark"></i></a>
		</li>
		<li class="nav-item pt-2">
			<a href="/" class="btn btn-link border-0">
				<i class="fas fa-bell h4 text-dark"></i>
				<sub><span class="badge badge-danger badge-with-icon">123</span></sub>
			</a>
		</li>
		<li class="nav-item pt-2">
			<a href="/" class="btn btn-link border-0">
				<i class="fas fa-envelope h4 text-dark"></i>
				<sub><span class="badge badge-danger badge-with-icon">123</span></sub>
			</a>
		</li>

	</ul>
	<form class="form-inline ml-auto">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Busca" aria-label="Search" aria-describedby="search">
			<div class="input-group-append">
				<a href="#" class="btn btn-info"><i class="fas fa-search"></i></a>
			</div>
		</div>
	</form>
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="profile_dropdown" role="button" data-toggle="dropdown"
			   aria-haspopup="true" aria-expanded="false">
        <span class="fa-stack fa-1x">
          <i class="fas fa-circle fa-stack-2x"></i>
          <i class="fas fa-user fa-stack-1x fa-inverse"></i>
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
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">
					<i class="fas fa-sign-out-alt"></i> Sair
				</a>
			</div>
		</li>
	</ul>
</nav>
