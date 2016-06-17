<?php
function exit1($iErr, $sMsg)
{
	echo $sMsg . "\n";
	exit ($iErr);
}
session_start();
$_SESSION['loggued_on_user'] = "";
if (!isset($_GET['login']) || !isset($_GET['passwd']) || $_GET['login'] == "" || $_GET['passwd'] == "")
	exit1(1, "ERROR");
include './auth.php';
if (!auth($_GET['login'], $_GET['passwd']))
	exit1(1, "ERROR");
$_SESSION['loggued_on_user'] = $_GET['login'];
exit1(0, "OK");
?>
