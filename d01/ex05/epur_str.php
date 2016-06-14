#!/usr/bin/php
<?php
if ($argc != 2)
	exit(1);
$aExplode = explode(" ", $argv[1]);
$aFilter = array_filter($aExplode);
$aSlice = array_slice($aFilter, 0);
$aImplode = implode(" ", $aSlice);
echo $aImplode."\n";
?>
