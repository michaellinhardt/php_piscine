<?php
function addProduct($aData, $aNewProduct)
{
	$aData['product'][] = $aNewProduct;
	saveData($aData);
	return $aData;
}
//
// function modProduct($aData, $iID, $sLogin, $sPassword, $sMail, $iAdmin)
// {
// 	if (!isset($aData['members'][$iID]))
// 		return FALSE;
// 	if (!$sPassword)
// 		$sPassword = $aData['members'][$iID]['passwd'];
// 	else
// 		$sPassword = hash("whirlpool", $sPassword);
// 	$aData['members'][$iID] = array( "login" => $sLogin, "passwd" => $sPassword, "mail" => $sMail, "admin" => $iAdmin);
// 	saveData($aData);
// 	return $aData;
// }

function isProduct( $aProducts, $sName )
{
	foreach( $aProducts as $aProduct )
		if ($aProduct['name'] == $sName)
			return TRUE;
	return FALSE;
}

// function delProduct( $aData, $iID )
// {
// 	unset($aData['members'][$iID]);
// 	saveData($aData);
// 	return $aData;
// }
?>
