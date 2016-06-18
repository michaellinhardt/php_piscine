<?php
function isAdmin( $aMembers )
{
	if (!$aMembers || !isset($_SESSION['id_members']) || $_SESSION['id_members'] == -1
 	|| !isset($aMembers[$_SESSION['id_members']]) || $aMembers[$_SESSION['id_members']]['admin'] == 0)
		redirect( "admin_fail");
}
 ?>
