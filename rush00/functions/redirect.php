<?php
function redirect( $sWhy )
{
	$aPage = array();
	$aPage["admin_fail"] = "Admin Fail";
	exitx(1, $aPage[$sWhy]);
}
?>
