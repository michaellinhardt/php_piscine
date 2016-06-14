#!/usr/bin/php
<?php
if ($argc < 2)
	exit(1);
function split_this($sInput)
{
	$aExplode = explode(" ", $sInput);
	$aFilter = array_filter($aExplode);
	return array_slice($aFilter, 0);
}
function is_alpha($sValue)
{
	$aStr = str_split($sValue, 1);
	foreach ($aStr as $cValue)
		if ((ord($cValue) < 63 || (ord($cValue) > 90 && ord($cValue) < 97) || ord($cValue) > 122))
		return false;
	return true;
}
function sort_nocase($sValue1, $sValue2)
{
	$sLower1 = strtolower($sValue1);
	$sLower2 = strtolower($sValue2);
	$aLower1 = str_split($sLower1, 1);
	$aLower2 = str_split($sLower2, 1);
	$iLen1 = strlen($sValue1);
	$iLen2 = strlen($sValue2);
	$i = 0;
	while ($i < $iLen1 && $i < $iLen2)
	{
		$iOrd1 = ord($aLower1[$i]);
		$iOrd2 = ord($aLower2[$i]);
		if ($iOrd1 < $iOrd2)
			return (-1);
		else if ($iOrd1 > $iOrd2)
			return (1);
		$i++;
	}
	if ($i == $iLen1 && $i == $iLen2)
		return (0);
	else if ($i == $iLen1)
		return (-1);
	else
		return 1;
}
unset($argv[0]);
$aWord = array();
foreach ($argv as $sValue)
{
	$sSplit = split_this($sValue);
	$aWord = array_merge($aWord, $sSplit);
}
$aAlpha = array();
$aNum = array();
$aOther = array();
foreach ($aWord as $sValue)
{
	if (is_numeric($sValue))
		$aNum[] = $sValue;
	else if (is_alpha($sValue))
		$aAlpha[] = $sValue;
	else
		$aOther[] = $sValue;
}
usort($aAlpha, "sort_nocase");
usort($aOther, "sort_nocase");
$aReturn = $aAlpha;
$aReturn = array_merge($aReturn, $aNum);
$aReturn = array_merge($aReturn, $aOther);
foreach ($aReturn as $sValue)
	echo $sValue . "\n";
?>
