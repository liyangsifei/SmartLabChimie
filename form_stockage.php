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

        <main class="formulaire_stockage">
            <div class="retour">
                <a href="index_admin.php"><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a><br />
            </div>
            <div class="ajout_stockage">
                <h3>Ajout d'un nouveau stockage : </h3>
                <form method="post" action="insert_stockage.php" enctype="multipart/form-data">

                    <p>
                        Salle :<input type="text" name="salle_s"><br />
                        Type de stockage :
                        <select name="type_s">
                            <option value="Armoire">Armoire</option>
                            <option value="Frigo">Frigo</option>
                            <option value="Boite">Boite</option>
                            <option value="Four">Four</option>
                            <option value="Four">Congélateur</option>
                        </select><br />
                        Nom du stockage :<input type="text" name="nom_s"><br />
                        Etagère (facultatif) :<input type="text" name="etagere_s"><br />
                        Récipient (facultatif) :<input type="text" name="recipient_s"><br />
                    </p>
                    <input type="submit" name="form_stockage" value="Ajouter un stockage">
                </form>
          </div>
        </main>


    </body>
</html>
