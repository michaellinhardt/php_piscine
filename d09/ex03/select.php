<?php
$sPathCsv = './list.csv';

if (!is_file($sPathCsv))
	touch($sPathCsv);
echo json_encode(file($sPathCsv, FILE_IGNORE_NEW_LINES));
?>
