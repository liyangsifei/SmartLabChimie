<?php
require 'mysql_connect.php';

$salle_s = isset($_POST['salle_s']) ? $_POST['salle_s'] : '';
$type_s = isset($_POST['type_s']) ? $_POST['type_s'] : '';
$nom_s = isset($_POST['nom_s']) ? $_POST['nom_s'] : '';
$etagere_s = isset($_POST['etagere_s']) ? $_POST['etagere_s'] : '';
$recipient_s = isset($_POST['recipient_s']) ? $_POST['recipient_s'] : '';


$requete_insert_stockage = "INSERT INTO `stockage`(
    `salle`
    ,`type_stockage`
    , `nom_stockage`
    , `étagère`
    , `récipient`
    )
    VALUES (
    '".mysqli_real_escape_string($connection,$salle_s)."',
    '".mysqli_real_escape_string($connection,$type_s)."',
    '".mysqli_real_escape_string($connection,$nom_s)."',
    '".mysqli_real_escape_string($connection,$etagere_s)."',
    '".mysqli_real_escape_string($connection,$recipient_s)."'
  )";
    echo $requete_insert_stockage;
    $resultat_insert_stockage = mysqli_query($connection,$requete_insert_stockage) or exit(mysqli_error($connection));

    header('Location: index_admin.php');

?>
