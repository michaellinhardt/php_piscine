<?php
session_start();
include './functions.php';
$aData = getData();

$p = (!isset($_GET['p'])) ? 'index' : $_GET['p'];
$aPage['index'] = './pages/index.php';
if (!isset($aPage[$p]))
	$p = 'index' ;

include './layout/vitrine_header.php';
include $aPage[$p];
include './layout/vitrine_footer.php';
?>
