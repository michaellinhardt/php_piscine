#!/usr/bin/php
<?php
if ($argc < 3)
	exit1();
function exit1($sMsg = NULL)
{
	if ($sMsg)
		echo $sMsg . "\n";
	exit (1);
}
$sSearch = trim($argv[1]);
unset($argv[0]);
unset($argv[1]);
$aData = array_reverse($argv);
foreach ($aData as $sValue)
{
	$aArg = explode(":", $sValue);
	if ($aArg[0] == $sSearch)
		exit1($aArg[1]);
	else if ($aArg[1] == $sSearch)
		exit1($aArg[0]);
}
?>
