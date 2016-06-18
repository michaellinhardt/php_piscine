<?php
$aFiles = scandir('./functions/');
unset($aFiles[0]);
unset($aFiles[1]);
foreach( $aFiles as $sFile )
	include './functions/' . $sFile;
 ?>
