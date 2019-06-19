<?php

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if (isset($_COOKIE["erreur_ajout_produit"])){
    alert("Numéro CAS déjà présent dans la base de donnée");
    setcookie("erreur_ajout_produit","1",time()-3600);
}

?>


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
          <div class="ajout_produit">
            <h3>Ajout d'un nouveau produit : </h3>
            <form method="post" action="insert_produit.php" enctype="multipart/form-data">

                <p>
                    Numéro CAS :<input type="text" name="num_cas"><br />
                    Nom du produit :<input type="text" name="nom_produit"><br />
                    Nom en anglais :<input type="text" name="nom_anglais"><br />
                    Nom scientifique :<input type="text" name="nom_scientifique"><br />
                    Formule brute :<input type="text" name="formule_brute"><br />
                    Couleur associée au niveau de sécurité :<select name="couleur">
                            <option value="vert"><font color="green">Vert</font></option>
                            <option value="orange"><font color="orange">Orange</font></option>
                            <option value="rouge"><font color="red">Rouge</font></option>
                        </select><br />
                    Type : <select name="type_produit">
                            <option value="Acide">Acide</option>
                            <option value="Base">Base</option>
                            <option value="Colorant">Colorant</option>
                            <option value="Surfactant">Surfactant</option>
                            <option value="Gaz">Gaz</option>
                            <option value="Autre">Autre</option>
                            <option value="Sel et complexe">Sel et complexe</option>
                            <option value="Peroxyde">Peroxyde</option>
                            <option value="Résine">Résine</option>
                            <option value="Solvant">Solvant</option>
                            <option value="Thiol">Thiol</option>
                            <option value="Silane">Silane</option>
                            <option value="Nano - Micromatériau">Nano - Micromatériau</option>
                            <option value="Pesticide">Pesticide</option>
                            <option value="Polymère">Polymère</option>
                        </select><br />
                    Quantité (en ml):<input type="text" name="quantite"><br />
                    Commentaire libre :<br />
                    <textarea name="com_libre" ></textarea><br />
                    Fournisseur :<input type="text" name="fournisseur"><br />
                    Masse molaire (en g/mol):<input type="text" name="masse_molaire"><br />
                    Densité :<input type="text" name="densité"><br />
                    Température de fusion (en celcius) :<input type="text" name="temp_fusion"><br />
                    Température d'ébullition (en celcius):<input type="text" name="temp_ebullition"><br />
                    Température d'autoflamme (en celcius):<input type="text" name="temp_autoflamme"><br />
                    Indice optique :<input type="text" name="indice_optique"><br />
                    <br />
                    Mentions de danger :<br/>
                    <select name="mention_danger[]" multiple>
                      <?php
                      require __DIR__.'/tools/cURL.php';
                      $data = curlGet(mentionDangersURL."list/");
                      $data = json_decode($data,true);
                      for($ind=0;$ind<count($data);$ind++) {
                        echo '<option value="'.$data[$ind]["code"].' - '.$data[$ind]["phrase"].'">'.$data[$ind]["code"].' - '.$data[$ind]["phrase"].'</option>';
                      }
/*
                      require 'mysql_connect.php';
                      $requete_mention_danger = "SELECT distinct(code), phrase FROM mention_danger ORDER BY code ASC";
                      $resultat_mention_danger = mysqli_query($connection,$requete_mention_danger) or exit(mysqli_error($connection));
                      while($data_mention_danger=mysqli_fetch_array($resultat_mention_danger)) {
                          echo '<option value="'.$data_mention_danger["code"].' - '.$data_mention_danger["phrase"].'">'.$data_mention_danger["code"].' - '.$data_mention_danger["phrase"].'</option>';
                      }*/
                      ?>
                    </select>
                    <br />
                    Conseils de prudence :<br/>
                    <select name="conseil_prudence[]" multiple>
                      <?php
                      $data = curlGet(conseilPrudencesURL."list/");
                      $data = json_decode($data,true);
                      for($ind=0;$ind<count($data);$ind++) {
                        echo '<option value="'.$data[$ind]["code"].' - '.$data[$ind]["phrase"].'">'.$data[$ind]["code"].' - '.$data[$ind]["phrase"].'</option>';
                      }
