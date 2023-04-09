<div class="row">

    <div class="col-md-6">
        <form action="<?= base_url('app/upload/profile'); ?>" method="post" id="frmPhotoProfile"
            enctype="multipart/form-data">
            <div class="card shadow mb-3 radio">

                <div class="card-body text-center">
                    <img class="card-img-top mw-50 mb-3 mt-4 radio"
                        src="<?= base_url("storage/users/" . $this -> auth -> GetUserData('UserId') . "/" . $this -> auth -> GetUserData('Photo_Profile')) ?>?updated=<?= date('his'); ?>"
                        width="100%" height="150">
                </div>
                <div class="card-footer text-center">
                    <input type="file" name="photo" id="photoProfile" class="photoUpload d-none"
                        data-form="frmPhotoProfile">

                    <label for="photoProfile" class="btn btn-primary btn-block">
                        Alterar foto de perfil
                    </label>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6">
        <form action="<?= base_url('app/upload/main'); ?>" method="post" id="frmPhotoMain"
            enctype="multipart/form-data">
            <div class="card shadow mb-3 radio">
                <div class="card-body text-center">
                    <img class="card-img-top mw-50 mb-3 mt-4 radio"
                        src="<?= base_url("storage/users/".$this -> auth -> GetUserData('UserId')."/".$this -> auth -> GetUserData('Photo_Main'))?>?updated=<?= date('his'); ?>"
                        width="100%" height="150">
                </div>
                <div class="card-footer text-center">
                    <input type="file" name="main" id="photoMain" class="photoUpload d-none" data-form="frmPhotoMain">

                    <label for="photoMain" class="btn btn-primary btn-block">
                        Alterar foto de Capa
                    </label>
                </div>
            </div>
    </div>
    </form>
</div>

<div class="card shadow mb-3 radio">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Configuração Usuario</p>
    </div>
    <form action="<?= base_url('app/profile/save'); ?>" method="post" id="frmProfileSave">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h6>Informações pessoais</h6>
                </div>
                <div class="col-sm-12 col-md-6 mb-2">
				<label for="First_Name" class="badge small label-form">Primeiro nome:</label>
                    <input class="form-control" type="text" placeholder="Primeiro nome" name="First_Name"
                        value="<?= $user->First_Name; ?>">
                </div>
                <!--Fim: First name -->
                <div class="col-sm-12 col-md-6 mb-2">
				<label for="last_name" class="badge small  label-form">Sobrenome:</label>
                    <input class="form-control" type="text" placeholder="Segundo nome" name="Last_Name"
                        value="<?= $user->Last_Name; ?>">
                </div>
                <!--Fim: Last name -->

                <div class="col-sm-12">
                    <h6 class="mt-2">Endereço</h6>
                </div>
                <div class="col-sm-12 col-md-12 mb-2">
				<label for="street" class="badge small label-form">Rua:</label>
                    <input class="form-control" type="text" placeholder="Rua: exemplo, 01" name="Address_Street"
                        value="<?= $user->Address_Street; ?>">
                </div>
                <!--Fim: street -->
                <div class="col-sm-12 col-md-4 mb-2">
				<label for="neigborhood" class="badge small label-form">Bairro:</label>
                    <input class="form-control" type="text" placeholder="Bairro" name="Address_Neigborhood"
                        value="<?= $user->Address_Neigborhood; ?>">
                </div>
                <!--Fim: neigborhood -->
                <div class="col-sm-12 col-md-4 mb-2">
				<label for="city" class="badge small label-form">Cidade:</label>
                    <input class="form-control" type="text" placeholder="Ribeirão Preto" name="Address_City"
                        value="<?= $user->Address_City; ?>">
                </div>
                <!--Fim: city -->
                <div class="col-sm-12 col-md-4 mb-2">
				<label for="zipcode" class="badge small label-form">CEP:</label>
                    <input class="form-control" type="text" placeholder="00000-000" name="Address_Zipcode"
                        value="<?= $user->Address_Zipcode; ?>">
                </div>
                <!--Fim: zipcode -->
                <div class="col-sm-12 col-md-2 mb-2">
				<label for="state" class="badge small label-form">Estado:</label>
                    <input class="form-control" maxlength="2" type="text" placeholder="UF" name="Address_State"
                        value="<?= $user->Address_State; ?>">
                </div>
                <!--Fim: state -->

                <div class="col-sm-12">
                    <h6 class="mt-2">Informações de contato</h6>
                </div>
                <div class="col-sm-12 col-md-6 mb-2">
				<label for="phone" class="badge small label-form">Celular:</label>
                    <input class="form-control" type="text" placeholder="(xx) xxxxx-xxxx" name="Phone_Cell"
                        value="<?= $user->Phone_Cell; ?>">
                </div>
                <!--Fim: Cell Phone -->
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-action="dynamic-form" data-form="#frmProfileSave">
                Salvar alterações
            </button>
        </div>
    </form>
</div>
