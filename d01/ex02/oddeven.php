#!/usr/bin/php
<?php
$oOpen = fopen('php://stdin', 'r');
while (1)
{
    echo "Entrez un nombre: ";
    $oGets = fgets($oOpen);
    if (!$oGets) {
        echo "\n";
        break;
    }
    $sLine = substr($oGets, 0, -1);
    if (strlen($sLine) > 0 && is_numeric($sLine)) {
        echo "Le chiffre " . $sLine . " est " ;
        if ((int)substr($sLine, -1) % 2)
            echo "Impair";
        else
            echo "Pair";
    }
    else
        echo "'$sLine' n'est pas un chiffre";
    echo "\n";
}
?>
