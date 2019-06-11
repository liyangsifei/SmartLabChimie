<?php
ini_set("SMTP", "127.0.0.1");

$nom_produit = isset($_POST['nom_produit']) ? $_POST['nom_produit'] : '';
$r_bug = isset($_POST['r_bug']) ? $_POST['r_bug'] : '';
var_dump($nom_produit);
var_dump($r_bug);

$to = 'victor.kodais_loquet@utt.fr';
var_dump($to);

$sujet = 'Suggestion de modification de '.$nom_produit;
var_dump($sujet);

$headers = '';

$headers.='From:"Victor KL"<victor.kodais_loquet@utt.fr>'."\n";
$headers.='Content-Type:text/html; charset="uft-8"'."\n";
$headers.='Content-Transfer-Encoding: 8bit';
var_dump($headers);

$message=$r_bug;
var_dump($message);

if (mail($to, $sujet, $message, $headers)){
  require 'mysql_connect.php';


  $requete_insert_mail = "INSERT INTO `mail`(
    `mail_to`
    , `message`)
    VALUES (
      $to
      ,'".mysqli_real_escape_string($connection,$message)."'
    )";
      echo $requete_insert_mail;
      $res_insert_mail = mysqli_query($connection,$requete_insert_mail) or exit(mysqli_error($connection));

      //header('Location: index.php');
}


?>
