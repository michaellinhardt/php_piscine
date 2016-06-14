#!/usr/bin/php
<?php
if ($argc < 2)
	exit (1);
function split_this($sInput)
{
	$aExplode = explode(" ", $sInput);
	$aFilter = array_filter($aExplode);
	return array_slice($aFilter, 0);
}
$aTotal = array();
$i = 1;
while ($i < $argc)
{
	$aSplitted = split_this($argv[$i]);
	$aTotal = array_merge($aTotal, $aSplitted);
	$i++;
}
asort($aTotal);
foreach ($aTotal as $sValue)
	echo $sValue . "\n";
?>
