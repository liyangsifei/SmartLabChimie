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

        <main class="formulaire_r_bug">
            <?php
              $nom_produit = isset($_POST['nom_produit']) ? $_POST['nom_produit'] : '';
            ?>
            <div class="retour">
                <a href=<?php  echo "./fiche_simplifiee.php?recherche_produit=".str_replace(" ", "%20", $nom_produit);?>><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a><br />
            </div>
            <div class="envoi_mail_bug">
                <h3>Suggestion de modification du produit
                <?php

					         echo $nom_produit;
				        ?> :
                </h3>
                <form method="post" action="r_bug_insert.php" enctype="multipart/form-data">

                    <input type="hidden" name="nom_produit" value="<?php echo $nom_produit; ?>">
                    Décrivez l'erreur ou l'information manquante :<br />
                    <textarea name="r_bug" ></textarea><br />
                    <input type="submit" name="envoi_mail_bug" value="Envoyer le mail">
                </form>
          </div>
        </main>


    </body>
</html>
