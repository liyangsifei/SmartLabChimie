<?php
require 'mysql_connect.php';
require_once 'vendor/autoload.php';

$num_cas = isset($_POST['num_cas']) ? $_POST['num_cas'] : '';

$req_autre_meme_num_cas = 'SELECT `designation_francaise` FROM produit where num_cas = "'.$num_cas.'" ';
$res_autre_meme_num_cas = mysqli_query($connection,$req_autre_meme_num_cas);
if (mysqli_num_rows($res_autre_meme_num_cas)){
    setcookie("erreur_ajout_produit","1",time()+1000);
    header('Location: form_produit.php');
}


$nom_produit = isset($_POST['nom_produit']) ? $_POST['nom_produit'] : '';
$nom_anglais = isset($_POST['nom_anglais']) ? $_POST['nom_anglais'] : '';
$nom_scientifique = isset($_POST['nom_scientifique']) ? $_POST['nom_scientifique'] : '';
$formule_brute = isset($_POST['formule_brute']) ? $_POST['formule_brute'] : '';
$couleur = isset($_POST['couleur']) ? $_POST['couleur'] : '';
$quantite = isset($_POST['quantite']) ? $_POST['quantite'] : null;
$type_produit = isset($_POST['type_produit']) ? $_POST['type_produit'] : null;
if (empty($quantite)){$quantite = null ;};
$com_libre = isset($_POST['com_libre']) ?  addslashes($_POST['com_libre']) : '';
$fournisseur = isset($_POST['fournisseur']) ? $_POST['fournisseur'] : '';
$masse_molaire = isset($_POST['masse_molaire']) ? $_POST['masse_molaire'] : null;
if (empty($masse_molaire)){$masse_molaire = null ;};
$densité = isset($_POST['densité']) ? $_POST['densité'] : null;
if (empty($densité)){$densité = null ;};
$temp_fusion = isset($_POST['temp_fusion']) ? $_POST['temp_fusion'] : null;
if (empty($temp_fusion)){$temp_fusion = null ;};
$temp_ebullition = isset($_POST['temp_ebullition']) ? $_POST['temp_ebullition'] : null;
if (empty($temp_ebullition)){$temp_ebullition = null ;};
$temp_autoflamme = isset($_POST['temp_autoflamme']) ? $_POST['temp_autoflamme'] : null;
if (empty($temp_autoflamme)){$temp_autoflamme = null ;};
$indice_optique = isset($_POST['indice_optique']) ? $_POST['indice_optique'] : null;
if (empty($indice_optique)){$indice_optique = null ;};


$mention_danger = '';
if(isset($_POST['mention_danger'])){
  foreach ($_POST['mention_danger'] as $c_mention){
    $exp_md = explode(" - ",$c_mention);
    $req_md = 'SELECT `ID` FROM `mention_danger` WHERE code = "'.$exp_md[0].'" ';
    $res_md = mysqli_query($connection,$req_md);
    $row_md = mysqli_fetch_array($res_md);
    $mention_danger = $mention_danger.';'.$row_md['ID'];
  }
}


$conseil_prudence = '';
if(isset($_POST['conseil_prudence'])){
  foreach ($_POST['conseil_prudence'] as $c_conseil){
    $exp_cp = explode(" - ",$c_conseil);
    $req_cp = 'SELECT `ID` FROM `conseil_prudence` WHERE code = "'.$exp_cp[0].'" ';
    $res_cp = mysqli_query($connection,$req_cp);
    $row_cp = mysqli_fetch_array($res_cp);
    $conseil_prudence = $conseil_prudence.';'.$row_cp['ID'];
  }
}


//$formule_developee[] = isset($_FILES['2d']) ? $_FILES['2d'] : '';*



$picto_secu_total = '';
if (isset($_POST['picto_secu']))
{
    foreach($_POST['picto_secu'] as $picto_secu)
    {
        $picto_secu_total = $picto_secu.';'.$picto_secu_total ;
    }
}
else
{
    $picto_secu_total = '';
}


