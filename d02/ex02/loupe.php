#!/usr/bin/php
<?php
if (!$argv[1])
	exit(1);
if (!is_file($argv[1]))
	exit(1);
function exit1($sMsg = NULL)
{
	if ($sMsg)
		echo $sMsg . "\n";
	exit(1);
}
function toupper_title($sVal) {	return 'title="'.strtoupper($sVal).'"'; }
function testt($sVal)
{
	$iStart = 0;
	$len = strlen($sVal);
	$i = 0;
	while ($i++ < $len)
	{
		if ($sVal[$i] == '>')
			$iStart = $i + 1;
		if ($sVal[$i] == '<' && $iStart > 0)
		{
			$sBefore = substr($sVal, 0, $iStart);
			$sUpper = strtoupper(substr($sVal, $iStart, $i - $iStart));
			$sEnd = substr($sVal, $i, $len - $i);
			$sVal = $sBefore . $sUpper . $sEnd;
			$iStart = 0;
		}
	}
	return $sVal;
}
$sHTML = file_get_contents($argv[1]);
$sHTML = preg_replace('#title="(.*)"#e', "toupper_title('\\1')", $sHTML);
$sHTML = preg_replace('#<a (.*)</a>#e', "testt('\\0')", $sHTML);
$sHTML = preg_replace('#\\\"#', '"', $sHTML);
echo $sHTML . "\n";
?>
