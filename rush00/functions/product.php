<?php
function addProduct($aData, $aNewProduct)
{
	if (!isset($aNewProduct['cat']))
		$aNewProduct['cat'] = array();
	$aData['product'][] = $aNewProduct;
	saveData($aData);
	return $aData;
}

function addCatProduct($aData, $iIDProduct, $iIDCat)
{
	$aData['product'][$iIDProduct]['cat'][$iIDCat] = $aData['category'][$iIDCat];
	saveData($aData);
	return $aData;
}

function delCatProduct($aData, $iIDProduct, $iIDCat)
{
	unset($aData['product'][$iIDProduct]['cat'][$iIDCat]);
	saveData($aData);
	return $aData;
}

function isProduct( $aProducts, $sName )
{
	foreach( $aProducts as $aProduct )
		if ($aProduct['name'] == $sName)
			return TRUE;
	return FALSE;
}

function isProduct2( $aProducts, $iIDProduct, $sName )
{
	foreach( $aProducts as $iID => $aProduct )
		if ($aProduct['name'] == $sName && $iID != $iIDProduct)
			return TRUE;
	return FALSE;
}

function delProduct( $aData, $iID )
{
	$aProduct = $aData['product'][$iID];
	unlink($aProduct['pics']);
	unlink($aProduct['pics_crop']);
	unlink($aProduct['pics_cart']);
	unset($aData['product'][$iID]);
	saveData($aData);
	return $aData;
}
?>
