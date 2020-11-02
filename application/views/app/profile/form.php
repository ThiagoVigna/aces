<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-3 radio">
            <div class="card-body text-center">
                <img
                        class="rounded-circle mb-3 mt-4"
                        src="https://picsum.photos/200/200?random"
                        height="160"
                        height="auto"
                >
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary btn-sm" type="button">Alterar foto de perfil</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-3 radio">
            <div class="card-body text-center">
                <img
                        class="card-img-top mw-50 mb-3 mt-4 radio"
                        src="https://picsum.photos/800/400?image=10"
                        width="160"
                        height="auto"
                >
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary btn-sm" type="button">Alterar foto de capa</button>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-3 radio">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Configuração Usuario</p>
    </div>
    <form action="<?= base_url('app/profile/save'); ?>" method="post" id="frmProfileSave">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12"><h6>Informações pessoais</h6></div>
                <div class="col-sm-12 col-md-6 mb-2">
                    <input class="form-control" type="text" placeholder="Primeiro nome" name="First_Name" value="<?= $user->First_Name; ?>">
                </div> <!--Fim: First name -->
                <div class="col-sm-12 col-md-6 mb-2">
                    <input class="form-control" type="text" placeholder="Segundo nome"  name="Last_Name" value="<?= $user->Last_Name; ?>">
                </div> <!--Fim: Last name -->

                <div class="col-sm-12"><h6 class="mt-2">Endereço</h6></div>
                <div class="col-sm-12 col-md-12 mb-2">
                    <input class="form-control" type="text" placeholder="Rua: exemplo, 01" name="Address_Street" value="<?= $user->Address_Street; ?>">
                </div> <!--Fim: street -->
                <div class="col-sm-12 col-md-4 mb-2">
                    <input class="form-control" type="text" placeholder="Bairro" name="Address_Neigborhood" value="<?= $user->Address_Neigborhood; ?>">
                </div> <!--Fim: neigborhood -->
                <div class="col-sm-12 col-md-4 mb-2">
                    <input class="form-control" type="text" placeholder="Ribeirão Preto" name="Address_City" value="<?= $user->Address_City; ?>">
                </div> <!--Fim: city -->
                <div class="col-sm-12 col-md-4 mb-2">
                    <input class="form-control" type="text" placeholder="00000-000" name="Address_Zipcode" value="<?= $user->Address_Zipcode; ?>">
                </div> <!--Fim: zipcode -->
                <div class="col-sm-12 col-md-2 mb-2">
                    <input class="form-control" maxlength="2" type="text" placeholder="UF" name="Address_State" value="<?= $user->Address_State; ?>">
                </div> <!--Fim: state -->

                <div class="col-sm-12"><h6 class="mt-2">Informações de contato</h6></div>
                <div class="col-sm-12 col-md-6 mb-2">
                    <input class="form-control" type="text" placeholder="(xx) xxxxx-xxxx"  name="Phone_Cell" value="<?= $user->Phone_Cell; ?>">
                </div> <!--Fim: Cell Phone -->
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary" data-action="dynamic-form" data-form="#frmProfileSave">
                Salvar alterações
            </button>
        </div>
    </form>
</div>