<?php

require 'mysql_connect.php';

$produits_a_supp[] = isset($_POST['suppression']) ? $_POST['suppression'] : '';
$flag = false;
var_dump($produits_a_supp);


foreach ($produits_a_supp as $p) {
	var_dump($p);
	$p = str_replace("__", " ", $p);
		var_dump($p);
		foreach ($p as $pp){

				var_dump($pp);
			$req_supp_produit = 'DELETE FROM `produit` WHERE designation_francaise="'.$pp.'"';
			if ($connection->query($req_supp_produit) === TRUE) {

				  //suppression du qr code correspondant
					$nom_qrcode="qrcode_" . $pp .".png";
					$dir = "./qr_codes/";
					$dirHandle = opendir($dir);
					while ($file = readdir($dirHandle)) {
							if($file==$nom_qrcode) {
									unlink($dir . $file);
							}
					}
					closedir($dirHandle);

					//suppression de la formule developpee correspondante
					$nom_fichier = preg_grep('/^'.rawurlencode($pp).'(\.*)/', scandir("./formule_developpee/"));
					$dir = "./formule_developpee/";
					$dirHandle = opendir($dir);
					while ($file = readdir($dirHandle)) {
							if($file==$nom_fichier) {
									unlink($dir . $file);

							}
					}
					closedir($dirHandle);

					//suppression de la fiche legale correspondante
					$nom_image = $pp . ".pdf";
					$dir = "./fiches_legales/";
					$dirHandle = opendir($dir);
					while ($file = readdir($dirHandle)) {
							if($file==$nom_image) {
									unlink($dir . $file);
							}
					}
					closedir($dirHandle);

		    	echo "Record deleted successfully";
		    	$flag = true;
			}else {
		    echo "Error deleting record: " . $connection->error;
			}
		}


}

$connection->close();

if ($flag = true){
	header('Location: index_admin.php');
}

?>
