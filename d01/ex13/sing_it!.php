#!/usr/bin/php
<?php
session_start();
if (!isset($_SESSION['turn']))
	$_SESSION['turn'] = 1;
if ($argv[1] == "mais pourquoi cette demo ?")
	echo "Tout simplement pour qu'en feuilletant le sujet\non ne s'apercoive pas de la nature de l'exo\n";
else if ($argv[1] == "mais pourquoi cette chanson ?")
	echo "Parce que Kwame a des enfants\n";
else if ($argv[1] == "vraiment ?" && $_SESSION['turn'] == 1 && $_SESSION['turn']++)
	echo "Nan c'est parce que c'est le premier avril\n";
else if ($argv[1] == "vraiment ?" && $_SESSION['turn'] == 2 && $_SESSION['turn']--)
	echo "Oui il a vraiment des enfants\n";
?>
