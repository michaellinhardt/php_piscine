#!/usr/bin/php
<?php
if ($argc != 2)
	exit1("Incorrect Parameters");
function exit1($sMsg)
{
	echo $sMsg . "\n";
	exit (1);
}
if (count($aArg = explode('*', $argv[1])) == 2)
	do_op($aArg, '*');
else if (count($aArg = explode('/', $argv[1])) == 2)
	do_op($aArg, '/');
else if (count($aArg = explode('%', $argv[1])) == 2)
	do_op($aArg, '%');
else if (count($aArg = explode('+', $argv[1])) > 1 && count($aArg) < 5)
	do_op($aArg, '+');
else if (count($aArg = explode('-', $argv[1])) > 1 && count($aArg) < 5)
	do_op($aArg, '-');
else
	exit1("Syntax Error");
function do_op($aArg, $cOp)
{
	$sArg1 = trim($aArg[0]);
	$sArg2 = trim($aArg[1]);
	if ($cOp == '-' || $cOp == '+')
	{
		foreach ($aArg as $iKey => $sVal)
			if (trim($sVal) == "" && $iKey == 0)
			{
				$sArg1 = "-" . trim($aArg[$iKey + 1]);
				$sArg2 = trim($aArg[2]);
			}
			else if (trim($sVal) == "" && $iKey > 0)
				$sArg2 = "-" . trim($aArg[$iKey + 1]);
	}
	if (!is_numeric($sArg1) || !is_numeric($sArg2))
		exit1("Syntax Error");
	else if ($cOp == '%' && intval($sArg2) == 0)
		exit1("Syntax Error (division by zero)");
	else if ($cOp == '%')
		echo (intval($sArg1) % intval($sArg2)) . "\n";
	else if ($cOp == '/' && intval($sArg2) == 0)
		exit1("Syntax Error (division by zero)");
	else if ($cOp == '/')
		echo (intval($sArg1) / intval($sArg2)) . "\n";
	else if ($cOp == '*')
		echo (intval($sArg1) * intval($sArg2)) . "\n";
	else if ($cOp == '+')
		echo (intval($sArg1) + intval($sArg2)) . "\n";
	else if ($cOp == '-')
		echo (intval($sArg1) - intval($sArg2)) . "\n";
	else
		exit1("Unknow..");
}
?>