/*
                      require 'mysql_connect.php';
                      $requete_conseil_prudence = "SELECT distinct(code), phrase FROM conseil_prudence ORDER BY code ASC";
                      $resultat_conseil_prudence = mysqli_query($connection,$requete_conseil_prudence) or exit(mysqli_error($connection));
                      while($data_conseil_prudence=mysqli_fetch_array($resultat_conseil_prudence)) {
                          echo '<option value="'.$data_conseil_prudence["code"].' - '.$data_conseil_prudence["phrase"].'">'.$data_conseil_prudence["code"].' - '.$data_conseil_prudence["phrase"].'</option>';
                      }*/
                      ?>
                    </select>
                    <br />
                    Pictogramme de sécurité :<br/>
                    <?php
                    $data = curlGet(pictogrammeSecuritesURL."list/");
                    $data = json_decode($data,true);
                    for($ind=0;$ind<count($data);$ind++) {
                      echo '<input type="checkbox" id="picto_secu" name="picto_secu[]" value="'.$data[$ind]["nom"].'" /> <label for="picto_secu">'.$data[$ind]["nom"].'</label>';
                      if($ind%2 != 0) {
                        echo '<br/>';
                      } else if($ind%2 == 0) {
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                      }
                    }
/*
                    require 'mysql_connect.php';
                    $requete_pict_secu = "SELECT nom FROM pictogramme_securite";
                    $resultat_pict_secu = mysqli_query($connection,$requete_pict_secu) or exit(mysqli_error($connection));
                    while($data_picto_secu=mysqli_fetch_array($resultat_pict_secu)) {
                        echo '<input type="checkbox" id="picto_secu" name="picto_secu[]" value="'.$data_picto_secu["nom"].'" /> <label for="picto_secu">'.$data_picto_secu["nom"].'</label>';
                    }*/
                    ?><br /><br />

                    Pictogramme de précaution :<br/>
                    <?php
                    $data = curlGet(pictogrammePrecautionsURL."list/");
                    $data = json_decode($data,true);
                    for($ind=0;$ind<count($data);$ind++) {
                      echo '<input type="checkbox" id="picto_precau" name="picto_precau[]" value="'.$data[$ind]["nom"].'" /> <label for="picto_precau">'.$data[$ind]["nom"].'</label>';
                    }
/*
                    require 'mysql_connect.php';
                    $requete_pict_precau = "SELECT nom FROM pictogramme_precaution";
                    $resultat_pict_precau = mysqli_query($connection,$requete_pict_precau) or exit(mysqli_error($connection));
                    while($data_picto_precau=mysqli_fetch_array($resultat_pict_precau)) {
                       echo '<input type="checkbox" id="picto_precau" name="picto_precau[]" value="'.$data_picto_precau["nom"].'" /> <label for="picto_precau">'.$data_picto_precau["nom"].'</label>';
                    }*/
                    ?><br /><br />

                    Mélange dangereux :<input type="text" name="melange_dangereux"><br />

                    Stockage :
                    <?php
                    $data = curlGet(stockagesURL."list/");
                    $data = json_decode($data,true);
                    echo '<select name="stockage">';
                    for($ind=0;$ind<count($data);$ind++) {
                      echo '<option value="'.$data[$ind]["ID"].'">'.$data[$ind]["salle"].' '.$data[$ind]["type_stockage"].' '.$data[$ind]["nom_stockage"].'</option>';
                    }
                    echo '</select>';

                    /*
                    require 'mysql_connect.php';
                    $requete_stockage = "SELECT salle, type_stockage, nom_stockage, ID FROM stockage";
                    $resultat_stockage = mysqli_query($connection,$requete_stockage) or exit(mysqli_error($connection));
                    echo '<select name="stockage">';
                    while($data_stockage=mysqli_fetch_array($resultat_stockage)) {
                       echo '<option value="'.$data_stockage["ID"].'">'.$data_stockage["salle"].' '.$data_stockage["type_stockage"].' '.$data_stockage["nom_stockage"].'</option>';
                    }
                    echo '</select>';*/

                    ?><br /><br />

                    Poubelle :
                    <?php
                    $data = curlGet(poubellesURL."list/");
                    $data = json_decode($data,true);
                    echo '<select name="poubelle">';
                    for($ind=0;$ind<count($data);$ind++) {
                      echo '<option value="'.$data[$ind]["ID"].'">'.$data[$ind]["salle"].' '.$data[$ind]["nom"].'</option>';
                   }
                    echo '</select>';
                    /*
                    require 'mysql_connect.php';
                    $requete_poubelle = "SELECT salle, nom, ID FROM poubelle";
                    $resultat_poubelle = mysqli_query($connection,$requete_poubelle) or exit(mysqli_error($connection));
                    echo '<select name="poubelle">';
                    while($data_poubelle=mysqli_fetch_array($resultat_poubelle)) {
                       echo '<option value="'.$data_poubelle["ID"].'">'.$data_poubelle["salle"].' '.$data_poubelle["nom"].'</option>';
                    }
                    echo '</select>';*/

                    ?><br /><br />
                    Image 2D de la molecule : <input type="file" name="2d" value="Ajouter un visuel de la molécule">

                    Fiche de sécurité légale : <input type="file" name="f_s_legale" value="Ajouter la fiche de sécurité au format pdf">

                    <input type="submit" name="form_produit" value="Ajouter un produit">
                </p>

            </form>
          </div>
        </main>


    </body>
</html>
