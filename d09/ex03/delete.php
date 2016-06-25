<?php
$sPathCsv = './list.csv';
$aFile = file($sPathCsv, FILE_IGNORE_NEW_LINES);
$iID = intval($_POST['iID']);
$sFile = '';
foreach( $aFile as $sLine )
{
	$aVal = explode(';', $sLine);
	if (intval($aVal[0]) != $iID)
		$sFile = $sFile . $aVal[0] . ';' . $aVal[1] . PHP_EOL ;
}
file_put_contents( $sPathCsv, $sFile );
?>
