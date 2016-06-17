<?php
function exit1($iErr, $sMsg)
{
	echo $sMsg . "\n";
	exit ($iErr);
}
if (!isset($_POST['submit']) || $_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "")
	exit1(1, "ERROR");
if (!file_exists("../private/passwd"))
	$aData = array();
else
	$aData = unserialize(file_get_contents("../private/passwd"));
foreach ($aData as $aMember)
	if ($aMember['login'] == $_POST['login'])
		exit1(1, "ERROR");
$aMember = array( "login" => $_POST['login'], "passwd" => hash('whirlpool', $_POST['passwd']));
$aData[] = $aMember;
if (!is_dir("../private"))
	mkdir("../private", 0777);
file_put_contents("../private/passwd", serialize($aData));
exit1(0, "OK");
?>
