<?php
function ft_is_sort($aArray)
{
	$aSorted = $aArray;
	sort($aSorted);
	foreach ($aSorted as $iKey => $sValue)
		if ($sValue !== $aArray[$iKey])
			return false;
	return true;
}
?>
