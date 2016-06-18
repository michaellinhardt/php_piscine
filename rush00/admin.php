<?php
session_start();
include './functions.php';
$aData = getData();
isAdmin( $aData['members'] );
?>
