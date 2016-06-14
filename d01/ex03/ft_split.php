<?php
function ft_split($sInput)
{
    $aSplit = explode(" ", $sInput);
    $aFiltered = array_filter($aSplit);
    $aSliced = array_slice($aFiltered, 0);
    sort($aSliced);
    return $aSliced;
}
?>
