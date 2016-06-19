<?php
function newPanier()
{
	$aPanier['owner'] = $_SESSION['id_members'];
	$aPanier['step'] = 0;
	$aPanier['total'] = 0;
	$aPanier['list'] = array();
	return $aPanier;
}

function addPanier($aData, $iID)
{
	if ($aData['product'][$iID]['stock'] == 0)
		return $aData;
	$aData['product'][$iID]['stock']--;
	if (isset($_SESSION['panier']['list'][$iID]))
		$_SESSION['panier']['list'][$iID]++;
	else
		$_SESSION['panier']['list'][$iID] = 1;
	$_SESSION['panier']['total'] += $aData['product'][$iID]['prix'];
	saveData($aData);
	return $aData;
}
?>
