<?php
if (!$_GET)
	exit (0);
foreach ($_GET as $sKey => $sValue)
	echo $sKey . ": " . $sValue . "\n";
?>
