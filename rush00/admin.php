<?php
session_start();
include './functions.php';
$_SESSION['id_members'] = 0;
$aData = getData();
isAdmin( $aData['members'] );

$p = (!isset($_GET['p'])) ? 'product' : $_GET['p'];
include './layout/admin_header.php';

$aPage['product'] = './admin/product.php';
$aPage['member'] = './admin/member.php';
$aPage['member_new'] = './admin/member_new.php';
$aPage['member_mod'] = './admin/member_mod.php';
$aPage['category'] = './admin/category.php';
if (!isset($aPage[$p]))
	redirect("admin_bad_page");
include $aPage[$p];

include './layout/admin_footer.php';
?>
