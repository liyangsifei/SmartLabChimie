<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "chimie";



$connection=mysqli_connect($servername,$username,$password,$dbname);


if (!$connection->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $connection->error);
    exit();
}

if(!$connection)
{
	die('Erreur de connexion :'. mysqli_connect_error);
}

if (!mysqli_select_db ($connection,'chimie'))
{
	echo 'Base de données non selectionnée';
}

?>
