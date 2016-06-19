<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?= $aData['settings']['site_title'] ?></title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/default.css">
	</head>
	<body>
		<div id="header">
			<div class="nav-bar">
				<a class="btn btn-s btn-black" href="./index.php">🏠 <?= $aData['settings']['site_title']; ?></a>
				<ul class="nav-menu">
					<?php
						if (isset($aData['members'][($_SESSION['id_members'])]) && $aData['members'][($_SESSION['id_members'])]['admin'] == 1)
							echo '<li><a class="btn btn-s btn-grey" href="./admin.php">📖 Administration</a></li>';
					?>
					<li><a class="btn btn-s btn-grey <?php btnactive( $p, 'index', 'btn-grey') ?>" href="./index.php">🎁 Produit</a></li>
				</ul>
				<div class="log_div">
				<?php if ($_SESSION['id_members'] != -1) { ?>
					<a class="btn btn-s btn-grey" href="./index.php?deco=1">❌ Déconnection</a>
				<?php } else { ?>
					<form id="form_connexion" method="post" action="./index.php">
						<input type="text" size="15" name="login" id="login" placeholder="Login" />
						<input type="password" size="15" name="passwd" id="passwd" placeholder="Password" />
						<input type="submit" name="submit" id="submit" class="btn btn-s btn-grey" value="Connexion" />
						<a class="btn btn-s btn-grey" href="./index.php?p=inscription">Inscription</a>
					</form>
				<?php } ?>
				</div>
			</div>
		</div>
		<div id="main">
