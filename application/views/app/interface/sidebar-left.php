<?php
    $photoMain = $this->auth->GetUserData('Photo_Main'); // Obtém o nome do arquivo de imagem
    $extensionMain = !empty($photoMain) ? pathinfo($photoMain, PATHINFO_EXTENSION) : ''; // Obtém a extensão do arquivo

    $photoProfile = $this->auth->GetUserData('Photo_Profile');
    $extensionProfile = !empty($photoProfile) ? pathinfo($photoProfile, PATHINFO_EXTENSION) : '';

    $userId = $this->auth->GetUserData('UserId');
    $email = $this->auth->GetUserData('Email');

	$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=BRL&from=USD&amount=1",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        "apikey: RxneoYYH343hwl0U8O43V5EMVtQNE3iA"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
));
$response = curl_exec($curl);
curl_close($curl);
// Extrair o valor convertido do resultado da API
$result = json_decode($response, true);
$convertedValue = $result['result'];

// Formatar o valor convertido em BRL
$formattedValue = number_format($convertedValue, 2, ',', '.');
$formattedValue = 'BRL ' . $formattedValue;

// Imprimir o valor formatado
//echo $formattedValue;

?>

<div class="col-md-3 mb-3">
    <div class="card shadow-lg mb-3 radio">
        <img class="card-img-top radio" src="<?= base_url("storage/users/".$userId."/".$photoMain)?>" alt="">

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div data-knob-percentage="75" data-knob-timing="2"
                        data-knob-image="<?= base_url("storage/users/".$userId."/".$photoProfile)?>"
                        data-knob-dotimage="" data-knob-gradient1="#032467" data-knob-gradient2="red"
                        data-knob-dotcolor="#f00" data-knob-color="#efefef"
                        class="iesknob circle1 position-relative my-pic"></div>
                    <h4 class="mb-0 mt-0"><a href="#" class="text-body"><?= $userData->First_Name; ?></a>
                    </h4>
                    <a href="#" class="text-muted">
                        <h6><?= $email; ?></h6>
                    </a>
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
            <!-- <p>Cotação do Dolar:<br><small class="text-muted">USD 1,00 <br> <?= $formattedValue; ?></small></p> -->
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
                <strong class="d-flex flex-grow-1 flex-fill justify-content-center" data-toggle="tooltip"
                    data-bs-tooltip="" style="font-size: 12px;line-height: 5px;"><br>ACES Community ©
                    2020<br><br></strong>
                <b class="d-inline d-lg-flex justify-content-lg-center align-items-lg-center"
                    style="font-size: 9px;"></b>
            </div>
        </div>
    </div>

</div>
