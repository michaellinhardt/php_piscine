<?php
function getData()
{
	if (!file_exists("./data"))
		return FALSE;
	return (unserialize(file_get_contents("./data")));
}
function saveData( $aData )
{
	if (!file_exists($aData['settings']['path_data']))
		return FALSE;
	file_put_contents( $aData['settings']['path_data'], serialize($aData));
}
 ?>
