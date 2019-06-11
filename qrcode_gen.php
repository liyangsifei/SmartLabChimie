<?php 
//header('Content-Type: image/png');

require_once 'vendor/autoload.php';


$qr = new Endroid\QrCode\QrCode();
$qr->setText('Bill');
$qr->setSize(200);
$qr->setPadding(10);

$qr->render();


require "mysql_connect.php";
                     $nom = 'Chloroforme';
                    $req_recup_info_produit = "SELECT * FROM produit where designation_francaise = '".$nom."' or designation_anglaise = '".$nom."' or designation_scientifique = '".$nom."' ";
                    //$res_sugestion_produit = mysqli_query($connection,$req_sugestion_produit);
                    $res_recup_info_produit=mysqli_query($connection,$req_recup_info_produit);
                    while($res_recup_info = mysqli_fetch_array($res_recup_info_produit)) {
                        echo "EMP ID :{$res_recup_info['designation_francaise']}  <br> ".
                         "EMP NAME : {$res_recup_info['designation_anglaise']} <br> ".
                         "EMP SALARY : {$res_recup_info['designation_scientifique']} <br> ".
                         "--------------------------------<br>";
                    }