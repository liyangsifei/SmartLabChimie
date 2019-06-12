<?php
require 'mysql_connect.php';
require __DIR__.'/tools/cURL.php';

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
/*
$url = './poubelles/';
$arr = array('nom' => $nom_p, 'salle' => $salle_p);
$data = json_encode($arr);
curlPost($url,$data);
*/
  header('Location: index_admin.php');

?>
