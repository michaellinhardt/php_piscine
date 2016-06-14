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
$aSplited = split_this($argv[1]);
if (count($aSplited))
{
    foreach(array_splice($aSplited, 1) as $sValue)
        echo $sValue . " ";
    echo $aSplited[0] . "\n";
}
?>
