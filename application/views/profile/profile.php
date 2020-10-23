<?php $this -> load -> view('app/interface/header'); ?>

<div class="container-fluid ">
	<div class="row mb-3 mt-2">
		<div class="col-lg-4">
			<div class="card shadow mb-3 radio">
				<div class="card-body text-center"><img class="rounded-circle mb-3 mt-4"
					src="https://picsum.photos/200/200?random" width="100" height="auto">
				</div>
				<div class="card-footer text-center">
					<button class="btn btn-primary btn-sm" type="button">Alterar Foto</button>
				</div>
			</div>
			<div class="card shadow mb-3 radio">
				<div class="card-body text-center"><img class="card-img-top mw-50 mb-3 mt-4 radio"
					src="https://picsum.photos/800/400?image=10" width="160" height="auto">
				</div>
				<div class="card-footer text-center">
					<button class="btn btn-primary btn-sm" type="button">Alterar Foto</button>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="row">
				<div class="col">
					<div class="card shadow mb-3 radio">
						<div class="card-header py-3">
							<p class="text-primary m-0 font-weight-bold">Configuração Usuario</p>
						</div>
						<div class="card-body">
							<form>
								<div class="form-row">
									<div class="col">
										<div class="form-group">
											<label hidden for="username">
												<strong>Username</strong>
											</label>
											<input class="form-control" type="text" placeholder="Nome" name="username">
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label hidden for="email">
												<strong>Email Address</strong>
											</label>
											<input class="form-control" type="email" placeholder="email@exemplo.com" name="email">
										</div>
									</div>
								</div>

								<div class="form-group">
									<button class="btn btn-primary btn-sm" type="submit">Salvar</button>
								</div>
							</form>
						</div>
					</div>
					<div class="card shadow mb-3 radio">
						<div class="card-header py-3">
							<p class="text-primary m-0 font-weight-bold">Configurações de contato</p>
						</div>
						<div class="card-body">
							<form>
								<div class="form-group"><label hidden
															   for="address"><strong>Address</strong></label><input
											class="form-control" type="text" placeholder="Rua: exemplo, 01"
											name="address"></div>
								<div class="form-row">
									<div class="col">
										<div class="form-group"><label hidden
																	   for="city"><strong>City</strong></label><input
													class="form-control" type="text" placeholder="Ribeirão Preto"
													name="city"></div>
									</div>
									<div class="col">
										<div class="form-group"><label hidden
																	   for="country"><strong>Country</strong></label><input
													class="form-control" type="text" placeholder="Brasil"
													name="country"></div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-sm" type="submit">Salvar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

