<?php
function saveData( $aData )
{
	if (!file_exists($aData['settings']['path_data']))
		return FALSE;
	file_put_contents( $aData['settings']['path_data'], serialize($aData));
}
 ?>
