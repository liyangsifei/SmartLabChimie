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
            <div class="ajout_poubelle">
                <h3>Ajout d'une nouvelle poubelle : </h3>
                <form method="post" action="insert_poubelle.php" enctype="multipart/form-data">
                    <p>
                        Salle :<input type="text" name="salle_p"><br />
                        Nom de la poubelle :<input type="text" name="nom_p"><br />
                    </p>
                    <input type="submit" name="form_poubelle" value="Ajouter une poubelle">
                </form>
          </div>
        </main>


    </body>
</html>
