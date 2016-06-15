#!/usr/bin/php
<?php
function exit1($sMsg = NULL)
{
	if ($sMsg)
		echo $sMsg . "\n";
	exit(1);
}
if (!($sArg = trim($argv[1])))
	exit1();
else if (preg_match("/[0-9][0-9]:[0-9][0-9]:[0-9][0-9]/", $argv[1]) != 1)
	exit1("Wrong Format");
else if (count($aArg = explode(" ", $sArg)) != 5)
	exit1("Wrong Format");
$sVerif = $sArg;
$sArg = preg_replace("/[Jj]anvier/", '01', $sArg);
$sArg = preg_replace('/[Ff]evrier/', '02', $sArg);
$sArg = preg_replace('/[Mm]ars/', '02', $sArg);
$sArg = preg_replace('/[Aa]vril/', '03', $sArg);
$sArg = preg_replace('/[Mm]ai/', '05', $sArg);
$sArg = preg_replace('/[Jj]uin/', '06', $sArg);
$sArg = preg_replace('/[Jj]uillet/', '07', $sArg);
$sArg = preg_replace('/[Aa]out/', '08', $sArg);
$sArg = preg_replace('/[Ss]eptembre/', '09', $sArg);
$sArg = preg_replace('/[Oo]ctobre/', '10', $sArg);
$sArg = preg_replace('/[Nn]ovembre/', '11', $sArg);
$sArg = preg_replace('/[Dd]ecembre/', '12', $sArg);
if ($sVerif === $sArg)
	exit1("Wrong Format");
$sVerif = $sArg;
$sArg = preg_replace('/[Dd]imanche/', '0', $sArg);
$sArg = preg_replace('/[Ll]undi/', '1', $sArg);
$sArg = preg_replace('/[Mm]ardi/', '2', $sArg);
$sArg = preg_replace('/[Mm]ercredi/', '3', $sArg);
$sArg = preg_replace('/[Jj]eudi/', '4', $sArg);
$sArg = preg_replace('/[Vv]endredi/', '5', $sArg);
$sArg = preg_replace('/[Ss]amedi/', '6', $sArg);
if ($sVerif === $sArg)
	exit1("Wrong Format");
$aParse = strptime($sArg, "%w %d %m %Y %H:%M:%S");
if (!$aParse)
	exit1("Wrong Format");
else if (strlen($aParse["unparsed"]) > 0)
	exit1("Wrong Format");
unset($aArg[0]);
$sArg = implode(" ", $aArg);
$sArg = preg_replace("/[Jj]anvier/", 'January', $sArg);
$sArg = preg_replace('/[Ff]evrier/', 'February', $sArg);
$sArg = preg_replace('/[Mm]ars/', 'March', $sArg);
$sArg = preg_replace('/[Aa]vril/', 'April', $sArg);
$sArg = preg_replace('/[Mm]ai/', 'May', $sArg);
$sArg = preg_replace('/[Jj]uin/', 'June', $sArg);
$sArg = preg_replace('/[Jj]uillet/', 'July', $sArg);
$sArg = preg_replace('/[Aa]out/', 'August', $sArg);
$sArg = preg_replace('/[Ss]eptembre/', 'September', $sArg);
$sArg = preg_replace('/[Oo]ctobre/', 'October', $sArg);
$sArg = preg_replace('/[Nn]ovembre/', 'November', $sArg);
$sArg = preg_replace('/[Dd]ecembre/', 'December', $sArg);
date_default_timezone_set("Europe/Paris");
$iReturn = strtotime($sArg);
if ($iReturn > 0)
	echo ($iReturn) . "\n";
else
	exit1("Wrong Format");
?>
