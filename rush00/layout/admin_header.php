<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Administration</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/default.css">
	</head>
	<body>
		<div id="header">
			<div class="nav-bar">
				<a class="btn btn-s btn-black" href="./index.php">🏠 <?= $aData['settings']['site_title']; ?></a>
				<ul class="nav-menu">
					<li><a class="btn btn-s btn-grey <?php btnactive( $p, 'member', 'btn-grey') ?>" href="./admin.php?p=member">👬 Membres</a></li>
					<li><a class="btn btn-s btn-grey <?php btnactive( $p, 'product', 'btn-grey') ?>" href="./admin.php?p=product">👜 Produits</a></li>
					<li><a class="btn btn-s btn-grey <?php btnactive( $p, 'category', 'btn-grey') ?>" href="./admin.php?p=category">📖 Catégorie</a></li>
					<li><a class="btn btn-s btn-grey <?php btnactive( $p, 'panier', 'btn-grey') ?>" href="./admin.php?p=panier">👛 Panier</a></li>
				</ul>
			</div>
		</div>
		<div id="main">
