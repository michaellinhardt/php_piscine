<?php
function isCat( $aCat, $sName )
{
	foreach( $aCat as $sNameCat )
		if ($sNameCat == $sName)
			return TRUE;
	return FALSE;
}
function addCat($aData, $sName)
{
	$aData['category'][] = $sName;
	saveData($aData);
	return $aData;
}
?>
