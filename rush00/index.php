<?php
session_start();
include './functions.php';
$aData = getData();

if (!isset($_SESSION['panier']))
	$_SESSION['panier'] = newPanier();

$p = (!isset($_GET['p'])) ? 'index' : $_GET['p'];
$aPage['index'] = './pages/index.php';
if (!isset($aPage[$p]))
	$p = 'index' ;

include './layout/vitrine_header.php';
include $aPage[$p];
include './layout/vitrine_footer.php';
?>
