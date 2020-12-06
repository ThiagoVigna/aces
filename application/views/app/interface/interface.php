<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $titulo . ' - ' . $userData -> First_Name . ' ' . $userData -> Last_Name;; ?></title>

	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('public/css/_Style.css'); ?>">

</head>
<body>
<div id="ScreenLock">
	<div id="ScreenMessage">
		<h1 class="mt-3 h4 text-center text-white"><i class="fas fa-spinner fa-pulse"></i> Aguarde, carregando.</h1>
	</div>
</div>

<?php $this -> load -> view('app/interface/header'); ?>

<div class="container-fluid mt-3">
	<div class="row">
		<?php $this -> load -> view('app/interface/sidebar-left'); ?>

		<div class="col-md-6">
			<?php $this -> load -> view($subview); ?>
		</div>

		<?php $this -> load -> view('app/interface/sidebar-right'); ?>
	</div>
</div>

<!-- Modal com conteúdo dinamico-->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content" id="defaultModalContent"></div>
	</div>
</div>


<script type="application/javascript" src="<?= base_url('assets/jquery-3.4.1/jquery.min.js'); ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/toastr/toastr.min.js'); ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>
<script src="https://kit.fontawesome.com/fa99289863.js" crossorigin="anonymous"></script>

<!-- Sempre deverá ser o último a ser carregado -->
<script type="application/javascript" src="<?= base_url('public/js/_MinifyJS.js?update='.date('his')); ?>"></script>


</body>

</html>
