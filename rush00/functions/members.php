<?php
function addMember($aData, $sLogin, $sPassword, $sMail, $iAdmin)
{
	$sPassword = hash("whirlpool", $sPassword);
	$aData['members'][] = array( "login" => $sLogin, "passwd" => $sPassword, "mail" => $sMail, "admin" => $iAdmin);
	saveData($aData);
	return $aData;
}

function modMember($aData, $iID, $sLogin, $sPassword, $sMail, $iAdmin)
{
	if (!isset($aData['members'][$iID]))
		return FALSE;
	if (!$sPassword)
		$sPassword = $aData['members'][$iID]['passwd'];
	else
		$sPassword = hash("whirlpool", $sPassword);
	$aData['members'][$iID] = array( "login" => $sLogin, "passwd" => $sPassword, "mail" => $sMail, "admin" => $iAdmin);
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
