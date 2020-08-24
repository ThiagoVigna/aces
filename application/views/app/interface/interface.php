<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $titulo; ?></title>

	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('public/css/bootstrap-hack.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('public/css/footer-basic.css'); ?>">

</head>
<body>
	<?php $this->load->view('app/interface/header'); ?>

	<div class="container-fluid mt-3">
		<div class="row">
			<?php $this->load->view('app/interface/sidebar-left'); ?>

			<div class="col-md-6">

			</div>

			<?php $this -> load -> view('app/interface/sidebar-right'); ?>
		</div>
	</div>
	<script type="application/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>
	<script type="application/javascript" src="<?= base_url('public/js/night.js'); ?>"></script>
	<script type="application/javascript" src="<?= base_url('public/js/gamification.js'); ?>"></script>
	<script src="https://kit.fontawesome.com/fa99289863.js" crossorigin="anonymous"></script>

	<?php $this -> load -> view('app/interface/footer'); ?>
</body>

</html>