$picto_precau_total = '';
if (isset($_POST['picto_precau']))
{
    foreach($_POST['picto_precau'] as $picto_precau)
    {
        $picto_precau_total = $picto_precau.';'.$picto_precau_total ;
    }
}
else
{
    $picto_precau_total = '';
}
$melange_dangereux = isset($_POST['melange_dangereux']) ? $_POST['melange_dangereux'] : '';

//header('Content-Type: image/png');

$stockage = isset($_POST['stockage']) ? $_POST['stockage'] : '';

$poubelle = isset($_POST['poubelle']) ? $_POST['poubelle'] : '';

$qr = new Endroid\QrCode\QrCode();
//$qr->setText('Numéro CAS : '.$num_cas.', nom : '.$nom_scientifique.', quantité : '.$quantite);
$qr->setText('./fiche_simplifiee.php?recherche_produit='.rawurlencode($nom_produit).'');
$qr->setSize(300);
$qr->setPadding(10);
//$qr->setEncoding('UTF-8');

$dossier = 'qr_codes';
if(!is_dir($dossier)){
   mkdir($dossier);
}
$chemin = $dossier.'/qrcode_'.rawurlencode($nom_produit).'.png';
$qr->save($chemin);
$qr_data = mysqli_real_escape_string($connection,$chemin);




if( $_FILES['f_s_legale']['name'] != "" ) {
  $extension_fiche = explode(".", $_FILES['f_s_legale']['name']);
  $extension_fiche_t = end($extension_fiche);
  $fichier_dest_fiche = "./fiches_legales/";
  $fichier_dest_fiche = $fichier_dest_fiche . rawurlencode($nom_produit) .".". $extension_fiche_t ;
  move_uploaded_file($_FILES['f_s_legale']['tmp_name'], $fichier_dest_fiche);
}


if( $_FILES['2d']['name'] != "" ) {
  $extension_image = explode(".", $_FILES['2d']['name']);
  $extension_image_t = end($extension_image);
  $fichier_dest_f_dev = "./formule_developpee/";
  $fichier_dest_f_dev = $fichier_dest_f_dev . rawurlencode($nom_produit) .".". $extension_image_t;
  $re = move_uploaded_file($_FILES['2d']['tmp_name'], $fichier_dest_f_dev);
}




$requete_insert_produit = "INSERT INTO `produit`(
    `designation_francaise`,
    `designation_anglaise`,
    `designation_scientifique`,
    `formule_brute`,
    `type_produit`,
    `quantite`,
    `commentaire_libre`,
    `fournisseur`,
    `masse_molaire`,
    `densite`,
    `temp_fusion_celsius`,
    `temp_ebullition_celsius`,
    `temp_autoflamme_celsius`,
    `indice_optique`,
    `num_cas`,
    `pictogramme_securite`,
    `pictogramme_precaution`,
    `auteur`,
    `melange_dangereux`,
    `stockage`,
    `poubelle`,
    `QR_code`,
    `mention_danger`,
    `conseil_prudence`,
    `couleur`

    )
    VALUES (
    '".mysqli_real_escape_string($connection,$nom_produit)."',
    '".mysqli_real_escape_string($connection,$nom_anglais)."',
    '".mysqli_real_escape_string($connection,$nom_scientifique)."',
    '".mysqli_real_escape_string($connection,$formule_brute)."',
    '".$type_produit."',
    '".$quantite."',
    '".$com_libre."',
    '".mysqli_real_escape_string($connection,$fournisseur)."',
    '".$masse_molaire."',
    '".$densité."',
    '".$temp_fusion."',
    '".$temp_ebullition."',
    '".$temp_autoflamme."',
    '".$indice_optique."',
    '".mysqli_real_escape_string($connection,$num_cas)."',
    '".mysqli_real_escape_string($connection,$picto_secu_total)."',
    '".mysqli_real_escape_string($connection,$picto_precau_total)."',
    'Victor KODAIS-LOQUET',
    '".mysqli_real_escape_string($connection,$melange_dangereux)."',
    '".$stockage."',
    '".$poubelle."',
    '$qr_data',
    '".$mention_danger."',
    '".$conseil_prudence."',
    '".$couleur."'
  )";
    echo $requete_insert_produit;
    $resultat_insert_produit = mysqli_query($connection,$requete_insert_produit) or exit(mysqli_error($connection));

    header('Location: index_admin.php');

?>
