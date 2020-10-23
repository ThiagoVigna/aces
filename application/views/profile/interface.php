<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $titulo; ?></title>

	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('public/css/_Style.css'); ?>">

</head>
<body>


<?php $this -> load -> view('profile/profile'); ?>


<script type="application/javascript" src="<?= base_url('assets/jquery-3.4.1/jquery.min.js'); ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/toastr/toastr.min.js'); ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>
<script src="https://kit.fontawesome.com/fa99289863.js" crossorigin="anonymous"></script>

<!-- Sempre deverá ser o último a ser carregado -->.
<script type="application/javascript" src="<?= base_url('public/js/_MinifyJS.js?update='.date('his')); ?>"></script>

</body>

</html>

