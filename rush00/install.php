<?php
$aData = array();

$aData['members'] = array();
$passwd = hash('whirlpool', "admin");
$aData['members'][] = array( "login" => "admin", "passwd" => $passwd, "mail" => "admin@admin.com", "admin" => 1);

$aData['category'] = array();

$aData['settings'] = array();
$aData['settings']['path_data'] = './data';
$aData['settings']['site_title'] = 'Presta-Shop';

// if (!file_exists("./data"))
file_put_contents("./data", serialize($aData));

?>
