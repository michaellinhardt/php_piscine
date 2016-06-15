#!/usr/bin/php
<?php
if ($argc < 2)
	exit (1);
if (!is_file($argv[1]))
	exit (1);
$oOpen = fopen($argv[1], "r");
$iFirst = 0;
$aData = array();
while(!feof($oOpen)) {
	$sLine = fgets($oOpen);
	if ($iFirst++ > 0)
		$aData[] = trim($sLine);
}
$nom = array();
$prenom = array();
$mail = array();
$IP = array();
$pseudo = array();
foreach( $aData as $sMember )
{
	if (count($aMember = explode(";", $sMember)) == 5)
	{
		$nom[($aMember[0])] = $aMember[0];
		$nom[($aMember[1])] = $aMember[0];
		$nom[($aMember[2])] = $aMember[0];
		$nom[($aMember[3])] = $aMember[0];
		$nom[($aMember[4])] = $aMember[0];
		$prenom[($aMember[0])] = $aMember[1];
		$prenom[($aMember[1])] = $aMember[1];
		$prenom[($aMember[2])] = $aMember[1];
		$prenom[($aMember[3])] = $aMember[1];
		$prenom[($aMember[4])] = $aMember[1];
		$mail[($aMember[0])] = $aMember[2];
		$mail[($aMember[1])] = $aMember[2];
		$mail[($aMember[2])] = $aMember[2];
		$mail[($aMember[3])] = $aMember[2];
		$mail[($aMember[4])] = $aMember[2];
		$IP[($aMember[0])] = $aMember[3];
		$IP[($aMember[1])] = $aMember[3];
		$IP[($aMember[2])] = $aMember[3];
		$IP[($aMember[3])] = $aMember[3];
		$IP[($aMember[4])] = $aMember[3];
		$pseudo[($aMember[0])] = $aMember[4];
		$pseudo[($aMember[1])] = $aMember[4];
		$pseudo[($aMember[2])] = $aMember[4];
		$pseudo[($aMember[3])] = $aMember[4];
		$pseudo[($aMember[4])] = $aMember[4];
	}
}
fclose($oOpen);
$oOpen = fopen('php://stdin', 'r');
while (1)
{
    echo "Entrez votre commande: ";
    $oGets = fgets($oOpen);
    if (!$oGets) {
        echo "\n";
        break;
    }
    $sLine = substr($oGets, 0, -1);
	eval ($sLine);
}
?>
