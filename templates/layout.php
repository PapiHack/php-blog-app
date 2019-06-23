<?php require_once('../src/core/helpers/resourceLoader.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= $title ?> </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="<?= asset('common-css/bootstrap.css') ?>" rel="stylesheet">
	<link href="<?= asset('common-css/ionicons.css') ?>" rel="stylesheet">
	<link href="<?= asset('blog-sidebar/css/styles.css') ?>" rel="stylesheet">
	<link href="<?= asset('blog-sidebar/css/responsive.css') ?>" rel="stylesheet">
	<link href="<?= asset('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
</head>
<body>

    <?php require_once('shared/header.php'); ?>

    <div class="slider display-table center-text">
		<h1 class="title display-table-cell"><b></b></h1>
	</div><!-- slider -->
    
    <?= $content ?>

    <?php require_once('shared/footer.php'); ?>

    <!-- SCRIPTS -->

	<script src="<?= asset('common-js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= asset('common-js/tether.min.js') ?>"></script>
    <script src="<?= asset('common-js/bootstrap.js') ?>"></script>
    <script src="<?= asset('common-js/scripts.js') ?>"></script>
</body>
</html>