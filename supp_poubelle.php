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

        <main class="formulaire_poubelle">
        	<div class="retour">
                <a href="index_admin.php"><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a><br />
            </div>
          	<div class="supp_poubelle">
          		<form method="post" action="supp_poubelle_bd.php" enctype="multipart/form-data" onsubmit="return confirm('Confirmer la selection de poubelle à supprimer?');">
	          		<br />
	            	<h3>Sélectionnez le(s) poubelle(s) à supprimer : </h3>
	            	<?php
	            		require 'mysql_connect.php';

	            		$req_nom_poubelle = "SELECT nom, salle FROM poubelle";
      						$res_nom_poubelle = mysqli_query($connection, $req_nom_poubelle);

      						echo "<table id='t_produits'>";
                              if (!mysqli_num_rows($res_nom_poubelle)){
                                  echo '<a href="./form_poubelle.php">Pas de poubelle dans la base de données, cliquez ici pour en ajouter.</a>';
                              }
      						while($res_nom = mysqli_fetch_assoc($res_nom_poubelle)) {
      						    echo "<tr><td>";
      						    echo $res_nom['salle'];
                                  echo "</td><td>";
                                  echo $res_nom['nom'];
      						    echo "</td><td><input type='checkbox' name='suppression' value=".$res_nom['nom']." ></td><tr>";
      						}
      						echo "</table>";
	            	?>
            	<input type="submit" name="form_supp_poubelle" value="Supprimer les poubelles sélectionnées">
            	</form>
          	</div>
        </main>


    </body>
</html>
