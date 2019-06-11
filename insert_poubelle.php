<?php
require 'mysql_connect.php';

$salle_p = isset($_POST['salle_p']) ? $_POST['salle_p'] : '';
$nom_p = isset($_POST['nom_p']) ? $_POST['nom_p'] : '';

$requete_insert_poubelle = "INSERT INTO `poubelle`(
    `nom`
    ,`salle`
    )
    VALUES (
    '".mysqli_real_escape_string($connection,$nom_p)."',
    '".mysqli_real_escape_string($connection,$salle_p)."'
  )";
    echo $requete_insert_poubelle;
    $res_insert_poubelle = mysqli_query($connection,$requete_insert_poubelle) or exit(mysqli_error($connection));

    header('Location: index_admin.php');

?>
