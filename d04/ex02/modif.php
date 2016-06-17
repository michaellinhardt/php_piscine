<?php
function exit1($iErr, $sMsg)
{
	echo $sMsg . "\n";
	exit ($iErr);
}
if (!isset($_POST['submit']) || $_POST['submit'] != "OK" || $_POST['login'] == ""
	|| $_POST['oldpw'] == "" || $_POST['newpw'] == "" || $_POST['oldpw'] == $_POST['newpw'])
	exit1(1, "ERROR");
if (!file_exists("../private/passwd"))
	exit1(1, "ERROR");
$aData = unserialize(file_get_contents("../private/passwd"));
$_POST['newpw'] = hash('whirlpool', $_POST['newpw']);
$_POST['oldpw'] = hash('whirlpool', $_POST['oldpw']);
foreach ($aData as $iID => $aMembers)
	if ($aMembers['login'] == $_POST['login'] && $aMembers['passwd'] == $_POST['oldpw'])
	{
		$aData[$iID]['passwd'] = $_POST['newpw'];
		file_put_contents("../private/passwd", serialize($aData));
		exit1(0, "OK");
	}
exit1(1, "ERROR");
?>
