<!DOCTYPE html>
<html>

    <head>
        <title>Fiches de sécurité</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="./CSS/style.css"/>
    </head>

    <body>

        <header class="page_header">
            <div class="logo_utt">
                <img src="./Images/logo-utt.png" alt="[Logo UTT]"/>
            </div>

            <div class="titre_page">
                <h1>Fiches de sécurité</h1>
            </div>
        </header>

        <main class="formulaire_produit">
        	<div class="retour">
                <a href="index_admin.php"><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a><br />
            </div>
          	<div class="supp_produit">
          		<form method="post" action="supp_produit_bd.php" enctype="multipart/form-data" onsubmit="return confirm('Confirmer la selection de produit à supprimer?');">
	          		<br />
	            	<h3>Sélectionnez le(s) produit(s) à supprimer : </h3>
	            	<?php
	            		require 'mysql_connect.php';

	            		$req_nom_produit = "SELECT designation_francaise FROM produit";
      						$res_nom_produit = mysqli_query($connection, $req_nom_produit);

      						echo "<table id='t_produits'>";
      						if (!mysqli_num_rows($res_nom_produit)){
                                  echo '<a href="http://localhost/Chimie/form_produit.php">Pas de produit dans la base de données, cliquez ici pour en ajouter.</a>';
                              }
      						while($res_nom = mysqli_fetch_assoc($res_nom_produit)) {
      						    echo "<tr><td>";
      						    echo $res_nom['designation_francaise'];
      						    echo "</td><td><input type='checkbox' name='suppression[]' value=".str_replace(" ", "__", $res_nom['designation_francaise'])." ></td><tr>";
      						}
      						echo "</table>";
	            	?>
            	<input type="submit" name="form_supp_produit" value="Supprimer les produits sélectionnés">
            	</form>
          	</div>
        </main>


    </body>
</html>
