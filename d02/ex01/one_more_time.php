#!/usr/bin/php
<?php
function syntax_error()
{
	echo "Wrong Format\n";
	exit(1);
}
if ($argc < 2)
	exit(1);
else if ($argc > 2)
	syntax_error();
$aDate = explode(" ", $argv[1]);
$aDate = array_filter($aDate);
$aDate = array_slice($aDate, 0);
if (count($aDate) != 5)
    syntax_error();
$sDate = implode(" ", $aDate);
if (preg_match("/[0-9][0-9]:[0-9][0-9]:[0-9][0-9]/", $sDate) != 1)
    syntax_error();
$sDateOld = $sDate;
$sDate = preg_replace("/[Jj]anvier/", '01', $sDate);
$sDate = preg_replace('/[Ff]evrier/', '02', $sDate);
$sDate = preg_replace('/[Mm]ars/', '02', $sDate);
$sDate = preg_replace('/[Aa]vril/', '03', $sDate);
$sDate = preg_replace('/[Mm]ai/', '05', $sDate);
$sDate = preg_replace('/[Jj]uin/', '06', $sDate);
$sDate = preg_replace('/[Jj]uillet/', '07', $sDate);
$sDate = preg_replace('/[Aa]out/', '08', $sDate);
$sDate = preg_replace('/[Ss]eptembre/', '09', $sDate);
$sDate = preg_replace('/[Oo]ctobre/', '10', $sDate);
$sDate = preg_replace('/[Nn]ovembre/', '11', $sDate);
$sDate = preg_replace('/[Dd]ecembre/', '12', $sDate);
if ($sDateOld === $sDate)
    syntax_error();
$sDateOld = $sDate;
$sDate = preg_replace('/[Dd]imanche/', '0', $sDate);
$sDate = preg_replace('/[Ll]undi/', '1', $sDate);
$sDate = preg_replace('/[Mm]ardi/', '2', $sDate);
$sDate = preg_replace('/[Mm]ercredi/', '3', $sDate);
$sDate = preg_replace('/[Jj]eudi/', '4', $sDate);
$sDate = preg_replace('/[Vv]endredi/', '5', $sDate);
$sDate = preg_replace('/[Ss]amedi/', '6', $sDate);
if ($sDateOld === $sDate)
    syntax_error();
$trying_to_parse = strptime($sDate, "%w %d %m %Y %H:%M:%S");
if ($trying_to_parse === FALSE)
    syntax_error();
if (strlen($trying_to_parse["unparsed"]) > 0)
    syntax_error();
unset($filtered[0]);
$original = implode(" ", $filtered);
$original = preg_replace("/[Jj]anvier/", 'January', $original);
$original = preg_replace('/[Ff]evrier/', 'February', $original);
$original = preg_replace('/[Mm]ars/', 'March', $original);
$original = preg_replace('/[Aa]vril/', 'April', $original);
$original = preg_replace('/[Mm]ai/', 'May', $original);
$original = preg_replace('/[Jj]uin/', 'June', $original);
$original = preg_replace('/[Jj]uillet/', 'July', $original);
$original = preg_replace('/[Aa]out/', 'August', $original);
$original = preg_replace('/[Ss]eptembre/', 'September', $original);
$original = preg_replace('/[Oo]ctobre/', 'October', $original);
$original = preg_replace('/[Nn]ovembre/', 'November', $original);
$original = preg_replace('/[Dd]ecembre/', 'December', $original);
date_default_timezone_set("Europe/Paris");
$time_string = strtotime($original);
if (strlen($time_string) > 0)
   echo strtotime($original) . "\n";
else
	syntax_error();
?>
