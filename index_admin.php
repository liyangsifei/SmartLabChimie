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

        <main class="index_admin">
            <div class="fonctionnalités">
                <a>Liste des fonctionnalités administrateur :</a>
                <ul class="liste_produit">
                    <li><a href="./form_produit.php">Ajouter un produit</a> / <a href="./supp_produit.php">Supprimer un produit</a></li>
                    <li><a href="./form_stockage.php">Ajouter un stockage</a> / <a href="./supp_stockage.php">Supprimer un stockage</a></li>
                    <li><a href="./form_poubelle.php">Ajouter une poubelle</a> / <a href="./supp_poubelle.php">Supprimer une poubelle</a></li>

                </ul>
            </div>
            <div class="go_user">
                <form methode="GET" action="index.php" class="go_user">
                    <input type="submit" value="Passer à l'interface utilisateur">
                </form>
            </div>

        </main>


    </body>
</html>
