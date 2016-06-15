#!/usr/bin/php
<?php
if ($argc < 2)
	exit (1);
if (!is_file($argv[1]))
	exit (1);
function sort_time($sArg1, $sArg2)
{
	$aArg1 = explode("\n", $sArg1);
	$aArg1 = explode("> ", $aArg1[1]);
	$aArg1 = explode(":", $aArg1[1]);
	$aLastArg = explode(",", $aArg1[2]);
	$iScore1 = (intval($aArg1[0]) * 10000000) + (intval($aArg1[1]) * 100000) + (intval($aLastArg[0]) * 1000) + (intval($aLastArg[1]));

	$aArg2 = explode("\n", $sArg2);
	$aArg2 = explode("> ", $aArg2[1]);
	$aArg2 = explode(":", $aArg2[1]);
	$aLastArg = explode(",", $aArg2[2]);
	$iScore2 = (intval($aArg2[0]) * 10000000) + (intval($aArg2[1]) * 100000) + (intval($aLastArg[0]) * 1000) + (intval($aLastArg[1]));
	if ($iScore1 == $iScore2)
		return (0);
	else if ($iScore1 > $iScore2)
		return (1);
	else if ($iScore1 < $iScore2)
		return (-1);
}
$sData = file_get_contents($argv[1]);
$aData = explode("\n\n", $sData);
$aData = array_filter($aData);
usort($aData, sort_time);
$iCount = count($aData);
foreach ($aData as $sValue)
{
	$iCount--;
	echo $sValue;
	if ($iCount > 0)
		echo "\n";
	echo "\n";
}
?>
