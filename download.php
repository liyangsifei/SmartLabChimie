<?php

$nom = basename($_POST['produit']) . ".pdf";
$file = "./fiches_legales/".rawurlencode($nom);

if(!file_exists($file)){ // file does not exist
    var_dump($nom);
    var_dump($file);
        die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/pdf");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);

    //header "./fiche_simplifiee.php?recherche_produit='.$nom.'";
}

?>
