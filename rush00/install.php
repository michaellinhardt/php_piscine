<?php
$aData = array();
$aData['members'] = array();
$passwd = hash('whirlpool', "admin");
$aData['members'][] = array( "login" => "admin", "passwd" => $passwd, "mail" => "admin@admin.com", "admin" => 1);

if (!file_exists("./data"))
	file_put_contents("./data", serialize($aData));
?>
