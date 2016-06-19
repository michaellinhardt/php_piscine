<?php
$aData = array();

$aData['members'] = array();
$passwd = hash('whirlpool', "admin");
$aData['members'][] = array( "login" => "admin", "passwd" => $passwd, "mail" => "admin@admin.com", "admin" => 1);

$aData['category'] = array();
$aData['product'] = array();
$aData['panier'] = array();

$aData['settings'] = array();
$aData['settings']['path_data'] = './data';
$aData['settings']['site_title'] = 'Presta-Shop';

$aData['settings']['path_img'] = './product_img/';
if (!is_dir($aData['settings']['path_img']))
	mkdir($aData['settings']['path_img'], 0777);

$aData['setting']['crop_x'] = 150;
$aData['setting']['crop_y'] = 150;
$aData['setting']['cart_x'] = 75;
$aData['setting']['cart_y'] = 75;

// if (!file_exists("./data"))
file_put_contents("./data", serialize($aData));

?>
