<!-- sidebar-left.php -->
<div class="col-md-3 mb-3 ">
	<div class="card shadow-lg mb-3 radio">
		<img class="card-img-top radio " src="<?= base_url("storage/users/".$this->auth->GetUserData('UserId')."/".$this->auth->GetUserData('Photo_Main'))?>" alt="">
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div data-knob-percentage="90" data-knob-timing="2"
						 data-knob-image="<?= base_url("storage/users/".$this->auth->GetUserData('UserId')."/".$this->auth->GetUserData('Photo_Profile'))?>"
						 data-knob-dotimage=""
						 data-knob-gradient1="#032467" data-knob-gradient2="red" data-knob-dotcolor="#f00"
						 data-knob-color="#efefef"
						 class="iesknob circle1 position-relative my-pic"></div>
					<h4 class="mb-0 mt-0"><a href="#"  class="text-body"><?= $userData->First_Name.' '. $userData->Last_Name; ?></a>
					</h4>
					<a href="#" class="text-muted"><h6><?= $this->auth->GetUserData('Email'); ?></h6></a>
					<hr>
				</div>
				<div class="col-4 text-center">
					<a href="/">
						<img src="<?= base_url('public/images/icons-speech.png') ?>">
						<sub>
							<span class="badge badge-pill badge-info badge-with-icon">123</span>
						</sub> <br>
						<small>Comentários</small>
					</a>
				</div>
				<div class="col-4 text-center">
					<a href="/">
						<img src="<?= base_url('public/images/icons-group.png') ?>">
						<sub>
							<span class="badge badge-pill badge-info badge-with-icon">123</span>
						</sub> <br>
						<small>Seguindo</small>
					</a>
				</div>
				<div class="col-4 text-center">
					<a href="/">
						<img src="<?= base_url('public/images/icons-staff.png') ?>">
						<sub>
							<span class="badge badge-pill badge-info badge-with-icon">123</span>
						</sub> <br>
						<small>Seguidores</small>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="card shadow mb-3 radio">
		<div class="card-body">
			<h5>O que há de novo</h5>
			<p>Lorem Ipsum<br><small class="text-muted">987 Posts</small></p>
			<p>Lorem Ipsum<br><small class="text-muted">654 Posts</small></p>
			<p>Lorem Ipsum<br><small class="text-muted">321 Posts</small></p>
		</div>
		<div class="card-footer">
			<a href="#">Mais</a>
		</div>
	</div>
	<div class="card shadow mb-3 radio">
		<div class="card-body text-center">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Ajuda</a></li>
                <li class="list-inline-item">|</li>
                <li class="list-inline-item"><a href="#">Política de Privacidade</a></li>
                <li class="list-inline-item">|</li>
                <li class="list-inline-item"><a href="#">Termos</a></li>
            </ul>
		</div>
		<div class="card-footer">
			<div class="text-center">
				<strong class="d-flex flex-grow-1 flex-fill justify-content-center" data-toggle="tooltip" data-bs-tooltip=""
						style="font-size: 12px;line-height: 5px;"><br>ACES Community ©
					2020<br><br></strong>
				<b class="d-inline d-lg-flex justify-content-lg-center align-items-lg-center"
				   style="font-size: 9px;"></b></div>
		</div>
	</div>

</div>
