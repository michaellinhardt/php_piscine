<?php
session_start();
include './functions.php';
$aData = getData();

if (isset($_GET['deco']))
{
	$_SESSION['id_members'] = -1;
	if (isset($_SESSION['panier']))
		$_SESSION['panier']['owned'] = -1;
}

if (isset($_POST['submit']))
{
	if (($_POST['login'] = trim($_POST['login'])) != ""
	&& ($_POST['passwd'] = trim($_POST['passwd'])) != "")
		auth($aData, $_POST['login'], $_POST['passwd']);
	else
		$_SESSION['id_members'] = -1;
}

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
