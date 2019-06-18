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

        <main class="index">

            <form method="get" action="fiche_simplifiee.php" class="recherche">
                <input type="text" name="recherche_produit" placeholder="Nom du produit..." list="nom_produit" required>
                <datalist id="nom_produit" >
                    <?php
                    error_reporting(E_ERROR | E_PARSE);

                    require "mysql_connect.php";

                    $req_sugestion_produit = "SELECT `designation_francaise`, `designation_anglaise`, `designation_scientifique` FROM produit";

                    $res_sugestion=mysqli_query($connection,$req_sugestion_produit);
                    $res_sugestion_produit = mysqli_fetch_all($res_sugestion);
                    foreach ($res_sugestion_produit as $res)
                    {
                        foreach ($res as $re)
                        echo '<option value="'.$re.'">';
                    }
                    ?>
                </datalist>
                <input type="submit" value="Rechercher un produit">
            </form>

            <form methode="GET" action="./scan_qr.html" class="scan">
                <img src="./Images/scan.png" alt="[Scan]" class="logo_scan"/>
                <input type="submit" value="Scanner un produit">
            </form>

            <div class="produits">
                <a>Liste des produits récemment utilisés :</a>
                <ul class="liste_produit">
                    <?php
                    $req_dernier_visu_produit = "SELECT designation_francaise FROM produit ORDER BY date_derniere_visu DESC LIMIT 10";
                    $res_dernier_visu_produit = mysqli_query($connection, $req_dernier_visu_produit);
                    while($res_dernier_visu = mysqli_fetch_array($res_dernier_visu_produit)) {
                        echo '<a href="./fiche_simplifiee.php?recherche_produit='.$res_dernier_visu['designation_francaise'].'"><li>'.$res_dernier_visu['designation_francaise'].'</li></a>';
                    }
                    ?>

                </ul>
            </div>

            <div class="melange">
                <form methode="GET" action="melange.php" class="melange">
                    <input type="submit" value="Créer un nouveau mélange">
                </form><br/>
                <form methode="GET" action="capteur_poubelle.php" class="melange">
                    <input type="submit" value="Capteurs">
                </form>
            </div>
        </main>


    </body>
</html>
