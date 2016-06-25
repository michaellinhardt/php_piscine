<?php
$sPathCsv = './list.csv';
$aRet[0] = time();
$aRet[1] = trim($_POST['sTask']);
$sFile = $aRet[0] . ';' . $aRet[1] . PHP_EOL . file_get_contents($sPathCsv) ;
file_put_contents( $sPathCsv, $sFile );
echo json_encode($aRet);
?>
