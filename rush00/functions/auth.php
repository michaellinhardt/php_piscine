<?php
function auth( $aMembers, $sLogin, $sPasswd )
{
	$sPasswd = hash('whirlpool', $sPasswd);
	foreach ( $aMembers as $iID => $aMember )
		if ( $aMember['login'] == $sLogin && $aMember['passwd'] == $sPasswd)
			return ($_SESSION['id_members'] = $iID);
	return ($_SESSION['id_members'] = -1);
}
?>
