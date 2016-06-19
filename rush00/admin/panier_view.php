<?php
$aCarts = $aData['panier'];
if (!isset($_GET['id']) || !isset($aCarts[intval($_GET['id'])]) || !is_numeric($_GET['id']))
	redirectHtml("./admin.php?p=panier");

?>
