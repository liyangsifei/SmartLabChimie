<?php

$servername = "localhost";
$username = "kodais_v";
$password = "ePi4NFa8";
$dbname = "kodais_v";



$connection=mysqli_connect($servername,$username,$password,$dbname);


if (!$connection->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $connection->error);
    exit();
}

if(!$connection)
{
	die('Erreur de connexion :'. mysqli_connect_error);
}

if (!mysqli_select_db ($connection,$dbname))
{
	echo 'Base de connées non selectionnée';
}

?>
