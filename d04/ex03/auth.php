<?php
function auth($login, $passwd)
{
	if (!file_exists("../private/passwd"))
		return FALSE;
	$aData = unserialize(file_get_contents("../private/passwd"));
	$passwd = hash('whirlpool', $passwd);
	foreach ( $aData as $aMember )
		if ($aData['login'] == $login && $aData['passwd'] == $passwd)
			return TRUE;
	return FALSE ;
}
?>
