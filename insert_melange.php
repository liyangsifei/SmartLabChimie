<?php
require __DIR__.'/tools/cURL.php';
require 'mysql_connect.php';
require_once 'vendor/autoload.php';

if(isset($_POST['submit']))
{
	$nom_m = isset($_POST['nom_melange']) ? $_POST['nom_melange'] : '';
	$milieu_m = isset($_POST['milieu']) ? $_POST['milieu'] : '';
	$concentrations[] = isset($_POST["concentration[]"]) ? $_POST['concentration[]'] : '';
	$unites_mesure[] = isset($_POST["unite_mesure[]"]) ? $_POST['unite_mesure[]'] : '';
}

var_dump ($concentrations);
var_dump ($unites_mesure);

var_dump ($nom_m);
var_dump ($milieu_m);

/*$arr = array('nom' => $nom_p, 'salle' => $salle_p);
$data = json_encode($arr);
curlPost(poubellesURL,$data);*/


$qr = new Endroid\QrCode\QrCode();
$qr->setText('./fiche_simplifiee.php?recherche_produit='.rawurlencode($nom_m).'');
$qr->setSize(300);
$qr->setPadding(10);

$dossier = 'qr_codes/melanges';
if(!is_dir($dossier)){
   mkdir($dossier);
}
$chemin = $dossier.'/qrcode_'.rawurlencode($nom_m).'.png';
$qr->save($chemin);
$qr_data = mysqli_real_escape_string($connection,$chemin);

if(!empty($_POST["name"])  && !empty($_POST["concentration"]) && !empty($_POST["unite_mesure"])){


		foreach ($_POST["name"] as $key => $value) {
      $concentration = $concentrations[$key];
	    $unite_mesure = $unites_mesure[$key];
			var_dump ($concentration);
			var_dump ($unite_mesure);
      //var_dump ($value);
      //var_dump ($concentration);
			//$sql = "INSERT INTO tagslist(name) VALUES ('".$value."')";
			//$mysqli->query($sql);
		}
	}


/*require 'mysql_connect.php';

$requete_insert_poubelle = "INSERT INTO `poubelle`(
    `nom`
    ,`salle`
    )
    VALUES (
    '".mysqli_real_escape_string($connection,$nom_p)."',
    '".mysqli_real_escape_string($connection,$salle_p)."'
  )";
  echo $requete_insert_poubelle;
  $res_insert_poubelle = mysqli_query($connection,$requete_insert_poubelle) or exit(mysqli_error($connection));*/



//header('Location: index_admin.php');

?>
