<?php
function addMember($aData, $sLogin, $sPassword, $sMail, $iAdmin)
{
	$sPassword = hash("whirlpool", $sPassword);
	$aData['members'][] = array( "login" => $sLogin, "passwd" => $sPassword, "mail" => $sMail, "admin" => $iAdmin);
	saveData($aData);
	return $aData;
}
function isMember( $aMembers, $sLogin )
{
	foreach( $aMembers as $iID => $aMember )
		if ($aMember['login'] == $sLogin)
			return TRUE;
	return FALSE;
}
function delMember( $aData, $iID )
{
	unset($aData['members'][$iID]);
	saveData($aData);
	return $aData;
}
?>
