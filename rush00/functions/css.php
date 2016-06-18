<?php
function btnactive( $p, $sPage, $sBtn)
{
	echo (($p == $sPage) ? $sBtn . '-active' : '');
}

 ?>
