<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?= $titulo; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css') ?>">

</head>
<body style="background-color: #1b1e21">

	<?php $this->load->view($subview); ?>

	<script src="<?php echo base_url('assets/jquery-3.4.1/jquery.min.js')?>"> </script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>
