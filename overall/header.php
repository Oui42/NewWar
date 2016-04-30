<!DOCTYPE HTML SYSTEM>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>test</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800,700italic,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/menu.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<?php include 'menu.php'; ?>

		<?php if(isset($user)) { ?>
		<nav class="navbar navbar-inverse navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
		    	<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Zdrowie"><i class="fa fa-heart" style="color: #d82f34;"></i> x/x</a></li>
					<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Energia"><i class="fa fa-flash" style="color: #dddd00;"></i> x/x</a></li>
					<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Gotówka"><i class="fa fa-dollar" style="color: #45de76;"></i> xxx</a></li>
					<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Diamenty"><i class="fa fa-diamond" style="color: #66c4e8;"></i> xxx</a></li>
				</ul>
			</div>
		</nav>
		<?php } ?>

		<div class="container-fluid" id="content">