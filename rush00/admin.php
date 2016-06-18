<?php
session_start();
include './functions.php';
$_SESSION['id_members'] = 0;
$aData = getData();
isAdmin( $aData['members'] );

$p = (!isset($_GET['p'])) ? 'product' : $_GET['p'];
include './layout/admin_header.php';

$aPage['product'] = './admin/product.php';
if (!isset($aPage[$p]))
	redirect(1, "admin_bad_page");
include $aPage[$p];

include './layout/admin_footer.php';
?>
