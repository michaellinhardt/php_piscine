<?php
function getData()
{
	if (!file_exists("./data"))
		return FALSE;
	return (unserialize(file_get_contents("./data")));
}
 ?>
