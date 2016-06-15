#!/usr/bin/php
<?php
error_reporting(0);
if ($argc != 2)
	exit (1);
function exit1($iVal, $sVal = NULL)
{
	if ($sVal)
		echo $sVal . "\n";
	exit ($iVal);
}
function download($sPath, $sDir)
{
	$aTry = array();
	$sDir = preg_replace("#http://#si", "", $sDir);
	$sDir = preg_replace("#https://#si", "", $sDir);
	if (count($aDir = explode("/", $sDir)) > 1 && trim($aDir[1]) != "")
	{
		unset($aDir[(count($aDir) - 1)]);
		$sDir = implode("/", $aDir);
	}
	$aSite = explode("/", $sDir);
	$aSite = explode("#", $aSite[0]);
	$aSite = explode("?", $aSite[0]);
	$sSite = $aSite[0];
	$aName = explode("/", $sPath);
	$sName = $aName[(count($aName) - 1)];

	$aTry[] = $sPath;
	$aTry[] = "http://" . $sDir . "/" . $sPath;
	$aTry[] = "http://" . $sSite . "/" . $sPath;
	foreach ($aTry as $sValue)
		if ($oOpen = fopen($sValue, 'r'))
		{
			if (!is_dir($sSite))
				mkdir($sSite, 0777);
			file_put_contents("./".$sSite."/".$sName, fopen($sValue, 'r'));
		}
}
if (!($sHTML = file_get_contents($argv[1])) && !($sHTML = file_get_contents("http://" . $argv[1])))
	exit1(1, "Impossible de lire la page");
preg_match_all("#<img(.*?)>#si", $sHTML, $aImg);
foreach( $aImg[0] as $sImg )
{
		preg_match_all('#src="(.*?)"#si', $sImg, $aSrc);
		foreach( $aSrc[1] as $sSrc )
			download($sSrc, $argv[1]);
}
?>
