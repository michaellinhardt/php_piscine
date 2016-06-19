<?php
session_start();
include './functions.php';
$aData = getData();
isAdmin( $aData['members'] );
$p = (!isset($_GET['p'])) ? 'product' : $_GET['p'];
include './layout/admin_header.php';

$aPage['product'] = './admin/product.php';
$aPage['product_new'] = './admin/product_new.php';
$aPage['product_mod'] = './admin/product_mod.php';
$aPage['product_cat'] = './admin/product_cat.php';
$aPage['member'] = './admin/member.php';
$aPage['member_new'] = './admin/member_new.php';
$aPage['member_mod'] = './admin/member_mod.php';
$aPage['category'] = './admin/category.php';
$aPage['panier'] = './admin/panier.php';
$aPage['panier_view'] = './admin/panier_view.php';
if (!isset($aPage[$p]))
	redirect("admin_bad_page");
include $aPage[$p];

include './layout/admin_footer.php';
?>
