<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require __DIR__.'/tools/cURL.php';

$nom_produit = isset($_POST['nom_produit']) ? $_POST['nom_produit'] : '';
$r_bug = isset($_POST['r_bug']) ? $_POST['r_bug'] : '';
var_dump($nom_produit);
var_dump($r_bug);

$to = 'victor.kodais_loquet@utt.fr';
var_dump($to);

$sujet = 'Suggestion de modification de '.$nom_produit;
var_dump($sujet);

$message=$r_bug;
var_dump($message);

$mail = new PHPMailer(true);


    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = "victor.kodaisloquet@gmail.com"; // GMAIL username
    $mail->Password = "vkl08041996"; // GMAIL password



$email = "victor.kodais_loquet@utt.fr";
$name = "Victor KODAIS-LOQUET";
$email_from = "victor.kodaisloquet@gmail.com";
$name_from = "Victor KODAIS-LOQUET";

//Typical mail data
$mail->AddAddress($email, $name);
$mail->SetFrom($email_from, $name_from);
$mail->Subject = $sujet;
$mail->Body = $message;

//var_dump($mail);

try{
    $mail->Send();
    $d = date('Y-m-d H:i:s');
    $arr = array('mail_to' => $email_from, 'date' => $d, 'message' => $message);
    $data = json_encode($arr);
    curlPost(mailsURL, $data);
    if(!empty($arr)) {
      header('Location: index.php');
    }
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}



?>
