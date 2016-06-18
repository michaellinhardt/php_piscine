<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', TRUE);

session_start();
include './functions.php';

$aData = getData();
if (auth($aData['members'], "admin", "admin") > -1)
	echo "Vous etes connecté\n";
else
	echo "non connecté\n";
 ?>
