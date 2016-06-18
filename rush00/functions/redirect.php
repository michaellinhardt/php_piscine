<?php
function redirect( $sWhy )
{
	$aPage = array();
	$aPage["unknow"] = "Unknow error";
	$aPage["admin_fail"] = "Admin Fail";
	$aPage["admin_bad_page"] = "Admin Page is wrong";
	if (!isset($aPage[$sWhy]))
		$sWhy = "unknow" ;
	exitx(1, $aPage[$sWhy]);
}
?>
